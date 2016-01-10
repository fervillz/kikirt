<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kikirt
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kikirt' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php if ( get_theme_mod( 'kikirt_logo' ) ) : ?>
				<div class='site-logo'>
			        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'kikirt_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
			    </div>
			<?php else : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php $description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			<?php endif; ?>

		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kikirt' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php if ( get_theme_mod( 'show_header_social_icons' ) ): ?>
		<div class="social-links">
			<ul>
				<?php $social_sites = 	
					array(
						"facebook",
						"twitter",
						"dribbble",
						"plus.google",
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
					?>

				<?php for ($i = 0; $i <21; $i++): ?>
					<?php if ( get_theme_mod( $social_sites[$i].'_textbox' ) != 'http://-'): ?>
						<li class="item-<?php echo $social_sites[$i] ?>">
							<?php if ( !get_theme_mod( $social_sites[$i].'_textbox' ) ): ?>
								<a href="<?php echo 'http://'. get_theme_mod( $social_sites[$i].'_textbox', $social_sites[$i].'.com' ); ?>"></a>
							<?php else: ?>
								<a href="<?php echo get_theme_mod( $social_sites[$i].'_textbox', $social_sites[$i].'.com' ); ?>"></a>
							<?php endif; ?>
						</li>
					<?php endif; ?>
				<?php endfor; ?>

				</ul>
		</div><!-- .social-links -->
		<?php endif; ?>

	</header><!-- #masthead -->




<?php
    $example_position = get_theme_mod( 'layout-setting' );
    if( $example_position != '' ) {
        switch ( $example_position ) {
            case 'left':
                require get_template_directory() . '/layouts/headers/h1.php';
            
                break;
            case 'right':
                require get_template_directory() . '/layouts/headers/h2.php';
            echo "stringstring";
                break;
            case 'center':
              	require get_template_directory() . '/layouts/headers/h3.php';
                break;
        }
    }
?>


	<div id="content" class="site-content">
