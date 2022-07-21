<?php
/**
 * Class Name: PG_Smart_Walker_Nav_Menu
 * GitHub URI:
 * Description:
 * Version: 1.0
 * Author: Matjaz Trontelj - @pinegrow
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Based on WordPress Walker_Nav_Menu code
 *
 */


class PG_Smart_Walker_Nav_Menu extends Walker_Nav_Menu {

    public static $options = array(
        'top_element' => 'ul',
        'sub_element' => 'ul',
        'current_class' => 'current-menu-item',
        'sub_menu_class' => 'sub-menu',
        'item_id_prefix' => 'menu-item-',
        'template' => '<li id="{ID}" class="{CLASSES}">{LINK_BEFORE}<a {ATTRS}>{TITLE}</a>{LINK_AFTER}</li>'
    );

    /**
     * Get the begining or end part of the template
     *
     * @param boolean $start true for begining, false for end part
     */
    private function get_template_part( $start = true ) {
        $parts = explode('{SUB}', self::$options['template']);
        if(count($parts) == 2) {
            return $start ? $parts[0] : $parts[1];
        }
        //if {SUB} is missing from the template, assume the last closing tag is the end part
        $idx = strrpos(self::$options['template'], '</');
        if($idx !== false) {
            return $start ? substr(self::$options['template'], 0, $idx) : substr(self::$options['template'], $idx);
        }
    }

    /**
     * Starts the list before the elements are added.
     *
     * @see Walker::start_lvl()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $tag = $depth == 0 ? self::$options['top_element'] : self::$options['sub_element'];
        if(!empty($tag)) {
            $class = self::$options['sub_menu_class'];
            $output .= "\n$indent<$tag class=\"$class\">\n";
        }
    }

    /**
     * Ends the list of after the elements are added.
     *
     * @see Walker::end_lvl()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $tag = $depth == 0 ? self::$options['top_element'] : self::$options['sub_element'];
        if(!empty($tag)) {
            $output .= "$indent</$tag>\n";
        }
    }

    /**
     * Start the element output.
     *
     * @see Walker::start_el()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        /**
         * Filter the CSS class(es) applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
         * @param object $item    The current menu item.
         * @param array  $args    An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth   Depth of menu item. Used for padding.
         */
        $classes = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );

        foreach($classes as $i => $class) {
            if($classes[$i] == 'current-menu-item') {
                $classes[$i] = self::$options['current_class'];
            }
        }
        $class_names = join( ' ',  $classes);

        /**
         * Filter the ID applied to a menu item's list item element.
         *
         * @since 3.0.1
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param object $item    The current menu item.
         * @param array  $args    An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth   Depth of menu item. Used for padding.
         */
        $id = apply_filters( 'nav_menu_item_id', self::$options['item_id_prefix']. $item->ID, $item, $args, $depth );

        $output .= $indent;

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        /**
         * Filter the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $title  Title attribute.
         *     @type string $target Target attribute.
         *     @type string $rel    The rel attribute.
         *     @type string $href   The href attribute.
         * }
         * @param object $item  The current menu item.
         * @param array  $args  An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth Depth of menu item. Used for padding.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;

        $template = $this->get_template_part(true);
        $template = str_replace( '{LINK_BEFORE}', $args->link_before, $template);
        $template = str_replace( '{LINK_AFTER}', $args->link_after, $template);
        $template = str_replace( '{TITLE}', apply_filters( 'the_title', $item->title, $item->ID ), $template);

        $template = str_replace( '{ATTRS}', $attributes, $template);
        $template = str_replace( '{ID}', $id, $template);
        $template = str_replace( '{CLASSES}', $class_names, $template);

        $item_output .= $template;

        $item_output .= $args->after;

        /**
         * Filter a menu item's starting output.
         *
         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
         * no filter for modifying the opening and closing `<li>` for a menu item.
         *
         * @since 3.0.0
         *
         * @param string $item_output The menu item's starting HTML output.
         * @param object $item        Menu item data object.
         * @param int    $depth       Depth of menu item. Used for padding.
         * @param array  $args        An array of {@see wp_nav_menu()} arguments.
         */
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    /**
     * Ends the element output, if needed.
     *
     * @see Walker::end_el()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Page data object. Not used.
     * @param int    $depth  Depth of page. Not Used.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= $this->get_template_part(false)."\n"; //get the ending part of the template
    }

} // PG_Smart_Walker_Nav_Menu