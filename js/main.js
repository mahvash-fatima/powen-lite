(function($) {

	"use strict";

	window.Powen = {

		init: function()
		{
			this.topMostMenu();
			this.mainMenu();
			this.createMainSlider();
			this.backtoTop();
			this.skipLinkFocusFix();
			this.addClass();
			this.searchBar();
		},

		//Top Most Menu
		topMostMenu: function()
		{
			var $topMostMenu = $('#site-navigation');

			$topMostMenu.mmenu({}, {clone: true}).on( 'opened.mm', function()
			{
				$topMostMenu.trigger("open.mm");
			});

			$('#mm-site-navigation').removeClass('powen-primary-nav');

		},

		//Main Menu
		mainMenu: function()
		{
			var $mainMenu = $('#main-nav');

			$mainMenu.mmenu(
			{
				offCanvas: {
	               position  : "right",
	           }
			},

			{clone: true}).on( 'opened.mm', function()
			{
				$mainMenu.trigger("open.mm");

			});

			$('#mm-main-nav').removeClass('powen-main-nav');
		},

		//Slider
		createMainSlider: function()
		{
			var options = {
				dots           : powenVars.dots ? true : false,
				infinite       : powenVars.infinite ? true : false,
				speed          : parseInt(powenVars.speed),
				slidesToShow   : parseInt(powenVars.slidesToShow),
				slidesToScroll : parseInt(powenVars.slidesToScroll),
				responsive     : [
			    {
					breakpoint : 1024,
					settings   : {
						slidesToShow   : 3,
						slidesToScroll : 3,
						infinite       : true,
						dots           : true,
			    	}
			    },
			    {
					breakpoint : 600,
					settings   : {
						slidesToShow   : 2,
						slidesToScroll : 2,
						dots           : false,
			        }
			    },
			    {
					breakpoint : 480,
					settings   : {
						slidesToShow   : 1,
						slidesToScroll : 1,
						dots           : false,
						centerMode     : true,
						centerPadding  : '40px',
			        }
			    },
		        {
		    		breakpoint : 360,
		    		settings   : {
		    			slidesToShow   : 1,
		    			slidesToScroll : 1,
		    			dots           : false,
		    			adaptiveHeight : true,
		            }
		        }
			    ]
			};

			console.log(options);

			$('.powen-main-slider').slick( options );
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
			var proMenuChildAnimate = $("#powen-primary-nav .sub-menu"),
			tagCloudHover       = $(".tagcloud a"),
			socialIconHover     = $(".widget_powen_social_widget .powen-social-icon a"),
			proFooterMenuHover  = $(".powen-footer-nav a");

			tagCloudHover.addClass('hvr-shutter-out-horizontal');
			socialIconHover.addClass('hvr-sweep-to-right');
			proMenuChildAnimate.addClass('animated fadeInUp');
			proFooterMenuHover.addClass('hvr-underline-from-center');
		},

		searchBar : function()
		{
			$(".fa-search").on('click', function() {
				var input = $(".powen-search-box-top .search-field");
				input.animate({width: 'toggle'}).focus();
			});
		},

	};

	window.Powen.init();

})(jQuery);