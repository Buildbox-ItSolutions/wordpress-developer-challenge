<?php
/**
 * Template de tags customizado.
 */

if ( ! function_exists( 'play_classes_page_full' ) ) {

	/**
	 * Classes page full.
	 */
	function play_classes_page_full() {
		return 'col-md-12';
	}
}

if ( ! function_exists( 'play_classes_page_sidebar' ) ) {

	/**
	 * Classes page with sidebar.
	 */
	function play_classes_page_sidebar() {
		return 'col-md-9';
	}
}

if ( ! function_exists( 'play_classes_page_sidebar_aside' ) ) {

	/**
	 * Classes aside of page with sidebar.
	 */
	function play_classes_page_sidebar_aside() {
		return 'col-md-3 hidden-xs hidden-print widget-area';
	}
}

if ( ! function_exists( 'play_posted_on' ) ) {

	/**
	 * Print HTML with meta information for the current post-date/time and author.
	 */
	function play_posted_on() {
		if ( is_sticky() && is_home() && ! is_paged() ) {
			echo '<span class="featured-post">' . __( 'Sticky', 'play' ) . ' </span>';
		}

		// Set up and print post meta information.
		printf( '<span class="entry-date">%s <time class="entry-date" datetime="%s">%s</time></span> <span class="byline">%s <span class="author vcard"><a class="url fn n" href="%s" rel="author">%s</a></span>.</span>',
			__( 'Posted in', 'play' ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			__( 'by', 'play' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}
}

if ( ! function_exists( 'play_paging_nav' ) ) {

	/**
	 * Print HTML with meta information for the current post-date/time and author.
	 */
	function play_paging_nav() {
		$mid  = 2;     // Total of items that will show along with the current page.
		$end  = 1;     // Total of items displayed for the last few pages.
		$show = false; // Show all items.

		echo play_pagination( $mid, $end, false );
	}
}

if ( ! function_exists( 'play_the_custom_logo' ) ) {

	/**
	 * Displays the optional custom logo.
	 */
	function play_the_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}
}
