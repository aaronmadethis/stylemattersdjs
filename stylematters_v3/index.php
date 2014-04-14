<?php
get_header();
get_template_part( 'nav' );
?>
		<div class="clear"></div>
		<div id="page-body" >
		<div id="page-container">
			<a name="page_top"></a>
		<?php global $post; ?>

		<?php if( is_home() || is_front_page() ) : ?>
			<?php get_template_part( 'content', 'home' ); ?>
		<?php else : ?>
			<?php if ( have_posts() ) : ?>

				<?php if( is_category() && in_category( 'blog' ) ) : ?>
					<div id="container" class="category" >
						<?php get_template_part( 'content', 'blog' ); ?>
					</div><!-- end of container -->

				<?php elseif( is_page() && in_category( 'deejays' )  ) : ?>
					<div id="container" class="page djs deejays" >
						<?php get_template_part( 'content', 'djs' ); ?>
					</div><!-- end of container -->

				<?php elseif( is_page() && in_category( 'qa' )  ) : ?>
					<div id="container" class="page q_a" >
						<?php get_template_part( 'content', 'q_a' ); ?>
					</div><!-- end of container -->

				<?php elseif( is_page() && in_category( 'testimonial' )  ) : ?>
					<div id="container" class="page testimonial" >
						<?php get_template_part( 'content', 'testimonial' ); ?>
					</div><!-- end of container -->

				<?php elseif( 'sm_testimonial' == get_post_type( $post->ID ) ) : ?>
					<div id="container" class="page testimonial-single" >
						<?php get_template_part( 'content', 'testimonial_single' ); ?>
					</div><!-- end of container -->

				<?php elseif(is_archive() && in_category( 'blog' ) ) : ?>
					<div id="container" class="category" >
						<?php get_template_part( 'content', 'blog' ); ?>
					</div><!-- end of container -->

				<?php else : ?>
					<div id="container" class="standard">
						<?php get_template_part( 'content', 'standard' ); ?>
					</div><!-- end of container -->

				<?php endif; /*is_page*/ ?>
				
			<?php else : /*have_posts*/ ?>
				<div id="no-content">
					There are no posts or pages.
				</div>
			<?php endif; /*have_posts*/ ?>
		<?php endif; /*is_home*/ ?>
		<?php get_footer(); ?>
		</div><!-- end of page-container -->
		</div><!-- end of page-body -->
		<div id="page-body-bottom"></div>
		</div><!-- end of page-scroll -->
	</div><!-- end of page-wrapper -->