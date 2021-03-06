<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

<div id="main-wrapper" <?php post_class(); ?>>
	<div id="title-wrapper">
		<div id="title"><?php echo strtoupper(get_the_title()); ?></div>
		<div class="rule"></div>
	</div>
	<div class="column_background">	
		<div id="content-wrapper">
			<?php
				if(get_field('intro')){
					echo '<div class="content-callout">';
					the_field('intro');
					echo '</div>';
					echo '<div class="breaker"></div>';
				}
			?>
			<div class="content-main">
				<?php the_content(); ?>
			</div>
				<?php
				if( is_page('night-moves') && in_category( 'sm_events' )  ){
					echo stout_gc(1);
				}
				if(get_field('soundcloud_embed')){
					echo '<div class="breaker"></div><div class="content-main">';
					the_field('soundcloud_embed');
					echo '</div>';
				}
				?>
			<div class="note" style="display: none;">this is a standard page</div>
		</div> <!-- end of content-wrapper -->

		<div id="sidebar-wrapper">
			<?php get_template_part( 'sidebar', 'standard' ); ?>
		</div>  <!-- end of sidebar-wrapper -->
	</div>  <!-- end of column_background -->
</div>  <!-- end of main-wrapper -->
	
<?php endwhile; ?>