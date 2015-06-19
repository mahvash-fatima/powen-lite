(function($){

	window.Powen = {

		init: function(){
			this.mMenu();
			this.mainMenu();
			this.createMainSlider();
			this.backtoTop();
			this.navAnimation();
			this.skipLinkFocusFix();
			this.commonClass();
			console.log("dsjfldsjfkls");
		},

		//mMenu
		mMenu: function(){
			var $siteNavigation = $('#site-navigation');
			$siteNavigation.mmenu({}, {clone: true}).on( 'opened.mm', function() {
				$siteNavigation.trigger("open.mm");
			});

		},

		//Main Menu
		mainMenu: function(){
			var $mainNav = $('#main-nav');
			$mainNav.mmenu({}, {clone: true}).on( 'opened.mm', function() {
				$mainNav.trigger("open.mm");
			});
		},

		//Slider
		createMainSlider: function(){
			$('#slider').flexslider({
				animation: "slide",
			    animationLoop: true,
			    itemWidth: 460,
			    itemMargin: 0
			});
		},

		//Scroll Back To Top
		backtoTop: function()
		{
			var $icon = $( '.footer-scroll' );
			var offset = 250;
			var duration = 300;
			$(window).scroll(function () {
			    	if ($(this).scrollTop() > offset) {
    				    $icon.on('.back-to-top').fadeIn(duration);
    				} else {
    		            $icon.on('.back-to-top').fadeOut(duration);
    		        }
			});

			$icon.on( 'click' , function () {
				  $("body,html").animate( { scrollTop: 0 }, 600);
				  return false;
			});
		},

		//Adding Class in Site Navigation
		navAnimation : function() {
			var $submenu = $("#site-navigation .sub-menu");
			$submenu.addClass('animated fadeInUp');
		},

		// skipLinkFocusFix
		skipLinkFocusFix : function(){

			var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
			    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
			    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

			if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
				window.addEventListener( 'hashchange', function() {
					var element = document.getElementById( location.hash.substring( 1 ) );

					if ( element ) {
						if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
							element.tabIndex = -1;
						}

						element.focus();
					}
				}, false );
			}
		},

		commonClass : function() {
			$(".widget .widget-title").append("<i class='powen-border-line'></i>");
			$(".widget_calendar #today").addClass('current-date');
			$(".powen-slider-content p").prepend("<i class='powen-slider-content-icon-before'></i>");
			$(".powen-slider-content p").append("<i class='powen-slider-content-icon-after'></i>");

		},

	};

	window.Powen.init();

})(jQuery);