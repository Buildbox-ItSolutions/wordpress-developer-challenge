<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> style="margin: 0px; height: 100%; overflow: hidden;">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( ! get_option( 'site_icon' ) ) : ?>
		<link href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.svg" rel="shortcut icon" />
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="loader-wrapper">
		<svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
		   <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
		</svg>
	</div>
	<header id="header" role="banner">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-sm-4 page-header">

					<?php if(play_the_custom_logo()): 
						play_the_custom_logo();
					else : ?>
						<a class="logo" href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="103" /></a>
					<?php endif; ?>

					<?php if ( get_header_image() ) : ?>
						<div class="custom-header">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
							</a>
						</div>
					<?php endif; ?>

				</div><!-- .page-header-->

				<div id="main-navigation" class="col-lg-8 col-sm-8 navbar navbar-default hidden-xs">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-navigation">
						<span class="sr-only"><?php _e( 'Toggle navigation', 'odin' ); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand visible-xs-block" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					</div>
					<nav class="collapse navbar-collapse navbar-main-navigation" role="navigation">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'main-menu',
									'depth'          => 2,
									'container'      => false,
									'menu_class'     => 'nav navbar-nav',
									'fallback_cb'    => 'Play_Bootstrap_Nav_Walker::fallback',
									'walker'         => new Play_Bootstrap_Nav_Walker()
								)
							);
						?>
					</nav><!-- .navbar-collapse -->
				</div><!-- #main-navigation-->
			</div><!-- .row-->
		</div><!-- .container-->
	</header><!-- #header -->
