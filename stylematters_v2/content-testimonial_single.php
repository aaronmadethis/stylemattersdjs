<?php
$last_page = get_page_by_title( "And we heard 'em say…" );
/* Start the Loop */

?>
<?php while ( have_posts() ) : the_post(); ?>

<div id="main-wrapper" <?php post_class(); ?>>
	<div id="title-wrapper">
		<div id="title"><?php echo strtoupper(get_the_title($post->ID)); ?> &nbsp;<span><a href="<?php echo get_page_link($last_page->ID) ?>">&laquo;Back To Testimonials</a></span></div>
		<div class="rule"></div>
	</div>
	<div class="column_background">	
		<div id="content-wrapper">

			<div class="content-main">
				<div class="testimonial_image">
					<?php
						$thumb_id = get_field('picture', $post->ID);
						$featured_image = wp_get_attachment_image_src( $thumb_id, 'full' );
						if($thumb_id !== ''){
							echo '<img src="' . $featured_image[0] . '" >';
						}
					?>
				</div>
				
				<div class="testimonial_text">
					<div class="testimonial-callout">
						<?php the_field('testimonial_excerpt', $post->ID); ?>
					</div>
					<div class="subline">
						&mdash;
						<?php the_field('byline', $post->ID); ?>,&nbsp;
						<span class="italic">
							<?php the_field('location', $post->ID); ?>
						</span>
					</div>
				</div>
				<div class="testimonial-full">
					<?php the_field('testimonial', $post->ID); ?>
				</div>
			</div> <!-- content-main -->

		</div> <!-- end of content-wrapper -->


		<div id="sidebar-wrapper">
			<?php get_template_part( 'sidebar', 'standard' ); ?>
		</div>  <!-- end of sidebar-wrapper -->
	</div>  <!-- end of column_background -->
</div>  <!-- end of main-wrapper -->

<?php endwhile; ?>