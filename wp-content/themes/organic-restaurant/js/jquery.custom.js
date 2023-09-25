( function( $ ) {

	function removeNoJsClass() {
		$( 'html:first' ).removeClass( 'no-js' );
	}

	/* Superfish the menu drops ---------------------*/
	function superfishSetup() {
		$('.menu').superfish({
			delay: 200,
			animation: {opacity:'show', height:'show'},
			speed: 'fast',
			cssArrows: true,
			autoArrows:  true,
			dropShadows: false
		});
	}

	/* Flexslider ---------------------*/
	function flexSliderSetup() {
		if( ($).flexslider) {
			var slider = $('.flexslider');
			slider.fitVids().flexslider({
				slideshowSpeed		: slider.attr('data-speed'),
				animation			: slider.attr('data-transition'),
				animationDuration	: 800,
				animation			: 'fade',
				video				: false,
				useCSS				: false,
				prevText			: '<i class="fa fa-angle-left"></i>',
				nextText			: '<i class="fa fa-angle-right"></i>',
				touch				: false,
				controlNav			: false, 
				animationLoop		: true,
				smoothHeight		: true,
				pauseOnAction		: true,
				pauseOnHover		: false,
				
				start: function(slider) {
					slider.removeClass('loading');
					$( ".preloader" ).hide();
				}
			});
		}
	}
		
	/* Portfolio Filter ---------------------*/
	function isotopeSetup() {
		var mycontainer = $('#portfolio-list');
		mycontainer.isotope({
			itemSelector: '.portfolio-item'
		});
	
		// filter items when filter link is clicked
		$('#portfolio-filter a').click(function(){
			var selector = $(this).attr('data-filter');
			mycontainer.isotope({ filter: selector });
			return false;
		});
	}
	
	/* Slider Vid Margin ---------------------*/
	function sliderVid() {
		var header = $("#header").outerHeight();
		$('.slideshow .content.slider-vid').css('margin-top', header + 24);
	}
	
	/* Vertically Center Content ---------------------*/
	function centerPosition() {
		var container = $('.vertical-center');
		var top = $('.vertical-center').offset().top;
	}
		
	function modifyPosts() {
		
		/* Insert Line Break Before More Links ---------------------*/
		$('<br />').insertBefore('.postarea .more-link');
		
		/* Insert Nav Arrow Before Submenu ---------------------*/
		$('<span class="nav-arrow"></span>').insertBefore('ul.sub-menu li:first-child, ul.menu ul li:first-child');
		
		/* Hide Comments When No Comments Activated ---------------------*/
		$('.nocomments').parent().css('display', 'none');
		
		/* Animate Page Scroll ---------------------*/
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
		});
		
		/* Fit Vids ---------------------*/
		$('.feature-vid, .postarea').fitVids();
		
	}
	
	$( document )
	.ready( removeNoJsClass )
	.ready( superfishSetup )
	.ready( sliderVid )
	.ready( centerPosition )
	.ready( modifyPosts )
	.on( 'post-load', modifyPosts );
	
	$( window )
	.load( flexSliderSetup )
	.load( isotopeSetup )
	.resize( centerPosition )
	.resize( sliderVid )
	.resize( isotopeSetup );
	
})( jQuery );