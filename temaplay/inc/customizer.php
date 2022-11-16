<?php
function playtheme_customizer( $wp_customize ) {
    
    
    // Copyright Section
    $wp_customize->add_section(
        'sec_copyright',
        array(
            'title' => __( 'Copyright Settings', 'playtheme' ),
            'description' => __( 'Copyright Settings', 'playtheme' )
        )
    );

            $wp_customize->add_setting(
                'set_copyright',
                array(
                    'type' => 'theme_mod',
                    'default' => __( 'Copyright X - All Rights Reserved', 'playtheme' ),
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_copyright',
                array(
                    'label' => __( 'Copyright Information', 'playtheme' ),
                    'description' => __( 'Please, type your copyright here', 'playtheme' ),

                    'section' => 'sec_copyright',
                    'type' => 'text'
                )
            ); 

                    
}
add_action( 'customize_register', 'playtheme_customizer' );