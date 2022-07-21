<?php
/**
 * Class Name: PG_Image, PG_Helper
 * GitHub URI:
 * Description:
 * Version: 1.0
 * Author: Matjaz Trontelj - @pinegrow
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 */

if(! class_exists( 'PG_Image' )) {
    class PG_Image
    {

        static function removeSizeAttributes($img, $attr = null)
        {
            if ($attr == 'both' || $attr == 'width') {
                $img = preg_replace('/\swidth="[^"]*"/i', '', $img);
            }
            if ($attr == 'both' || $attr == 'height') {
                $img = preg_replace('/\sheight="[^"]*"/i', '', $img);
            }
            return $img;
        }

        static function getUrl($image_or_url, $size)
        {
            if (is_array($image_or_url)) {
                if (!empty($image_or_url['sizes']) && !empty($image_or_url['sizes'][$size])) {
                    return $image_or_url['sizes'][$size];
                } else {
                    return '';
                }
            }
            if (!is_numeric($image_or_url)) {
                return $image_or_url;
            }
            return wp_attachment_is_image($image_or_url) ? wp_get_attachment_image_url($image_or_url, $size) : wp_get_attachment_url($image_or_url);
        }

        static function getImages($list)
        {
            if (empty($list)) return array();
            if (is_string($list)) $list = explode(',', $list);
            $args = array(
                'post__in' => $list,
                'post_type' => 'attachment',
                'post_mime_type' => 'image',
                'posts_per_page' => -1,
                'orderby' => 'post__in',
                'order' => 'ASC'
            );
            return get_posts($args);
        }

        static function isPostImage()
        {
            global $post;
            return $post->post_type === 'attachment' && !empty($post->post_mime_type) && strpos($post->post_mime_type, 'image') === 0;
        }

        static function getPostImage($id, $size, $args, $remove_sizes = null, $default_img = null)
        {
            $img = '';

            if (empty($id) && self::isPostImage()) {
                $img = wp_get_attachment_image(get_the_ID(), $size, false, $args);

            } else if (has_post_thumbnail($id)) {
                $img = get_the_post_thumbnail($id, $size, $args);
            }

            if (!empty($default_image) && empty($img)) {
                $img = $default_img;
            }

            if (!empty($img) && !empty($remove_sizes)) {
                $img = self::removeSizeAttributes($img, $remove_sizes);
            }
            return $img;
        }

        static function getAltText( $id, $default ) {
            $r = trim( wp_strip_all_tags( get_post_meta( $id, '_wp_attachment_image_alt', true ) ) );
            return empty($r) ? $default : $r;
        }
    }
}

