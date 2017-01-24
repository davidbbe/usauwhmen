/**
 *
 * MD Shortcodes
 *
 * v2.0.0
 *
 * http://themesholic.com
 *
 */

 (function($){

"use strict";

var MD_SHORTCODES = window.MD_SHORTCODES || {};

MD_SHORTCODES.parallax = function(){
	
	$('body[data-device="desktop"][data-css3-animations="enabled"] [data-type]').each(function() {	
		$(this).data('offsetY', parseInt($(this).attr('data-offsetY')));
		$(this).data('Xposition', $(this).attr('data-Xposition'));
		$(this).data('speed', $(this).attr('data-speed'));
	});
	$('body[data-device="desktop"][data-css3-animations="enabled"] [data-type="background"]').each(function(){
		var $self = $(this),
			offsetCoords = $self.offset(),
			topOffset = offsetCoords.top;
	    $(window).scroll(function() {
			//if ( ($window.scrollTop() + $window.height()) > (topOffset) &&
			//	 ( (topOffset + $self.height()) > $window.scrollTop() ) ) {
				var yPos = -($(window).scrollTop() / $self.data('speed')); 
				if ($self.data('offsetY')) {
					yPos += $self.data('offsetY');
				}
				var coords = '50% '+ yPos + 'px';
				$self.css({ backgroundPosition: coords });
				/*
				$('body[data-device="desktop"][data-css3-animations="enabled"] [data-type="sprite"]', $self).each(function() {
					var $sprite = $(this);
					var yPos = -($(window).scrollTop() / $sprite.data('speed'));					
					var coords = $sprite.data('Xposition') + ' ' + (yPos + $sprite.data('offsetY')) + 'px';
					$sprite.css({ backgroundPosition: coords });													
				});
				*/
			// };
		});
	});
}


MD_SHORTCODES.accordions = function(){
	$('.md-accordions .panel-group').each(function(){
		var $uid = $(this).attr('id');
		if($uid){
			$(this).find('.panel-heading a').data('parent', '#'+$uid);

			$(this).find('.panel-heading a').on('click', function(){
				$(this).parents('.panel-group').find('.panel-heading a').addClass('collapsed');
			})
		}
	});

	$('.md-accordions.expanded .panel-group').each(function(){
		$(this).find('.panel .panel-heading a:first').removeClass('collapsed');
		$(this).find('.panel .panel-collapse:first').removeClass('collapse').addClass('in');
	});
}



MD_SHORTCODES.tabs = function(){
	$('.md-tabs .nav-tabs a').each(function(){
		var $uid = $(this).attr('href').split('#').join('');
		var $pos = $('.md-tabs .nav-tabs a').index(this);

		$('.md-tabs .tab-pane').eq($pos).attr('id', $uid);
	});

	$('.md-tabs').each(function(){
		$(this).find('.nav-tabs li').eq(0).addClass('active');
		$(this).find('.tab-pane').eq(0).addClass('active');
	})
}


MD_SHORTCODES.socialShare = function(){
	function sharePopup(url){
		var width = 600;
		var height = 400;
	    
	    var leftPosition, topPosition;
	    leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
	    topPosition = (window.screen.height / 2) - ((height / 2) + 50);

	    var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";

	    window.open(url,'Social Share', windowFeatures);
	}

	$('.md-social-share-facebook').on('click', function(){
	    var u = location.href;
	    var t = document.title;
		sharePopup('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t));
		return false;
	});


	$('.md-social-share-twitter').on('click', function(){
	    var u = location.href;
	    var t = document.title;
		sharePopup('http://twitter.com/share?url='+encodeURIComponent(u)+'&text='+encodeURIComponent(t));
		return false;
	});

	$('.md-social-share-google').on('click', function(){
	    var u = location.href;
	    var t = document.title;
		sharePopup('https://plus.google.com/share?url='+encodeURIComponent(u)+'&text='+encodeURIComponent(t));
		return false;
	});

	$('.md-social-share-pinterest').on('click', function(){
	    var u = location.href;
	    var t = document.title;
	    var i = $('#content').find('img').eq(0).attr('src');
		sharePopup('http://www.pinterest.com/pin/create/button/?url='+encodeURIComponent(u)+'&description='+encodeURIComponent(t)+'&media='+encodeURIComponent(i));
		return false;
	});

	// Loading SDK
	if( $('.fb-like').length > 0 || $('.twitter-share-button').length > 0 || $('.g-plusone').length > 0 || $('.pinterest-share').length > 0) {

	    //Twitter
	    if (typeof (twttr) != 'undefined') {
	        twttr.widgets.load();
	    } else {
	        $.getScript('http://platform.twitter.com/widgets.js');
	    }

	    //Facebook
	    if (typeof (FB) != 'undefined') {
	        FB.init({ status: true, cookie: true, xfbml: true });
	    } else {
	        $.getScript("http://connect.facebook.net/en_US/all.js#xfbml=1", function () {
	            FB.init({ status: true, cookie: true, xfbml: true });
	        });
	    }

	    // Pinterest
	    if (typeof (pinterest) != 'undefined') {
		    pinterest.widgets.load();
		} else {
			$.getScript('http://assets.pinterest.com/js/pinit.js');
		}
	  
	    //Google - Note that the google button will not show if you are opening the page from disk - it needs to be http(s)
	    if (typeof (gapi) != 'undefined') {
	        $(".g-plusone").each(function () {
	            gapi.plusone.render($(this).get(0));
	        });
	    } else {
	        $.getScript('https://apis.google.com/js/plusone.js');
	    }

	}
}




MD_SHORTCODES.mediaElements = function(){

	$('.md-video-hosted video, .md-audio-hosted audio').mediaelementplayer({videoVolume: 'horizontal'});
	$('.md-video-hosted video').fitVids();
	$('.section-video video.hosted').mediaelementplayer({
		startVolume: 0,
		success: function (mediaElement, domObject) { 
        	mediaElement.play();
    	}
    });

	function fitVideoBg(){
		$('.page-section .section-video').each(function (b) {
			var min_w = 1500;
			var header_height = 0;
			var vid_w_orig = 1280;
			var vid_h_orig = 720;
		    
		    var f = $(this).closest(".page-section").outerWidth();
		    var e = $(this).closest(".page-section").outerHeight();
		    $(this).width(f);
		    $(this).height(e);
		    var a = f / vid_w_orig;
		    var d = (e - header_height) / vid_h_orig;
		    var c = a > d ? a : d;
		    min_w = 1280 / 720 * (e + 20);
		    if (c * vid_w_orig < min_w) {
		        c = min_w / vid_w_orig
		    }
		    $(this).find("video, .mejs-overlay, .mejs-poster").width(Math.ceil(c * vid_w_orig + 2));
		    $(this).find("video, .mejs-overlay, .mejs-poster").height(Math.ceil(c * vid_h_orig + 2));
		    $(this).scrollLeft(($(this).find("video").width() - f) / 2);
		    $(this).find(".mejs-overlay, .mejs-poster").scrollTop(($(this).find("video").height() - (e)) / 2);
		    $(this).scrollTop(($(this).find("video").height() - (e)) / 2)
		});
	}
	fitVideoBg();
	
	$(window).resize(function(){
		fitVideoBg();
	})

	$(window).load(function(){
		fitVideoBg();
	})
	fitVideoBg();
}

MD_SHORTCODES.flexslider = function(){

	$('.flexslider').each(function(){

    	var $navigation  = Boolean($(this).data('navigation'));
    	var $pagination  = Boolean($(this).data('pagination'));
    	var $effect 	 = $(this).data('effect');
    	var $slideshow 	 = $(this).data('slideshow');
    	var $speed 		 = 5000;
    	var $keyboard	 = ($(this).data('disable-keyboard')) ? false : true;

		$(this).flexslider({
			smoothHeight : true,
			prevText	 : '',
			nextText	 : '',
			animation	 : $effect,
			controlNav   : $pagination,
			directionNav : $navigation,
			slideshow	 : $slideshow,
			slideshowSpeed : $speed,
			keyboard	 : $keyboard
		});	
		
	});

	$('.section-slider .flexslider img').resizeToParent();
}


MD_SHORTCODES.backToTop = function(){	
	$(window).scroll(function(){
		if($(window).scrollTop() > 400){
			$('#md-back-top').addClass('show');
		}
		else{
			$('#md-back-top').removeClass('show');
		}
	});

	$('#md-back-top').on('click', function(){

		$('body, html').animate({scrollTop: 0 }, 800, 'easeInOutExpo');

		return false;
	})
}




$(function(){
	MD_SHORTCODES.parallax();
	MD_SHORTCODES.accordions();
	MD_SHORTCODES.tabs();
	MD_SHORTCODES.socialShare();
	MD_SHORTCODES.mediaElements();
	MD_SHORTCODES.flexslider();
	MD_SHORTCODES.backToTop();
});

})(jQuery);