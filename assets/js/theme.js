(function($){

"use strict";

var THEME = window.THEME || {};

THEME.loaderSite = function(){
	if($('#loader-site').length){
		var $site_init = false;

		setTimeout(function(){
			if(!$site_init){
				$site_init = true;
				$('#loader-site').fadeOut(400, function(){

					$(window).load(function(){
						THEME.init();
					});
					
				});
			}
		}, 5000);

		$(window).load(function(){
			$('#loader-site').fadeOut(400, function(){
				if(!$site_init){
					$site_init = true;
					THEME.init();
				}
			});
		});

	} else {
		
		$(window).load(function(){
			THEME.init();
		});
	
	}
}


THEME.css3animations = function(){

	function startAnimation(el){
		var $delay = $(el).data('delay');
		if($delay == ''){
			$delay = 0;
		}

		$(el).delay($delay).queue(function(){
			$(el).addClass('animated')
		});
	}

	function animateElements(){

		if( $('body[data-css3-animations="enabled"]')) {

			$('.animate').scrolledIntoView().on('scrolledin', function () {
				startAnimation(this);
			});
			

			$('.animate:in-viewport').each(function(){
				startAnimation(this);
			});
 		}

	}
	animateElements();
}


THEME.header = function(){
	function menu(){
		$('#header-menu').superfish();
	}
	menu();

	function arrowSubmenu(){
		$('#header-menu .sub-menu li').each(function(){
			if($(this).find('ul.sub-menu').length > 0) {
				 $(this).find('> a').append('<i class="icon-angle-right arrow"></i>');
			}
		});
	}
	arrowSubmenu();

	function disableLink(){
		$('header a[href="#"]').on('click', function(){
			return false;
		})
	}
	disableLink();
	
	function mobileMenu(){
		$('#menu-mobile-open').on('click', function(){
			$(this).toggleClass('open');
			$('#header-mobile').fadeIn();
			return false;
		});

		$('#menu-mobile-close').on('click', function(){
			$('#header-mobile').fadeOut();
			return false;
		});

		$('#header-menu-mobile .menu-item-has-children > a').on('click', function(){
			$(this).toggleClass('open').next('ul').slideToggle();	
			return false;
		});
	}
	mobileMenu()

	function fixMobileMenu(){
		if($(window).width() > 767){
			$('#header-mobile').css('display', 'none');
		}
	}
	fixMobileMenu();

	$(window).resize(function(){
		fixMobileMenu();
	});
}



THEME.parallax = function(){
	
	$('.device-desktop [data-type]').each(function() {	
		$(this).data('offsetY', parseInt($(this).attr('data-offsetY')));
		$(this).data('Xposition', $(this).attr('data-Xposition'));
		$(this).data('speed', $(this).attr('data-speed'));
	});
	$('.device-desktop [data-type="background"]').each(function(){
		var $self = $(this),
			offsetCoords = $self.offset(),
			topOffset = offsetCoords.top;
	    $(window).scroll(function() {
				var yPos = -($(window).scrollTop() / $self.data('speed')); 
				if ($self.data('offsetY')) {
					yPos += $self.data('offsetY');
				}
				var coords = '50% '+ yPos + 'px';
				$self.css({ backgroundPosition: coords });
		});
	});
}

THEME.customSelect = function(){
	$('.widget select').chosen();
}

THEME.loaderSite();

THEME.init = function(){
	THEME.header();
	THEME.parallax();
	THEME.customSelect();
	THEME.css3animations();
}

})(jQuery);