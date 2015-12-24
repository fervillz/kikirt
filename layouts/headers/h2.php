<header id="masthead" class="site-header" role="banner">
<div class="row">
	<div class="well col-xs-12 col-sm-12 col-md-3 col-lg-3">
		<div class="site-branding">
			<?php if ( get_theme_mod( 'kikirt' ) ) : ?>
			    
			    <div class='site-logo'>
			        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'kikirt' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
			    </div>
				<?php else : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php $description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			<?php endif; ?>
		</div><!-- .site-branding -->
	</div>
	<div class="well col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kikirt' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
	<div class="well col-xs-12 col-sm-12 col-md-3 col-lg-3">
		<?php get_search_form(); ?>
	</div>
</div>
</header><!-- #masthead -->