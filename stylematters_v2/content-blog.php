<?php /* Start the Loop */ ?>

<div id="main-wrapper" <?php post_class(); ?>>
	<div id="title-wrapper">
		<div id="title">STYLE CHATTER</div>
		<div class="rule"></div>
	</div>
	<div class="column_background">	
		<div id="content-wrapper">
			
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="content-callout">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</div>
			<div class="content-main blog">
				<?php the_content(); ?>
			</div>
			<div class="breaker_full"></div>
			<?php endwhile; ?>

			<div class="blog_navigation"><p>
			<?php echo posts_nav_link(' ', 'Newer Posts', 'Older Posts'); ?>
			</p></div>

			<div class="note" style="display: none;">this is a blog page</div>
		</div> <!-- end of content-wrapper -->

		<div id="sidebar-wrapper">
			<?php get_template_part( 'sidebar', 'blog' ); ?>
		</div>  <!-- end of sidebar-wrapper -->
	</div>  <!-- end of column_background -->
</div>  <!-- end of main-wrapper -->
	
