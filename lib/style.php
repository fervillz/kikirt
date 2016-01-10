<?php 

add_action( 'wp_head', 'sosimple_customizer_css' );

function sosimple_customizer_css() {
    ?>
    <style type="text/css">

    	.content-area{
        <?php if ( 'left' === get_theme_mod( 'sidebar_location' ) ) { ?>
 
		    float: right;
			width: 74%;
		 
		<?php } else if ( 'right' === get_theme_mod( 'sidebar_location' ) ) { ?>
		 
		    float: left;
			width: 74%;

		<?php } else{ ?>

			width: 100%;

		<?php } ?>
		}

		.site-content .widget-area {
        <?php if ( 'left' === get_theme_mod( 'sidebar_location' ) ) { ?>
 
		    float: left;
			width: 25%;

		<?php } else if ( 'right' === get_theme_mod( 'sidebar_location' ) ) { ?>
		 
		    float: right;
			width: 25%;

		<?php } else{ ?>

			display: none;

		<?php } ?>
		}
        
    </style>
    <?php
}


?>