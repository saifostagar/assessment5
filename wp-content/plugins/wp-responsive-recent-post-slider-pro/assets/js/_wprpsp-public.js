jQuery(document).ready(function($) {

	/* For Carousel Slider */
	$( '.wprpsp-recent-post-carousel' ).each(function( index ) {

		var slider_id   = $(this).attr('id');
		var slider_conf = $.parseJSON( $(this).closest('.wprpsp-carousel-pro-slider-wrp').attr('data-conf'));

		jQuery('#'+slider_id).slick({
			lazyLoad        : slider_conf.lazyload,
			dots			: (slider_conf.dots) == "true" ? true : false,
			infinite		: (slider_conf.infinite) == "true" ? true : false,
			arrows			: (slider_conf.arrows) == "true" ? true : false,
			speed			: parseInt(slider_conf.speed),
			autoplay		: (slider_conf.autoplay) == "true" ? true : false,
			autoplaySpeed	: parseInt(slider_conf.autoplay_interval),
			slidesToShow	: parseInt(slider_conf.slides_to_show),
			slidesToScroll	: parseInt(slider_conf.slides_to_scroll),
			centerMode		: (slider_conf.centermode) == "true" ? true : false,
			pauseOnHover	: (slider_conf.hover_pause) == "true" ? true : false,
			pauseOnFocus	: (slider_conf.focus_pause) == "false" ? false : true,
			centerPadding 	: 0,
			mobileFirst    	: (Wprpsp.is_mobile == 1) ? true : false,
			rtl             : (slider_conf.rtl) == "true" ? true : false,
			responsive: [{
				breakpoint: 1023,
				settings: {
					slidesToShow: (parseInt(slider_conf.slides_to_show) > 3) ? 3 : parseInt(slider_conf.slides_to_show),
					slidesToScroll: 1,
				}
			},{

				breakpoint: 767,
				settings: {
					slidesToShow: (parseInt(slider_conf.slides_to_show) > 2) ? 2 : parseInt(slider_conf.slides_to_show),
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 479,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: false
				}
			},
			{
				breakpoint: 319,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: false
				}
			}]
		});
	});

	/* For Slider */
	$( '.wprpsp-post-slider' ).each(function( index ) {

		var slider_id 		= $(this).attr('id');
		var nav_id 			= null;
		var slider_nav_id 	= $(this).attr('data-slider-nav-for');
		var slider_conf 	= $.parseJSON( $(this).closest('.wprpsp-pro-slider-wrp').attr('data-conf'));

		/* For Navigation */
		if( typeof(slider_nav_id) != 'undefined' && slider_nav_id != '' ) {
			nav_id = '.'+slider_nav_id;
		}

		if( typeof(slider_id) != 'undefined' && slider_id != '' ) {

			/* To remain the same slider height as navigation */
			if( nav_id != '' ) {
				$(nav_id).on('init', function(event, slick) {
					var sliderheight = $(nav_id + ' .slick-list').innerHeight();
					$('#'+slider_id+' .wprpsp-post-image-wrap').css('height', sliderheight); 
				});
			}

			jQuery('#'+slider_id).slick({
				lazyLoad        : slider_conf.lazyload,
				dots			: (slider_conf.dots) == "true" ? true : false,
				fade			: (slider_conf.fade) == "true" ? true : false,
				infinite		: (slider_conf.infinite) == "true" ? true : false,
				arrows			: (slider_conf.arrows) == "true" ? true : false,
				speed			: parseInt(slider_conf.speed),
				autoplay		: (slider_conf.autoplay) == "true" ? true : false,
				autoplaySpeed	: parseInt(slider_conf.autoplay_interval),
				slidesToShow	: 1,
				slidesToScroll	: 1,
				pauseOnHover	: (slider_conf.hover_pause) == "true" ? true : false,
				pauseOnFocus	: (slider_conf.focus_pause) == "false" ? false : true,
				rtl 			: (slider_conf.rtl) == "true" ? true : false,
				asNavFor		: nav_id
			});
		}

		/* For Navigation */
		if( typeof(slider_nav_id) != 'undefined' ) {
			jQuery('.'+slider_nav_id).slick({
				slidesToShow: parseInt(slider_conf.nav_slides),
				slidesToScroll: 1,
				asNavFor: '#'+slider_id,
				dots: false,
				arrows:false,
				centerMode: false,
				focusOnSelect: true,
				vertical:true,
				verticalSwiping:true,
				responsive: [
				{
					breakpoint: 736,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						infinite: true,
						vertical:false,
						centerMode: true,
					}
				},{
					breakpoint: 569,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						vertical:false,
						centerMode: true,
					}
				},{
					breakpoint: 319,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						vertical:false,
						centerMode: true
					}
				}]
			});
		}
	});

	/* Initialize slick slider for GridBox Slider */
	$( '.wprpsp-gridbox-slider' ).each(function( index ) {

		var slider_id   = $(this).attr('id');
		var slider_conf = $.parseJSON( $(this).closest('.wprpsp-gridbox-slider-wrp').attr('data-conf') );

		if( typeof(slider_id) != 'undefined' && slider_id != '' && slider_conf != null ) {
			jQuery('#'+slider_id).slick({
				lazyLoad        : slider_conf.lazyload,
				dots 			: (slider_conf.dots) == "true" ? true : false,
				infinite		: (slider_conf.infinite) == "true" ? true : false,
				fade			: (slider_conf.fade) == "true" ? true : false,
				speed 			: parseInt(slider_conf.speed),
				arrows 			: (slider_conf.arrows) == "true" ? true : false,
				autoplay 		: (slider_conf.autoplay) == "true" ? true : false,
				autoplaySpeed 	: parseInt(slider_conf.autoplay_interval),
				slidesToShow 	: 1,
				slidesToScroll 	: 1,
				pauseOnHover	: (slider_conf.hover_pause) == "true" ? true : false,
				pauseOnFocus	: (slider_conf.focus_pause) == "false" ? false : true,
				rtl 			: (slider_conf.rtl) == "true" ? true : false,
			});
		}
	});

	/* Initialize slick slider for widget */
	$( '.wprpsp-post-slider-widget' ).each(function( index ) {

		var slider_id   = $(this).attr('id');
		var slider_conf = $.parseJSON( $(this).closest('.wprpsp-post-widget-wrp').attr('data-conf') );

		if( typeof(slider_id) != 'undefined' && slider_id != '' && slider_conf != null ) {
			jQuery('#'+slider_id).slick({
				lazyLoad        : slider_conf.lazyload,
				dots 			: (slider_conf.dots) == "true" ? true : false,
				infinite 		: true,
				speed 			: parseInt(slider_conf.speed),
				arrows 			: (slider_conf.arrows) == "true" ? true : false,
				autoplay 		: (slider_conf.autoplay) == "true" ? true : false,
				autoplaySpeed 	: parseInt(slider_conf.autoplay_interval),
				slidesToShow 	: 1,
				slidesToScroll 	: 1,
				pauseOnHover	: (slider_conf.hover_pause) == "true" ? true : false,
				pauseOnFocus	: (slider_conf.focus_pause) == "false" ? false : true,
				rtl 			: (Wprpsp.is_rtl == 1) ? true : false,
			});
		}
	});

	/* For older browser compatibility (Image Fallback) */
	if( Wprpsp.is_old_browser == 1 ) {
		$( '.wprpsp-image-fit .wprpsp-post-slides' ).each(function( index ) {
			var img_obj = $(this).find('.wprpsp-post-img');

			if( typeof(img_obj) !== 'undefined' ) {
				var img_url = img_obj.attr('src');

				img_obj.closest('.wprpsp-post-image-bg').css({"background": "url("+img_url+") no-repeat top center", "background-size": "cover"});
				img_obj.hide();
			}
		});
	}
});