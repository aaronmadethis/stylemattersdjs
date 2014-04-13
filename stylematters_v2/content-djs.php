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
				
			</div>
		</div>
	</div>

	<div class="column_background">	
		<div id="content-wrapper">

<?php foreach ($djs as $key => $value) { ?>
			<div class="content-main">
				<a name="<?php echo $value['dj_object']->post_title . ' (' . get_field( 'alias', $value['dj_object']->ID ) . ')' ; ?>"></a>
				<div class="dejay_image">
					<?php
						$thumb_id = $value['dj_object']->picture;
						$featured_image = wp_get_attachment_image_src( $thumb_id, 'deejays-thumb' );
						if($thumb_id !== ''){
							echo '<img src="' . $featured_image[0] . '" >';
						}
					?>
				</div>
		
				<div class="dejay_text">
					<span class="subhead">
					<?php
						echo $value['dj_object']->post_title;
						if(get_field( 'alias', $value['dj_object']->ID )){
							echo ' (' . get_field( 'alias', $value['dj_object']->ID ) . ')' ;
						}
					?>
					</span>
					<?php the_field( 'bio', $value['dj_object']->ID )  ?>
				</div>
				<div class="breaker_full"></div>
			</div> <!-- end of content-main -->
<?php } //-- end of foreach ?>

		</div> <!-- end of content-wrapper -->


		<div id="sidebar-wrapper">
			<div class="sidebar-item">
				<div class="title">QUICK LOOK</div>

<?php foreach ($djs as $key => $value) { ?>
				<div class="sidebar-item-dejay">
					<div class="sidebar-dejay-image">
						<?php
							$thumb_id = $value['dj_object']->picture;
							$featured_image = wp_get_attachment_image_src( $thumb_id, 'deejays-thumb' );
							if($thumb_id !== ''){
								echo '<img src="' . $featured_image[0] . '" >';
							}
						?>
					</div>
					<div class="title">
						<?php
							echo $value['dj_object']->post_title;
							if(get_field( 'alias', $value['dj_object']->ID )){
								echo '<br>';
								echo ' (' . get_field( 'alias', $value['dj_object']->ID ) . ')' ;
							}
						?>
						<br>
						<a href="#<?php echo $value['dj_object']->post_title . ' (' . get_field( 'alias', $value['dj_object']->ID ) . ')' ; ?>">VIEW BIO<span class="arrow"></span></a>
					</div>
				</div>
<?php } //-- end of foreach ?>

			</div>
		</div>  <!-- end of sidebar-wrapper -->
	</div>  <!-- end of column_background -->
</div>  <!-- end of main-wrapper -->
	
<?php endwhile; ?>