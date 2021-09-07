<?php
/**
 * Play admin functions.
 */

/**
 * Scripts customizados para admin.
 */
function play_admin_scripts() {
	wp_enqueue_style( 'play-inc-admin', get_template_directory_uri() . '/inc/assets/css/custom-admin.css' );
}

add_action( 'admin_enqueue_scripts', 'play_admin_scripts' );
add_action( 'login_enqueue_scripts', 'play_admin_scripts' );

/**
 * Remover logo wp do admin.
 */
function play_admin_adminbar_remove_logo() {
	global $wp_admin_bar;

	$wp_admin_bar->remove_menu( 'wp-logo' );
}

add_action( 'wp_before_admin_bar_render', 'play_admin_adminbar_remove_logo' );

/**
 * Footer customizado.
 */
function play_admin_footer() {
	echo date( 'Y' ) . ' - ' . get_bloginfo( 'name' );
}

add_filter( 'admin_footer_text', 'play_admin_footer' );

/**
 * URL do site na logo.
 */
function play_admin_logo_url() {
	return home_url();
}

add_filter( 'login_headerurl', 'play_admin_logo_url' );

/**
 * Título do site na logo.
 */
function play_admin_logo_title($headertext) {
	$headertext = get_bloginfo( 'name' );
	return $headertext;
}
add_filter( 'login_headertext', 'play_admin_logo_title' );

/**
 * Remover widgets.
 */
function play_admin_remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );

	// Yoast's SEO Plugin Widget
	remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );
}

add_action( 'wp_dashboard_setup', 'play_admin_remove_dashboard_widgets' );

/**
 * Remover boas-vinds do painel.
 */
remove_action( 'welcome_panel', 'wp_welcome_panel' );
