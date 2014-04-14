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
		$('.slide-container').each(function( i ) {
			$(this).find('li').first().addClass('selected').removeClass('hide');
		});

		//var posts = $('.slide-container li:first-child');
		imagesLoaded( $('.slide-container li:first-child'), function() {
			setInterval(function(){ rotate_images('#slide-wrap-1') },3500);
			setInterval(function(){ rotate_images('#slide-wrap-2') },5500);
			setInterval(function(){ rotate_images('#slide-wrap-3') },4500);
			setInterval(function(){ rotate_images('#slide-wrap-4') },3700);
			setInterval(function(){ rotate_images('#slide-wrap-5') },4000);
			setInterval(function(){ rotate_images('#slide-wrap-6') },5000);
			setInterval(function(){ rotate_images('#slide-wrap-7') },4800);
		});
	};

	function rotate_images(container){
		var object = container;

		//console.log('ran', $(object).find('.selected') );

		if( $(object).find('.selected').next().length > 0 ){

			$(object).find('.selected').next().css({'visibility': 'visible'}).animate({opacity: 1}, 750, function(){
				$(this).removeClass('hide');
			});

			$(object).find('.selected').animate({opacity: 0}, 750, function(){
				$(this).removeClass('selected').addClass('hide').css({'visibility': 'hidden'});
				$(this).next().addClass('selected');
			});

		}else{

			$(object).find('.selected').animate({opacity: 0}, 750, function(){
				$(this).removeClass('selected').addClass('hide').css({'visibility': 'hidden'});
			});

			$(object).find('li').first().addClass('selected').removeClass('hide').css({'visibility': 'visible'}).animate({opacity: 1}, 750);
		}

	}

	$('.content-main a').click(function(e){
		var dj_index = $(this).parent().index();
		
		dj_open_modal(dj_index);
		e.preventDefault();
	});

	function dj_open_modal(index){
		$('.dj-modal-wrap').eq(index).css({'visibility': 'visible'}).animate({opacity: 1}, 250, function(){

			$(this).addClass('selected').removeClass('hide');

			$(this).find('.close-modal').click(function(e){
				$(this).closest('.dj-modal-wrap').animate({opacity: 0}, 250, function(){
					$(this).removeClass('selected').addClass('hide').css({'visibility': 'hidden'});
				});
				e.preventDefault();
			});
		});
	}

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