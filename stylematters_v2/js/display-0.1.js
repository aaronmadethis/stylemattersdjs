var win_w,
	win_h,
	is_home,
	no_touch,
	menu_offset,
	menu_height;

jQuery(document).ready(function($) {
	is_home = $('#home-wrapper').length > 0 ? true : false;
	no_touch = $('html.no-touch').length > 0 ? true : false;


	function set_container_heights(){
		win_w = $(window).innerWidth();
		win_h = $(window).innerHeight();
	}

	function set_size(){
		$('#background_image').css({'height': win_h, 'width': win_w});
		$('#page-wrapper').css({'height': win_h, 'width': win_w});
		$('#page-scroll').css({'height': win_h});
	}

	function center_items(){
		$('.center').each(function(){
			$(this).css({'left': (win_w - $(this).width())/2, 'top': (win_h - $(this).height())/2});
		})
	}
	// function set_size(){
	// 	$('#background_image').css({'height': win_h, 'width': win_w});
	// 	$('#page-scroll').css({'height': win_h});
	// }

	function resize_bg_img(img){
		if( typeof($(img).attr('org_w')) == 'undefined' ){
			$(img).attr( 'org_w', ($(img).width()) );
			$(img).attr( 'org_h', ($(img).height()) );
		}

		//if image is wider format than its container
		if(parseInt( $(img).attr('org_w') ) / parseInt( $(img).attr('org_h') ) > win_w / win_h){
			$(img).removeClass('horz');
			$(img).addClass('vert');
		}else{
			$(img).removeClass('vert');
			$(img).addClass('horz');
		}

		 $(img).css('left', ( win_w - $(img).width() ) / 2 + 'px');
		 if($(img).height() == 0){
		 	$(img).css('top', '0px');
		 }else{
		 	$(img).css('top', (win_h - $(img).height() ) / 2 + 'px');
		 }
	}

	if ( $('#dj-slideshow').length > 0) {
		//if object exists
		$('#dj-slideshow').each(function(i){
			var $new_slideshow = $(this);
			$new_slideshow.home_slideshow();
		});
	};

	//resize_bg_img( $('#background_image img') );
	set_container_heights();
	$('#page-wrapper').css({'height': win_h, 'width': win_w});
	$('#page-scroll').css({'height': win_h});
	//center_items();
	//set_size();

	imagesLoaded( '#background_image', function() {
		resize_bg_img( $('#background_image img') );
		center_items();
		set_size();
		$('#background_image').css({'visibility': 'visible'}).animate({opacity: 1}, 250);
	});

	// $(window).load(function(){
	// 	resize_bg_img( $('#background_image img') );
	// 	center_items();
	// 	set_size();
	// });
	$(window).resize(function(){
		resize_bg_img( $('#background_image img') );
		set_container_heights();
		center_items();
		set_size();
	});
});