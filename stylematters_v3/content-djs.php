<?php /* Start the Loop */ ?>
<?php
	while ( have_posts() ) : the_post();
	$djs = get_field('djs_page');
	//print_r($djs);
?>

<div id="main-wrapper" <?php post_class(); ?>>

	<div id="title-wrapper">
		<div id="title"><?php echo strtoupper(get_the_title()); ?></div>
		<div class="rule"></div>
		<div id="deejay-gallery">
			<div id="dj-slideshow" class="content ">
				<div class="slideshow_loader"></div>

				<?php
					$dj_slideshow = get_page_by_title( "New DJ Slideshow", 'OBJECT', 'sm_slideshow' );
					$horizontal_images = get_field('horizontal_images', $dj_slideshow->ID );
					$vert_images = get_field('vertical_images', $dj_slideshow->ID );
				?>
				<ul id="slide-wrap-1" class="slide-container horz">
					<?php
						shuffle($horizontal_images);
						foreach($horizontal_images as $images){
							echo '<li class="hide"><img src="' . $images['h_image']['sizes']['dj_horz'] . '" ></li>';
						}
					?>
				</ul>
				<ul id="slide-wrap-2" class="slide-container horz">
					<?php
						shuffle($horizontal_images);
						foreach($horizontal_images as $images){
							echo '<li class="hide"><img src="' . $images['h_image']['sizes']['dj_horz'] . '" ></li>';
						}
					?>
				</ul>
				<ul id="slide-wrap-3" class="slide-container horz">
					<?php
						shuffle($horizontal_images);
						foreach($horizontal_images as $images){
							echo '<li class="hide"><img src="' . $images['h_image']['sizes']['dj_horz'] . '" ></li>';
						}
					?>
				</ul>
				<ul id="slide-wrap-4" class="slide-container vert">
					<?php
						shuffle($vert_images);
						foreach($vert_images as $images){
							echo '<li class="hide"><img src="' . $images['v_image']['sizes']['dj_vert'] . '" ></li>';
						}
					?>
				</ul>
				<ul id="slide-wrap-5" class="slide-container vert">
					<?php
						shuffle($vert_images);
						foreach($vert_images as $images){
							echo '<li class="hide"><img src="' . $images['v_image']['sizes']['dj_vert'] . '" ></li>';
						}
					?>
				</ul>
				<ul id="slide-wrap-6" class="slide-container horz">
					<?php
						shuffle($horizontal_images);
						foreach($horizontal_images as $images){
							echo '<li class="hide"><img src="' . $images['h_image']['sizes']['dj_horz'] . '" ></li>';
						}
					?>
				</ul>
				<ul id="slide-wrap-7" class="slide-container vert">
					<?php
						shuffle($vert_images);
						foreach($vert_images as $images){
							echo '<li class="hide"><img src="' . $images['v_image']['sizes']['dj_vert'] . '" ></li>';
						}
					?>
				</ul>
			</div>
		</div>
	</div>

	<div id="content-wrapper" class="clearfix">

		<?php foreach ($djs as $key => $value) : ?>
			<div class="content-main">
				<a href="#">
					<span class="circle transition-2"></span>
						<div class="dejay_image">
							<?php
								$thumb_id = $value['dj_object']->picture;
								$featured_image = wp_get_attachment_image_src( $thumb_id, 'deejays-thumb' );
								if($thumb_id !== ''){
									echo '<img src="' . $featured_image[0] . '" >';
								}
							?>
						</div>
					<div class="text">
						<span class="name"><?php echo $value['dj_object']->post_title; ?></span><br>
						<span>View Bio</span>
					</div>
				</a>
			</div> <!-- end of content-main -->
		<?php endforeach; //-- end of foreach ?>

		<!-- Start all Modal Boxes -->
		<?php foreach ($djs as $key => $value) : ?>
			<div class="dj-modal-wrap hide">
				<div class="dj-modal-container">
					<div class="close-modal">
						<a href="#">
							CLOSE <span>X</span>
						</a>
					</div>
					<div class="deejay_image_full">
						<?php
							$thumb_id = $value['dj_object']->picture;
							$featured_image = wp_get_attachment_image_src( $thumb_id, 'deejays-full' );
							if($thumb_id !== ''){
								echo '<img src="' . $featured_image[0] . '" >';
							}
						?>
					</div>
					<div class="body-copy">
						<div class="title">
							<span><?php echo $value['dj_object']->post_title; ?></span><br>
							<span><?php the_field( 'alias', $value['dj_object']->ID ); ?></span>
						</div>
						<div class="bio">
							<?php the_field( 'bio', $value['dj_object']->ID )  ?>
						</div>
						<div class="social">
							<?php
								if( get_field( 'facebook_link', $value['dj_object']->ID ) ){
									echo '<a href="' . get_field( 'facebook_link', $value['dj_object']->ID ) . '" target="_blank"><span class="facebook"></span></a>';
								}
								if( get_field( 'twitter_link', $value['dj_object']->ID ) ){
									echo '<a href="' . get_field( 'twitter_link', $value['dj_object']->ID ) . '" target="_blank"><span class="twitter"></span></a>';
								}
								if( get_field( 'instagram_link', $value['dj_object']->ID ) ){
									echo '<a href="' . get_field( 'instagram_link', $value['dj_object']->ID ) . '" target="_blank"><span class="instagram"></span></a>';
								}
								if( get_field( 'tumblr_link', $value['dj_object']->ID ) ){
									echo '<a href="' . get_field( 'tumblr_link', $value['dj_object']->ID ) . '" target="_blank"><span class="tumblr"></span></a>';
								}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; //-- end of foreach ?>

	</div> <!-- end of content-wrapper -->

</div>  <!-- end of main-wrapper -->
	
<?php endwhile; ?>