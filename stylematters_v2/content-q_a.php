<?php
	global $post;
?>
<?php
	$the_query = new WP_Query(
		array(
			'post_type' => 'sm_qa',
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

					<a name="<?php the_field('question', $post->ID); ?>"></a>
					<div class="content-main">
						<span class="subhead">Q: <?php the_field('question', $post->ID); ?></span><br >
						<br >A: <?php the_field('answer', $post->ID); ?>
						<div class="page_top"><a href="#page_top">BACK TO TOP</a></div>
						<div class="breaker_full"></div>
					</div> <!-- content-main -->

				<?php endwhile; ?>
			<?php endif; /*have_posts*/ ?>
			<?php rewind_posts(); ?>
		</div> <!-- end of content-wrapper -->


		<div id="sidebar-wrapper">
			<div class="sidebar-item">
				<div class="title">QUESTIONS</div>

				<?php if ( $the_query->have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="quesion-item">
					<a href="#<?php the_field('question', $post->ID); ?>">Q: <?php the_field('question', $post->ID); ?><span class="arrow"></span></a>
				</div>
				<?php endwhile; ?>
				<?php endif; /*have_posts*/ ?>

			</div>
		</div>  <!-- end of sidebar-wrapper -->
	</div>  <!-- end of column_background -->
</div>  <!-- end of main-wrapper -->