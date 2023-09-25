;
(function ($) {



	// Sticky Footer
	var bumpIt = function() {
		$('body').css('padding-bottom', $('.footer').outerHeight(true));
		$('.footer').addClass('sticky-footer');
	},
	didResize = true;

	$(window).resize(function() {
		didResize = true;
	});
	setInterval(function() {
		if(didResize) {
			didResize = true;
			bumpIt();
		}
	}, 250);


	//Replace IFrame text
	var replaceIframeText = function(){
		var $copy = $('.videos .responsive-embed p');
		$copy.each(function(index, el) {
			$(this).parent().siblings('.iframe_text').append(el);
		});
	}

	//Another BG for mobile
	var diffBg = function(){

		var $bg_foot = $('.page-template-template-home .full_width_image').data('bg') ;
		var $bg_foot_2 = $('.page-template-template-home .full_width_image').data('bg-2') ;
		if ($(window).width() <= 640 ) {
			$('.page-template-template-home .full_width_image').css({"background-image": 'url('+$bg_foot_2+')' }) ;

		}
		else {
			$('.page-template-template-home .full_width_image').css({"background-image": 'url('+$bg_foot+')' }) ;
		}
	}

	//Menu page Title width - price width
	var menuTitleWidth = function(){
		//var $priceWidth = $('.menu_types__list-item--price').width();
		$('.menu_types__list-item').each(function(index, el) {
			$(this).find('.menu_types__list-item--main_info h4').css({'width': 'calc(100% - 10px - '+ $(this).find('.menu_types__list-item--price').width() +'px)'})
		});

	}

	//Parallax Slider

	var	parallaxBg = function(){
		$(window).on('scroll', function() {
			var scrolledY = $(window).scrollTop();
			$('#home-slider .slider-caption').css('margin-top','-' + scrolledY + 'px');
			//$('#home-slider .slick-slide-image, .wedding_slider__slide-image').css('background-position', 'center calc(50% + ' + ((scrolledY)) + 'px)');
		});
	}


	// Scripts which runs after DOM load


	$(document).ready(function () {

/*		var parallax = document.querySelectorAll("#home-slider .slick-slide-image");
		window.onscroll = function(){
			[].slice.call(parallax).forEach(function(el,i){
				var windowYOffset = window.pageYOffset,
				elBackgrounPos = "50% " + (windowYOffset ) + "px";
				el.style.backgroundPosition = elBackgrounPos;
			});
		};
		*/

		//Parallax Slider
		if ($(window).width() >= 641) {
			parallaxBg();
		}

		//Remove placeholder on click
		$("input,textarea").each(function () {
			$(this).data('holder', $(this).attr('placeholder'));

			$(this).focusin(function () {
				$(this).attr('placeholder', '');
			});

			$(this).focusout(function () {
				$(this).attr('placeholder', $(this).data('holder'));
			});
		});

		//Make elements equal height
		$('.matchHeight').matchHeight();


		// Add fancybox to images
		$('.gallery-item a').attr('rel', 'gallery');
		$('a[rel*="album"], .gallery-item a, .fancybox, a[href$="jpg"], a[href$="png"], a[href$="gif"]').fancybox({
			minHeight: 0,
			helpers: {
				overlay: {
					locked: false
				}
			}
		});

		// Sticky footer
		$('.footer').find('img').one('load',function () {
			bumpIt();
		}).each(function () {
			if(this.complete) $(this).load();
		});


		$('.announcements').slick({
				fade: false,  // Cause trouble if used slidesToShow: more than one
				arrows: true,
				dots: false,
				infinite: true,
				speed: 500,
				autoplay: true,
				autoplaySpeed: 5000,
				slidesToShow: 2,
				slidesToScroll: 1,
				prevArrow: '.announcements-prev',
				nextArrow: '.announcements-next',
				adaptiveHeight: false,
				responsive: [
				{
					breakpoint: 641,
					settings:{
						slidesToShow: 1,
						adaptiveHeight: true
					}
				}
				]
			});

		$('.awards__slider').slick({
				fade: false,  // Cause trouble if used slidesToShow: more than one
				arrows: true,
				dots: false,
				infinite: true,
				speed: 500,
				slidesToShow: 4,
				slidesToScroll: 1,
				infinite:false,
				responsive: [
				{
					breakpoint: 1025,
					settings:{
						slidesToShow: 3,
					}
				},
				{
					breakpoint: 641,
					settings: 'unslick'
				}
				]
			});

		$('.wedding_slider').slick({
				fade: true,  // Cause trouble if used slidesToShow: more than one
				arrows: true,
				dots: false,
				infinite: true,
				speed: 500,
				autoplay: true,
				autoplaySpeed: 4000,
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: true,
				prevArrow: '.wedding-prev',
				nextArrow: '.wedding-next',
				slide: '.wedding_slider__slide',
				responsive: [
				{
					breakpoint: 641,
					settings:{
						arrows: false
					}
				}
				]
			});


		//Gallery Ajax

		$(document).on('click','.read-more',function(){
			$this_gallery = $('.more_button');
			var pageId = $('.gallery').data('id');
			var data = {
				action: 'gallery',
				pageId : pageId,
				count : $('.gallery_item').length
			}
			$this_gallery.addClass('loading');
			$.ajax({
				type : "POST",
				data : data,
				url : myajax.url,
				success : function(res){
					$this_gallery.removeClass('loading');
					$('.gallery .gallery_row').append(res);
					var mount = $('.gallery_row').data('count');
					var visible = $('.gallery_item').length;
					if(visible == mount){
						$('.read-more').hide();
					}
				},
			});
		});

		//Open New window on share
		$('.share-button').click(function (e) {
			e.preventDefault();
			var wpWidth = $(window).width();
			var wpHeight = $(window).height();
			window.open($(this).attr('href'),'Share',"top="+(wpHeight-400)/2 + ",left="+(wpWidth-600)/2+",width=600,height=400");
		});


		//Toggle Mobile Menu menu
		$('.mob_menu_title').on('click', function() {
			$('.single-menu').slideToggle();
		});

		//Another BG for mobile
		diffBg();

		//Menu Title Width
		menuTitleWidth();


		//Iframe text
		replaceIframeText();

	});


	// Scripts which runs after all elements load

	$(window).on( 'load', function () {

		//jQuery code goes here
		if($('.preloader').length){
			$('.preloader').addClass('preloader--hidden');
		}

	});

	// Scripts which runs at window resize

	$(window).resize(function () {

		//jQuery code goes here

		//Another BG for mobile
		diffBg();
		//Menu Title Width
		menuTitleWidth();

		$('.awards__slider').slick('resize');

//Parallax Slider
if ($(window).width() >= 641) {
	parallaxBg();
}


});

}(jQuery));



