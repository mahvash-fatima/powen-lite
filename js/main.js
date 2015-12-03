(function($) {

	"use strict";

	window.Powen = {

		init: function()
		{
			this.mMenu();
			this.mainMenu();
			this.createMainSlider();
			this.backtoTop();
			this.skipLinkFocusFix();
			this.addClass();
		},

		//mMenu
		mMenu: function()
		{
			var $siteNavigation = $('#site-navigation');

			$siteNavigation.mmenu({}, {clone: true}).on( 'opened.mm', function()
			{
				$siteNavigation.trigger("open.mm");
			});
		},

		//Main Menu
		mainMenu: function()
		{
			var $mainNav = $('#main-nav');

			$mainNav.mmenu(
			{
				offCanvas: {
				               position  : "right",
				           }
			},

			{clone: true}).on( 'opened.mm', function()
			{
				$mainNav.trigger("open.mm");
			});
		},

		//Slider
		createMainSlider: function()
		{
			$('.flexslider').flexslider(
			{
				animation  : "slide",
				pauseOnHover: true,
				itemWidth  : 210,
				itemMargin : 0,
				minItems   : 2,
				maxItems   : 4
			});
		},

		//Scroll Back To Top
		backtoTop: function()
		{
			var $icon = $( '.footer-scroll' ),
			offset    = 250,
			duration  = 300;

			$(window).scroll(function ()
			{
		    	if ($(this).scrollTop() > offset) {

				    $icon.on('.back-to-top').fadeIn(duration);

				} else {
		            $icon.on('.back-to-top').fadeOut(duration);
		        }
			});

			$icon.on( 'click' , function ()
			{
				$("body,html").animate( { scrollTop: 0 }, 600);
				return false;
			});
		},

		// skipLinkFocusFix
		skipLinkFocusFix : function()
		{
			var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
			    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
			    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

			if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener )
			{
				window.addEventListener( 'hashchange', function()
				{
					var element = document.getElementById( location.hash.substring( 1 ) );

					if ( element )
					{
						if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
						{
							element.tabIndex = -1;
						}

						element.focus();
					}
				}, false );
			}
		},

		addClass : function()
		{
			var proMenuAnimate  = $(".powen-pro-menu li ul"),
			proMenuHover        = $("#powen-pro-menu li a"),
			proMenuChildAnimate = $("#site-navigation .sub-menu"),
			tagCloudHover       = $(".tagcloud a"),
			socialIconHover     = $(".widget_powen_social_widget .powen-social-icon a"),
			mMenuTopHover		= $("#mm-site-navigation ul li"),
			mMenuMainHover		= $("#mm-main-nav ul li"),
			proFooterMenuHover  = $(".powen-pro-footer-menu a");

			proMenuAnimate.addClass('fadeInUp');
			proMenuHover.addClass('hvr-underline-from-center');
			tagCloudHover.addClass('hvr-shutter-out-horizontal');
			socialIconHover.addClass('hvr-sweep-to-right');
			proMenuChildAnimate.addClass('animated fadeInUp');
			mMenuTopHover.addClass('hvr-sweep-to-right');
			mMenuMainHover.addClass('hvr-sweep-to-right');
			proFooterMenuHover.addClass('hvr-underline-from-center');
		},

	};

	window.Powen.init();

})(jQuery);