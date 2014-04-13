<div id="header-wrapper">
	<div id="header-image">
		<img src="<?php bloginfo('stylesheet_directory') ?>/images/header_image.jpg" width="961" height="175" />
		
		<?php
			$blog_id = get_cat_ID( 'blog' );
			$blog_link = get_category_link( $blog_id );	
		?>
	    
		<div id="blog-link"><a href="<?php echo esc_url( $blog_link ); ?>"><img src="<?php bloginfo('stylesheet_directory') ?>/images/sm_blog_icon.png" width="160" height="144"></a></div>
	</div>
	<div id="nav-wrapper">
		<div class="nav-spacer-left"></div>
		<?php wp_nav_menu( array( 'theme_location' => 'main', 'depth' => 1 ) ); ?>
		<div id="nav-end"></div>
		<div class="nav-spacer-right"></div>
	</div>
</div> <!-- end of header-wrapper -->