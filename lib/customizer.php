<?php
/**
 * kikirt Theme Customizer.
 *
 * @package kikirt
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kikirt_customize_register( $wp_customize ) {

   // $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    general_panels($wp_customize);
    header_panels($wp_customize);
    sidebar_panels($wp_customize);
}

add_action( 'customize_register', 'kikirt_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kikirt_customize_preview_js() {
	wp_enqueue_script( 'kikirt_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'kikirt_customize_preview_js' );
