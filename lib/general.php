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
      'title' => esc_html__( 'General Settings' ),
      'description' => 'Customize settings for site title, tagline, logo, favicon and social links', // Include html tags such as <p>.
      'priority' => 1, // Mixed with top-level-section hierarchy.
	) );

	//Site title and tagline
	section_sitetitle_tagline($wp_customize);

	//logo and favicon
	section_logo($wp_customize);

	//social_links links
	section_social_links_links($wp_customize);

	//sidebar
	section_sidebar($wp_customize);

}


function sosimple_social_icons_are_enabled() {
	if ( get_theme_mod( 'show_header_social_icons', false ) == true || get_theme_mod( 'show_footer_social_icons', false ) == true ) {
		return true;
	}
	else {
		return false;
	}
}



function section_sitetitle_tagline($wp_customize){

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->add_section( 
		'title_tagline', array(
	  	'title' => esc_html__( 'Site title and tagline' ),
	  	'description' => esc_html__( '' ),
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
		'kikirt_logo_favicon', 
		array(
		  	'title' => esc_html__( 'Logo and Favicon' ),
		  	'description' => 'Upload a logo to replace the default site name and description in the header',
    		'panel' => 'general_settings',
		  	'priority' => 2,
	) );

	$wp_customize->add_setting(
		'kikirt_logo',
    	array(
    		'sanitize_callback' => 'esc_url_raw',
    		)
    	);

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
    	'kikirt_logo', array(
        'label'    => esc_html__( 'Logo', 'kikirt' ),
        'section'  => 'kikirt_logo_favicon',
        'settings' => 'kikirt_logo',
    ) ) );

	$wp_customize->add_control( new WP_Customize_Site_Icon_Control( $wp_customize,
	    'site_icon',
	    array(
	    	'label' => 'Site Icon',
	    	'description' => 'The Site Icon is used as a browser and app icon for your site. Icons must be square, and at least 512px wide and tall.',
	        'section' => 'kikirt_logo_favicon',
	        'settings' => 'site_icon',
	) ) );
}

function section_social_links_links($wp_customize){

$wp_customize->add_section( 
	'social_links', 
	array(
	  	'title' => esc_html__( 'Social Links' ),
	  	'description' => 'Link your favorite social sites links. Put dash/minus(-) character to exclude an icon',
		'panel' => 'general_settings',
	  	'priority' => 3,
) );

$wp_customize->add_setting( 'show_header_social_icons', array(
		'default' => false,
) );

$wp_customize->add_control( 'show_header_social_icons', array(
		'label'    => __( 'Show Social Icons', 'sosimple' ) . ' '  . __( 'in Header', 'sosimple' ),
		'section'  => 'social_links',
		'type'     => 'checkbox',
		'priority' => 1,
	) );

$social_sites = 	
	array(
		"facebook",
		"twitter",
		"dribbble",
		"plus-google",
		"pinterest",
		"github",
		"tumblr",
		"youtube",
		"flickr",
		"vimeo",
		"instagram",
		"codepen-io",
		"linkedin",
		"reddit",
		"digg",
		"getpocket",
		"path",
		"dropbox",
		"skype",
		"mailto",
		"wordpress",
		);


for ($i = 0; $i <21; $i++){
	//socials
	$wp_customize->add_setting( $social_sites[$i].'_textbox', array( 'default' => $social_sites[$i].'.com', 'sanitize_callback' => 'esc_url_raw',) );
	$wp_customize->add_control( $social_sites[$i].'_textbox', array( 'label' => $social_sites[$i].' Link',  'active_callback' => 'sosimple_social_icons_are_enabled','section' => 'social_links','type' => 'text',));
}

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
             'active_callback' => 'sosimple_social_icons_are_enabled','section' => 'social_links',
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