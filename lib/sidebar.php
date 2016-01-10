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


/**function choice_callback( $control ) {
    $radio_setting = $control->manager->get_setting('sidebar_location')->value();
    $control_id = $control->id;
     
    if ( $control_id == 'sidebar_text'  && $radio_setting == 'none' ) return true;
    if ( $control_id == 'sidebar_text2' && $radio_setting == 'left' ) return true;
    if ( $control_id == 'sidebar_text3' && $radio_setting == 'right' ) return true;
     
    return false;
}
**/
function sidebar_panels($wp_customize){

	//add panel
	$wp_customize->add_panel( 'sidebar', array(
      'title' => esc_html__( 'Sidebars' ),
      'description' => 'Sidebar settings', // Include html tags such as <p>.
      'priority' => 3, // Mixed with top-level-section hierarchy.
	) );

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

	$wp_customize->add_setting(
	    'sidebar_location',
	    array(
	        'default' => 'none',
	        'transport' => 'postMessage'
	    )
	);

	$wp_customize->add_control(
	    'sidebar_location',
	    array(
	        'type' => 'select',
	        'label' => 'Predefined Layouts',
	        'section' => 'sidebar_position',
	        'choices' => array(
	        	'none' => 'None',
	            'left' => 'Left',
	            'right' => 'Right',
	        ),
	    )
	);
}