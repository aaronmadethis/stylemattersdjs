<?php
	global $post;
?>
<?php
	$the_query = new WP_Query(
		array(
			'post_type' => 'sm_testimonial',
			'orderby' => 'post_date',
			'order' => 'ASC',
			'posts_per_page' => 100,
		)
	);
?>

<div id="main-wrapper" <?php post_class(); ?>>
	<div id="title-wrapper">
		<div id="title"><?php echo strtoupper(get_the_title($post->ID)); ?></div>
		<div class="rule"></div>
	</div>
	<div class="column_background">	
		<div id="content-wrapper">

			<?php if ( $the_query->have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

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
								<span class="continue_reading"><a href="<?php the_permalink(); ?>">Read more</a></span>
							</div>
							<div class="subline">
								&mdash;
								<?php the_field('byline', $post->ID); ?>,&nbsp;
								<span class="italic">
									<?php the_field('location', $post->ID); ?>
								</span>
							</div>
						</div>
						<div class="breaker_full"></div>
					</div> <!-- content-main -->

				<?php endwhile; ?>
			<?php endif; /*have_posts*/ ?>

		</div> <!-- end of content-wrapper -->


		<div id="sidebar-wrapper">
			<?php get_template_part( 'sidebar', 'standard' ); ?>
		</div>  <!-- end of sidebar-wrapper -->
	</div>  <!-- end of column_background -->
</div>  <!-- end of main-wrapper -->