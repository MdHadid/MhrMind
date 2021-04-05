<?php

$mhrmind_fields[]= array(
    'type'        => 'textarea',
    'settings'    => 'newsletter_title',
    'label'       => esc_html__( 'Newsletter Title', 'mhrmind' ),
    'section'     => 'footer_section',
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => '.footer h2',
            'function' => 'html'
        ),
    ),
);

$mhrmind_fields[]= array(
    'type'        => 'textarea',
    'settings'    => 'newsletter_desc',
    'label'       => esc_html__( 'Newsletter Description', 'mhrmind' ),
    'section'     => 'footer_section',
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => '.footer span',
            'function' => 'html'
        ),
    ),
);

$mhrmind_fields[]= array(
    'type'        => 'text',
    'settings'    => 'newsletter_shortcode',
    'label'       => esc_html__( 'Newsletter Shortcode', 'mhrmind' ),
    'section'     => 'footer_section',
    'transport'   => 'postMessage',
);

$mhrmind_fields[]= array(
    'type'        => 'textarea',
    'settings'    => 'copyright_text',
    'label'       => esc_html__( 'Copyright Text', 'mhrmind' ),
    'section'     => 'footer_section',
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => '.footer .copyright p',
            'function' => 'html'
        ),
    ),
);
