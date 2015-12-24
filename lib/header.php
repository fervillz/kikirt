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

function header_panels($wp_customize){

	//add panel
	$wp_customize->add_panel( 'header_settings', array(
      'title' => __( 'Header' ),
      'description' => 'Settings for header', // Include html tags such as <p>.
      'priority' => 2, // Mixed with top-level-section hierarchy.
	) );

	//
	section_design_layout($wp_customize);

}

function section_design_layout($wp_customize){
	$wp_customize->add_section(
    'header_options',
    array(
    	'panel' => 'header_settings',
        'title' => 'Header layouts',
        'description' => 'Based on bootstrap 3 grid system',
        'priority' => 1,
    )
	);

	//social links background color on hover
	$wp_customize->add_setting(
	    'layout-setting',
	    array(
	        'default' => 'left',
	        'sanitize_callback' => 'example_sanitize_choices',
	    )
	);

	$wp_customize->add_control(
	    'layout-setting',
	    array(
	        'type' => 'radio',
	        'label' => 'Predefined Layouts',
	        'section' => 'header_options',
	        'choices' => array(
	            'left' => 'Left',
	            'right' => 'Right',
	            'center' => 'Center',
	        ),
	    )
	);

	//social links background color on hover
	$wp_customize->add_setting(
	    'social-setting',
	    array(
	        'default' => 'left',
	        'sanitize_callback' => 'example_sanitize_choices',
	    )
	);

	$wp_customize->add_control(
	    'social-setting',
	    array(
	        'type' => 'radio',
	        'label' => 'Predefined Layouts',
	        'section' => 'header_options',
	        'choices' => array(
	            'left' => 'Left',
	            'right' => 'Right',
	            'center' => 'Center',
	        ),
	    )
	);
}

function example_sanitize_choices( $input, $setting ) {
    global $wp_customize;
 
    $control = $wp_customize->get_control( $setting->id );
 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}
