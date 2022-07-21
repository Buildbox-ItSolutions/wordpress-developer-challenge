<?php 
  
 	if(!class_exists('acf_pro') || !class_exists('acf')):
        // Define path and URL to the ACF plugin.
        define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
        define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );
        
        // Include the ACF plugin.
        include_once( MY_ACF_PATH . 'acf.php' );
        
        // Customize the url setting to fix incorrect asset URLs.
        add_filter('acf/settings/url', 'my_acf_settings_url');
        function my_acf_settings_url( $url ) {
            return MY_ACF_URL;
        }
        
        // (Optional) Hide the ACF admin menu item.
        add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
        function my_acf_settings_show_admin( $show_admin ) {
            return false;
        }
        
        
   endif;

  ?>    
<?php
  	// habilita o uso de imagens SVG no site
	function cc_mime_types($mimes) {
	 $mimes['svg'] = 'image/svg+xml';
	 return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	
	define('ALLOW_UNFILTERED_UPLOADS', true);
?><?php
	require_once "cptui.php";
	require_once "acf.php";
?> 
<?php 
	//Habilita imagens no menu
	add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
	
	function my_wp_nav_menu_objects( $items, $args ) {
		
		// loop
		foreach( $items as &$item ) {
			
			// vars
			$icon = get_field('icon', $item);
			
			// append icon
			if( $icon ) {
				$item->title = '<img width="30" height="24" src="'.$icon.'" data-pg-name="icon-films" class="d-block d-sm-none" wp-acf-get-field="icon" wp-acf-get-field-set="attr" wp-acf-get-field-set-attr="src"/>'. $item->title;
			}
		}
		// return
		return $items;	
	}
 ?>    
