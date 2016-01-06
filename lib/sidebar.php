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

function sosimple_sidebar_none_enabled() {
	if ( get_theme_mod( 'sidebar_setting', 'none' ) == 'none' ) {
		return true;
	}
	else {
		return false;
	}
}

function sosimple_sidebar_left_enabled() {
	if ( get_theme_mod( 'sidebar_setting', 'none' ) == 'left' ) {
		return true;
	}
	else {
		return false;
	}
}

function sosimple_sidebar_right_enabled() {
	if ( get_theme_mod( 'sidebar_setting', 'none' ) == 'right' ) {
		return true;
	}
	else {
		return false;
	}
}

function sosimple_sidebar_left_right_enabled() {
	if ( get_theme_mod( 'sidebar_setting', 'none' ) == 'left_right' ) {
		return true;
	}
	else {
		return false;
	}
}

function sidebar_panels($wp_customize){

	//add panel
	$wp_customize->add_panel( 'sidebar', array(
      'title' => esc_html__( 'Sidebars' ),
      'description' => 'Sidebar settings', // Include html tags such as <p>.
      'priority' => 3, // Mixed with top-level-section hierarchy.
	) );

	//
	section_sidebar($wp_customize);

}

function section_sidebar($wp_customize){

	$wp_customize->add_section( 
		'sidebar_position', 
		array(
		  	'title' => esc_html__( 'Sidebar Position' ),
		  	'description' => 'Link your favorite social sites links. ',
			'panel' => 'sidebar',
		  	'priority' => 3,
	) );

		//social links background color on hover
	$wp_customize->add_setting(
	    'sidebar_setting',
	    array(
	        'default' => 'none',
	        'sanitize_callback' => 'example_sanitize_choices',
	    )
	);

	$wp_customize->add_control(
	    'sidebar_setting',
	    array(
	        'type' => 'select',
	        'label' => 'Predefined Layouts',
	        'section' => 'sidebar_position',
	        'choices' => array(
	        	'none' => 'None',
	            'left' => 'Left',
	            'right' => 'Right',
	            'left_right' => 'Left & Right',
	        ),
	    )
	);

	

	$wp_customize->add_setting(
	    'sidebar_text',
	    array(
	        'default' => 'sample text',
	        'sanitize_callback' => 'esc_url_raw();',
	    )
	);

	$wp_customize->add_control(
	    'sidebar_text',
	    array(
	        'label' => 'None Layouts',
	        'section' => 'sidebar_position',
	        'active_callback' => 'sosimple_sidebar_none_enabled',
	    )
	);

}