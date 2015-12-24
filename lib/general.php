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

function general_panels($wp_customize){

	//add panel
	$wp_customize->add_panel( 'general_settings', array(
      'title' => __( 'General Settings' ),
      'description' => 'Customize settings for site title, tagline, logo, favicon and social links', // Include html tags such as <p>.
      'priority' => 1, // Mixed with top-level-section hierarchy.
	) );

	//Site title and tagline
	section_sitetitle_tagline($wp_customize);

	//logo and favicon
	section_logo($wp_customize);

	//social_links links
	section_social_links_links($wp_customize);


}

function section_sitetitle_tagline($wp_customize){

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->add_section( 
		'title_tagline', array(
	  	'title' => __( 'Site title and tagline' ),
	  	'description' => __( '' ),
	  	'panel' => 'general_settings',
	  	'priority' => 1,
	) );

	$wp_customize->add_control(
	    'blogname',
	    array(
	    	'label' => 'Site Title',
	        'section' => 'title_tagline',
	    )
	);

	$wp_customize->add_control(
	    'blogdescription',
	    array(
	    	'label' => 'Tagline',
	        'section' => 'title_tagline',
	    )
	);

}

function section_logo($wp_customize){

	$wp_customize->get_setting( 'site_icon' )->transport  = 'postMessage';

	$wp_customize->add_section( 
		'logo_favicon', 
		array(
		  	'title' => __( 'Logo and Favicon' ),
		  	'description' => 'Upload a logo to replace the default site name and description in the header',
    		'panel' => 'general_settings',
		  	'priority' => 2,
	) );

	$wp_customize->add_setting( 'logo_favicon',
        'sanitize_callback' == 'esc_url_raw'
    );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kikirt', array(
        'label'    => __( 'Logo', 'kikirt' ),
        'section'  => 'logo_favicon',
        'settings' => 'logo_favicon',
        'sanitize_callback' => 'esc_url_raw',
    ) ) );

	$wp_customize->add_control( new WP_Customize_Site_Icon_Control( $wp_customize,
	    'site_icon',
	    array(
	    	'label' => 'Site Icon',
	    	'description' => 'The Site Icon is used as a browser and app icon for your site. Icons must be square, and at least 512px wide and tall.',
	        'section' => 'logo_favicon',
	        'settings' => 'logo_favicon',
	        'sanitize_callback' => 'esc_url_raw',
	) ) );
}

function section_social_links_links($wp_customize){

$wp_customize->add_section( 
	'social_links', 
	array(
	  	'title' => __( 'Social Links' ),
	  	'description' => 'Link your favorite social sites links. ',
		'panel' => 'general_settings',
	  	'priority' => 3,
) );

	//facebook
$wp_customize->add_setting('fb_textbox', array( 'default' => 'facebook.com', 'sanitize_callback' => 'esc_url_raw',) );
$wp_customize->add_control( 'fb_textbox', array( 'label' => 'Facebook Link', 'section' => 'social_links','type' => 'text',));

//twitter
$wp_customize->add_setting('tw_textbox', array( 'default' => 'twitter.com', 'sanitize_callback' => 'esc_url_raw', ) );
$wp_customize->add_control( 'tw_textbox', array( 'label' => 'Twitter Link', 'section' => 'social_links','type' => 'text',));

//dribbble
$wp_customize->add_setting('dribbble_textbox', array( 'default' => 'dribbble.com', 'sanitize_callback' => 'esc_url_raw', ) );
$wp_customize->add_control( 'dribbble_textbox', array( 'label' => 'dribbble Link', 'section' => 'social_links','type' => 'text',));

//plusgoogle
$wp_customize->add_setting('plusgoogle_textbox', array( 'default' => 'plusgoogle.com', 'sanitize_callback' => 'esc_url_raw', ) );
$wp_customize->add_control( 'plusgoogle_textbox', array( 'label' => 'google plus Link', 'section' => 'social_links','type' => 'text',));

//pinterest
$wp_customize->add_setting('pinterest_textbox', array( 'default' => 'pinterest.com', 'sanitize_callback' => 'esc_url_raw', ) );
$wp_customize->add_control( 'pinterest_textbox', array( 'label' => 'pinterest Link', 'section' => 'social_links','type' => 'text',));

//github
$wp_customize->add_setting('github_textbox', array( 'default' => 'github.com', 'sanitize_callback' => 'esc_url_raw', ) );
$wp_customize->add_control( 'github_textbox', array( 'label' => 'github Link', 'section' => 'social_links','type' => 'text',));

//tumblr
$wp_customize->add_setting('tumblr_textbox', array( 'default' => 'tumblr.com', 'sanitize_callback' => 'esc_url_raw', ) );
$wp_customize->add_control( 'tumblr_textbox', array( 'label' => 'tumblr Link', 'section' => 'social_links','type' => 'text',));

//youtube
$wp_customize->add_setting('youtube_textbox', array( 'default' => 'youtube.com', 'sanitize_callback' => 'esc_url_raw', ) );
$wp_customize->add_control( 'youtube_textbox', array( 'label' => 'youtube Link', 'section' => 'social_links','type' => 'text',));

//linkedin
$wp_customize->add_setting('linkedin_textbox', array( 'default' => 'linkedin.com', 'sanitize_callback' => 'esc_url_raw', ) );
$wp_customize->add_control( 'linkedin_textbox', array( 'label' => 'linkedin Link', 'section' => 'social_links','type' => 'text',));

//social_links links background color on hover
$wp_customize->add_setting(
    'color-setting',
    array(
        'default' => '#66d344',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'color-setting',
        array(
            'label' => 'Color Setting - Background Hover',
            'section' => 'social_links',
            'settings' => 'color-setting',
        )
    )
);

$social_links = get_theme_mod( 'social_links-setting' );
    if( $social_links != '' ) {
        switch ( $social_links ) {
            case 'left':
                require get_template_directory() . '/customizer/sections/header/social_links/setting.php';
                echo "show";
                break;

            case 'right':
              echo "hidden";  
                break;
        }
}

}