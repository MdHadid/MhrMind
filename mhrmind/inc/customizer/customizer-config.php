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

	$wp_customize->add_section( 'general_section', array(
		'title'			=> esc_html__( 'General Settings', 'mhrmind' ),
		'priority'		=> 1,
		'description'	=> esc_html__( 'to change logo,favicon etc', 'mhrmind' ),
        'panel'          => 'theme_option',
	) );

	$wp_customize->add_section( 'top_header_section', array(
		'title'			=> esc_html__( 'Top Header Settings', 'mhrmind' ),
		'priority'		=> 2,
		'description'	=> esc_html__( 'Setting Your Top Header', 'mhrmind' ),
        'panel'          => 'theme_option',
    ) );

	$wp_customize->add_section( 'nav_section', array(
		'title'			=> esc_html__( 'Navigation Settings', 'mhrmind' ),
		'priority'		=> 3,
		'description'	=> esc_html__( 'Setting Your Menu', 'mhrmind' ),
        'panel'          => 'theme_option',
    ) );

    $wp_customize->add_section( 'banner_section', array(
        'title'         => esc_html__( 'Banner Settings', 'mhrmind' ),
        'priority'      => 4,
        'description'   => esc_html__( 'Setting Your Banner Banner', 'mhrmind' ),
        'panel'          => 'theme_option',
    ) );

    $wp_customize->add_section( 'blog_section', array(
        'title'         => esc_html__( 'Blog Settings', 'mhrmind' ),
        'priority'      => 5,
        'description'   => esc_html__( 'Setting Your Blog', 'mhrmind' ),
        'panel'          => 'theme_option',
    ) );

    $wp_customize->add_section( 'shop_section', array(
        'title'         => esc_html__( 'Shop Settings', 'mhrmind' ),
        'priority'      => 6,
        'description'   => esc_html__( 'Setting Your Shop', 'mhrmind' ),
        'panel'          => 'theme_option',
    ) );

    $wp_customize->add_section( 'newsletter_section', array(
        'title'         => esc_html__( 'Newsletter Settings', 'mhrmind' ),
        'priority'      => 7,
        'description'   => esc_html__( 'Setting Your Newsletter', 'mhrmind' ),
        'panel'          => 'theme_option',
    ) );

    $wp_customize->add_section( 'footer_section', array(
        'title'			=> esc_html__( 'Footer Settings', 'mhrmind' ),
        'priority'		=> 8,
        'description'	=> esc_html__( 'Setting Your Footer', 'mhrmind' ),
        'panel'          => 'theme_option',
    ) );
    $wp_customize->add_section( 'error_section', array(
        'title'			=> esc_html__( 'Error Page Settings', 'mhrmind' ),
        'priority'		=> 9,
        'description'	=> esc_html__( 'Setting Your Error Page', 'mhrmind' ),
        'panel'          => 'theme_option',
    ) );

    $wp_customize->add_section( 'styling_section', array(
        'title'			=> esc_html__( 'Styling Settings', 'mhrmind' ),
        'priority'		=> 10,
        'description'	=> esc_html__( 'Setting Your Color', 'mhrmind' ),
        'panel'          => 'theme_option',
    ) );

    $wp_customize->add_section( 'typography_section', array(
        'title'			=> esc_html__( 'Typography Settings', 'mhrmind' ),
        'priority'		=> 11,
        'description'	=> esc_html__( 'Setting Your font', 'mhrmind' ),
        'panel'          => 'theme_option',
    ) );
}

add_action( 'customize_register', 'mhrmind_customizer_sections' );

require get_template_directory() . '/inc/customizer/customizer-fields.php';
