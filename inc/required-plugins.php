<?php


add_action( 'tgmpa_register', 'play_register_required_plugins' );

function play_register_required_plugins() {

	$plugins = array(	
	
		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),	

	);
	
	$config = array(
		'id'           => 'play',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => 'O plugin Advanced Custom Fields é obrigatório para funcionalidade total do Play ',                      // Message to output right before the plugins table.	
	);

	tgmpa( $plugins, $config );
}