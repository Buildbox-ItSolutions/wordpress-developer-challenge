<?php
/**
 * Play Helpers.
 */

/**
 * Pagination.
 *
 * @global array $wp_query   Current WP Query.
 * @global array $wp_rewrite URL rewrite rules.
 *
 * @param  int   $mid   Total of items that will show along with the current page.
 * @param  int   $end   Total of items displayed for the last few pages.
 * @param  bool  $show  Show all items.
 * @param  mixed $query Custom query.
 *
 * @return string       Return the pagination.
 */
function play_pagination( $mid = 2, $end = 1, $show = false, $query = null ) {

	// Evita mostrar o número de paginação se a rolagem infinita do JetPack estiver ativa. 
	if ( ! isset( $_GET[ 'infinity' ] ) ) {

		global $wp_query, $wp_rewrite;

		$total_pages = $wp_query->max_num_pages;

		if ( is_object( $query ) && null != $query ) {
			$total_pages = $query->max_num_pages;
		}

		if ( $total_pages > 1 ) {
			$url_base = $wp_rewrite->pagination_base;
			$big = 999999999;

			// Sets the paginate_links arguments.
			$arguments = apply_filters( 'play_pagination_args', array(
					'base'      => esc_url_raw( str_replace( $big, '%#%', get_pagenum_link( $big, false ) ) ),
					'format'    => '',
					'current'   => max( 1, get_query_var( 'paged' ) ),
					'total'     => $total_pages,
					'show_all'  => $show,
					'end_size'  => $end,
					'mid_size'  => $mid,
					'type'      => 'list',
					'prev_text' => __( '&laquo; Anterior', 'odin' ),
					'next_text' => __( 'Próximo &raquo;', 'odin' ),
				)
			);

			$pagination = '<div class="pagination-wrap">' . paginate_links( $arguments ) . '</div>';

			// Evita barras duplicadas no meio do url. 
			if ( $url_base ) {
				$pagination = str_replace( '//' . $url_base . '/', '/' . $url_base . '/', $pagination );
			}

			return $pagination;
		}
	}
}

/**
 * Obtenha um URL de imagem. 
 *
 * @param  int     $id      Image ID.
 * @param  int     $width   Image width.
 * @param  int     $height  Image height.
 * @param  boolean $crop    Image crop.
 * @param  boolean $upscale Force the resize.
 *
 * @return string
 */
function play_get_image_url( $id, $width, $height, $crop = true, $upscale = false ) {
	$resizer    = Play_Thumbnail_Resizer::get_instance();
	$origin_url = wp_get_attachment_url( $id );
	$url        = $resizer->process( $origin_url, $width, $height, $crop, $upscale );

	if ( $url ) {
		return $url;
	} else {
		return $origin_url;
	}
}

/**
 * Miniatura de postagem personalizada.
 *
 * @param  int     $width   Width of the image.
 * @param  int     $height  Height of the image.
 * @param  string  $class   Class attribute of the image.
 * @param  string  $alt     Alt attribute of the image.
 * @param  boolean $crop    Image crop.
 * @param  string  $class   Custom HTML classes.
 * @param  boolean $upscale Force the resize.
 *
 * @return string         Return the post thumbnail.
 */
function play_thumbnail( $width, $height, $alt, $crop = true, $class = '', $upscale = false ) {
	if ( ! class_exists( 'Play_Thumbnail_Resizer' ) ) {
		return;
	}

	$thumb = get_post_thumbnail_id();

	if ( $thumb ) {
		$image = play_get_image_url( $thumb, $width, $height, $crop, $upscale );
		$html  = '<img class="wp-image-thumb img-responsive ' . esc_attr( $class ) . '" src="' . esc_url( $image ) . '" width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '" alt="' . esc_attr( $alt ) . '" />';

		return apply_filters( 'odin_thumbnail_html', $html );
	}
}

/**
 * Define automaticamente a miniatura da postagem .
 *
 * Use:
 * add_action( 'the_post', 'play_autoset_featured' );
 * add_action( 'save_post', 'play_autoset_featured' );
 * add_action( 'draft_to_publish', 'play_autoset_featured' );
 * add_action( 'new_to_publish', 'play_autoset_featured' );
 * add_action( 'pending_to_publish', 'play_autoset_featured' );
 * add_action( 'future_to_publish', 'play_autoset_featured' );
 *
 * @global array $post WP post object.
 */
function play_autoset_featured() {
	global $post;

	if ( isset( $post->ID ) ) {
		$already_has_thumb = has_post_thumbnail( $post->ID );

		if ( ! $already_has_thumb ) {
			$attached_image = get_children( 'post_parent=' . $post->ID . '&post_type=attachment&post_mime_type=image&numberposts=1' );

			if ( $attached_image ) {
				foreach ( $attached_image as $attachment_id => $attachment ) {
					set_post_thumbnail( $post->ID, $attachment_id );
				}
			}
		}
	}
}

/**
 * Variáveis de depuração.
 */
function play_debug( $variable ) {
	echo '<pre>' . print_r( $variable, true ) . '</pre>';
	exit;
}

/**
 * Obter meta-campos de termo
 *
 * Usage:
 * <?php echo play_get_term_meta( $term_id, $field );?>
 */
function play_get_term_meta( $term_id, $field ) {
	// First try to get value in the new Term Meta WP API.
	if ( $value = get_term_meta( $term_id, $field, true ) ) {
		return $value;
	}

	// After, try to get in the old way (option API).
	$option_name = sprintf( 'play_term_meta_%s_%s', $term_id, $field );
	$value       = get_option( $option_name );

	// Upgrade to new update_term_meta().
	if ( false !== $value ) {
		update_term_meta( $term_id, $field, $value );
		delete_option( $option_name );
	}

	return $value;
}