if(! class_exists( 'PG_Helper' )) {
    class PG_Helper
    {

        static function getPostFromSlug($slug_or_id, $post_type)
        {
            if (is_numeric($slug_or_id)) {
                return $slug_or_id;
            }
            return get_page_by_path($slug_or_id, OBJECT, $post_type);
        }

        static function getTermFromSlug($slug_or_id, $taxonomy)
        {
            if (is_numeric($slug_or_id)) {
                return $slug_or_id;
            }
            switch ($taxonomy) {
                case 'category':
                    return get_category_by_slug($slug_or_id);
                default:
                    return get_term_by('slug', $slug_or_id, $taxonomy);
            }
        }

        static function getTermIDFromSlug($slug_or_id, $taxonomy, $def = -1)
        {
            if (is_numeric($slug_or_id)) {
                return $slug_or_id;
            }
            $term = self::getTermFromSlug($slug_or_id, $taxonomy);
            return $term ? $term->term_id : $def;
        }

        static function addAttributesToElements($tag, $attrs, $html)
        {
            $attr_str = '';

            foreach ($attrs as $name => $val) {
                $attr_str .= " {$name}";
                if (!is_null($val)) {
                    $attr_str .= "=\"{$val}\"";
                }
            }

            if (!empty($attr_str)) {
                $html = str_replace("<{$tag} ", "<{$tag}{$attr_str} ", $html);
                $html = str_replace("<{$tag}>", "<{$tag}{$attr_str}>", $html);
            }

            return $html;
        }

        static $shown_posts = array();

        static function rememberShownPost($p = null)
        {
            global $post;
            if (empty($p)) {
                $p = $post;
            }
            if (!empty($p) && !in_array($p->ID, self::$shown_posts)) {
                self::$shown_posts[] = $p->ID;
            }
        }

        static function getShownPosts()
        {
            return self::$shown_posts;
        }

        static function getInsightMetaFields()
        {
            $list = array();
            $meta = get_post_meta(get_the_ID());
            if ($meta) {
                foreach ($meta as $key => $values) {
                    if (strpos($key, '_') !== 0) {
                        $list[] = $key;
                    }
                }
            }
            echo '<!-- PG_FIELDS:' . implode(',', $list) . '-->';
        }

        static function getRelationshipFieldValue($field)
        {
            if (function_exists('get_field')) {
                return get_field($field, false, false);
            } else {
                $value = get_post_meta(get_the_ID(), $field);
                if (empty($value)) {
                    return null;
                }
                if (count($value) === 1) {
                    if (strpos($value[0], 'a:') >= 0 && strpos($value[0], '{') >= 0) {
                        return unserialize($value[0]);
                    }
                    if (is_string($value[0])) {
                        return explode(',', $value[0]);
                    }
                }
                return $value;
            }
        }

        static function getPostIdList($value)
        {
            if (empty($value)) {
                return array(-1);
            }
            if (is_string($value)) {
                $value = explode(',', $value);
            }
            if (is_numeric($value)) {
                $value = array($value);
            }
            if (is_array($value) && count($value) === 0) {
                $value = array(-1);
            }
            return $value;
        }

        static function getBreadcrumbs($type = 'parents', $add_home = false, $home_label = '')
        {
            global $post;

            $r = array();

            if ($type === 'parents') {
                $parents = get_post_ancestors($post->ID);
                foreach ($parents as $parent_id) {
                    $p = get_post($parent_id);
                    $r[] = array(
                        'name' => get_the_title($p),
                        'link' => get_permalink($p)
                    );
                }
            } else {
                $category = get_the_category($post->ID);

                if (!empty($category)) {
                    $parents = get_ancestors($category[0]->term_id, 'category');

                    array_unshift($parents, $category[0]->term_id);

                    foreach ($parents as $parent_id) {
                        $p = get_category($parent_id);
                        $r[] = array(
                            'name' => $p->name,
                            'link' => get_category_link($p)
                        );
                    }
                }
            }

            array_unshift($r, array(
                'name' => get_the_title($post),
                'link' => get_permalink($post)
            ));

            if ($add_home) {
                $r[] = array(
                    'name' => $home_label,
                    'link' => home_url()
                );
            }

            return array_reverse($r);
        }

        static function getArray( $d, $separator = ',' ) {
            if(is_array( $d )) return $d;
            if(is_null( $d ) || $d === '') return array();
            if(is_string( $d )) {
                return array_map('trim', explode( $separator, $d));
            } else {
                return array( $d );
            }
        }

        static function getTaxonomyQuery( $taxonomy, $terms ) {
            $is_or = true;
            if(is_string( $terms )) {
                if(strpos( $terms, '+') !== false) {
                    $is_or = false;
                }
            }
            $terms = self::getArray( $terms, $is_or ? ',' : '+');
            if( count( $terms ) === 0 ) return null;

            $field = 'term_id';
            for($i = 0; $i < count( $terms ); $i++) {
                if(!is_numeric( $terms[$i] )) {
                    $field = 'slug';
                    break;
                }
            }

            return array(
                'taxonomy' => $taxonomy,
                'field' => $field,
                'terms' => $terms,
                'include_children' => true,
                'operator' => $is_or ? 'IN' : 'AND'
            );
        }
    }
}

