<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}


Kirki::add_config( 'mhrmind_customizer', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );


function mhrmind_customizer_sections($wp_customize){
    $wp_customize->add_panel( 'theme_option', array(
        'priority'    => 10,
        'title'       => esc_html__( 'Theme Options', 'mhrmind' ),
    ) );

	$wp_customize->add_section( 'header_section', array(
		'title'			=> esc_html__( 'Header Settings', 'mhrmind' ),
		'priority'		=> 2,
		'description'	=> esc_html__( 'Setting Your Header', 'mhrmind' ),
        'panel'          => 'theme_option',
    ) );

    $wp_customize->add_section( 'footer_section', array(
        'title'			=> esc_html__( 'Footer Settings', 'mhrmind' ),
        'priority'		=> 8,
        'description'	=> esc_html__( 'Setting Your Footer', 'mhrmind' ),
        'panel'          => 'theme_option',
    ) );
}

add_action( 'customize_register', 'mhrmind_customizer_sections' );

require get_template_directory() . '/inc/customizer/customizer-fields.php';