if(! class_exists( 'PG_Blocks' )) {
    class PG_Blocks
    {

        static $helpers_registered = false;

        static $recursive_level = 0;

        static function register_block_type($reg_args)
        {
            if(empty($reg_args[ 'base_url' ])) {
                $reg_args[ 'base_url' ] = get_template_directory_uri();
            }

            if(empty($reg_args[ 'base_path' ])) {
                $reg_args[ 'base_path' ] = get_template_directory();
            }

            $base_url = trailingslashit($reg_args[ 'base_url' ] );

            if (!self::$helpers_registered) {
                self::$helpers_registered = true;

                wp_register_script('pg-blocks-controls',
                    $base_url . 'blocks/pg-blocks-controls.js',
                    array('wp-blocks', 'wp-block-editor', 'wp-server-side-render', 'wp-media-utils', 'wp-data', 'wp-element'));

                wp_register_style('pg-blocks-controls-style',
                    $base_url . 'blocks/pg-blocks-controls.css',
                    array());
            }

            $handle_prefix = 'block-' . str_replace('/', '-', $reg_args['name']);
            $editor_script_handle = $handle_prefix . '-script';
            $just_name = basename($reg_args['name']);
            $slug = dirname($reg_args['name']);

            $style_handle = null;
            $script_handle = null;

            if (!empty($reg_args['enqueue_style'])) {
                $style_handle = 'block-' . md5($reg_args['enqueue_style']);
                wp_register_style($style_handle, $reg_args['enqueue_style'], array());
            }

            $editor_style_handle = 'pg-blocks-controls-style';

            if (!empty($reg_args['enqueue_editor_style'])) {
                $editor_style_handle = 'block-editor-' . md5($reg_args['enqueue_editor_style']);
                wp_register_style($editor_style_handle, $reg_args['enqueue_editor_style'], array('pg-blocks-controls-style'));
            }

            $script_dependencies = array('wp-blocks', 'wp-block-editor', 'wp-server-side-render', 'wp-media-utils', 'wp-data', 'wp-element', 'pg-blocks-controls');

            if (!empty($reg_args['enqueue_script'])) {
                $script_handle = 'block-script-' . md5($reg_args['enqueue_script']);
                wp_register_style($script_handle, $reg_args['enqueue_script'], array());
            }

            wp_register_script($editor_script_handle,
                $base_url . $reg_args[ 'js_file' ], $script_dependencies);

            wp_localize_script($editor_script_handle,
                'pg_project_data_' . str_replace('-', '_', $slug),
                array(
                    'url' => $base_url,
                )
            );

            register_block_type($reg_args['name'], array(
                    'render_callback' => empty($reg_args['dynamic']) ? null : function ($attributes, $content, $block) use ($reg_args) {
                        self::$recursive_level++;
                        if (self::$recursive_level > 10) {
                            self::$recursive_level--;
                            return 'Too many nested blocks... Are you including a post within itself?';
                        }
                        ob_start();
                        $args = array('attributes' => $attributes, 'content' => $content, 'block' => $block);
                        $template = trailingslashit($reg_args[ 'base_path' ]) . $reg_args['render_template'];
                        if(file_exists( $template )) {
                            require $template;
                        } else {
                            echo "<div>Dynamic block template $template not found.</div>";
                        }
                        self::$recursive_level--;
                        return ob_get_clean();
                    },
                    'editor_script' => $editor_script_handle,
                    'editor_style' => $editor_style_handle,
                    'style' => $style_handle,
                    'script' => $script_handle,
                    'attributes' => $reg_args['attributes'],
                    'supports' => isset($reg_args['supports']) ? $reg_args['supports'] : array()
                )
            );
        }

        static function getDefault($args, $prop, $subprop = null)
        {
            if (isset($args['block']->block_type->attributes[$prop]['default'])) {
                if ($subprop) {
                    if (isset($args['block']->block_type->attributes[$prop]['default'][$subprop])) {
                        return $args['block']->block_type->attributes[$prop]['default'][$subprop];
                    } else {
                        return null;
                    }
                } else {
                    return $args['block']->block_type->attributes[$prop]['default'];
                }
            }
            return null;
        }

        static function getAttribute($args, $prop, $use_default = true)
        {
            $val = isset($args['attributes']) && isset($args['attributes'][$prop]) ? $args['attributes'][$prop] : null;
            if ($val === null || $val === '' && $use_default) {
                $val = self::getDefault($args, $prop);
            }
            return $val;
        }

        static function getAttributeAsPostIds($args, $prop)
        {
            $r = array();
            $list = self::getAttribute($args, $prop);
            if (is_array($list)) {
                foreach ($list as $item) {
                    $r[] = $item['id'];
                }
            }
            if (count($r) === 0) $r[] = 0;
            return $r;
        }

        static function getInnerContent($args)
        {
            return isset($args['content']) ? $args['content'] : '';
        }

        static function getImageUrl($args, $prop, $size, $use_default = true)
        {
            $a = $args['attributes'];
            if (!isset($a[$prop])) return $use_default ? self::getDefault($args, $prop, 'url') : null;
            if (!empty($a[$prop]['url'])) {
                return $a[$prop]['url'];
            }
            if (empty($a[$prop]['id'])) return $use_default ? self::getDefault($args, $prop, 'url') : null;
            if (!empty($a[$prop]['size'])) {
                $size = $a[$prop]['size'];
            }
            return PG_Image::getUrl($a[$prop]['id'], $size);
        }

        static function getImageSVG($args, $prop, $use_default = true)
        {
            $a = $args['attributes'];
            if (!isset($a[$prop])) return $use_default ? self::getDefault($args, $prop, 'svg') : null;
            if (!empty($a[$prop]['svg'])) {
                return $a[$prop]['svg'];
            }
            return null;
        }

        static function getLinkUrl($args, $prop, $use_default = true)
        {
            $a = self::getAttribute($args, $prop);
            if (is_array($a) && isset($a['url'])) {
                $val = $a['url'];
            } else {
                $val = $a;
            }
            if ($val === null || $val === '') $val = $use_default ? self::getDefault($args, $prop, 'url') : $val;
            return $val;
        }

        static function mergeInlineSVGAttributes($svg, $props) {
            foreach($props as $prop => $val) {
                if($prop === 'className') $prop = 'class';
                if(is_array($val)) {
                    $r = '';
                    foreach($val as $key => $v) {
                        $key = preg_replace_callback("/([A-Z])/g", function($m) {
                            return '-'.strtolower($m[1]);
                        }, $key);
                        $r .= "$key:$v;";
                    }
                    $val = $r;
                }
                $q = '"';
                if(strpos($val, '"') >= 0) {
                    $val = str_replace('"', "&quot;", $val);
                }
                $re = "/(<svg[^>]*\\s*)($prop=\"[^\"]*\")/i";
                if(preg_match($re, $svg)) {
                    $svg = preg_replace($re, '$1' . $prop . '='.$q . $val . $q, $svg);
                } else {
                    $svg = str_replace('<svg', "<svg $prop={$q}{$val}{$q}", $svg);
                }
            }
            return $svg;
        }

        static function setupEditedPost() {
            global $wp_query, $post;
            if(!empty($_GET['context']) && $_GET['context'] === 'edit') {
                $referer = wp_get_raw_referer();
                if (!empty($referer)) {
                    $url_info = parse_url($referer);
                    $query = null;
                    parse_str($url_info['query'], $query);
                    if(!empty($query['post'])) {
                        $post = get_post($query['post']);
                        if(!empty($post)) {
                            $wp_query->setup_postdata( $post );
                        }
                    }
                }
            }
        }
    }
}