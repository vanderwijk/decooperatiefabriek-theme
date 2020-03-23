jQuery(document).ready(function() {

	jQuery("#container, .actueel-movie").fitVids();

	function fadeParticipants() {
		jQuery(".reviews.participants .review:hidden:first").fadeIn(1000).delay(8000).fadeOut(1000, function() {
			jQuery(this).appendTo(jQuery(this).parent());
			fadeParticipants();
		});
	  }
	  fadeParticipants();


	function fadeContent() {
		jQuery(".reviews.customers .review:hidden:first").fadeIn(1000).delay(8000).fadeOut(1000, function() {
			jQuery(this).appendTo(jQuery(this).parent());
		  fadeContent();
		});
	  }
	  fadeContent();


	jQuery('.flexslider').flexslider({
		animation: "fade",
		slideshowSpeed: 7000,
		animationDuration: 1000,
		pauseOnHover: false,
		touch: true,
		controlNav: false,
		directionNav: false,
		keyboard: false
	});
	
	jQuery('input#s-team').quicksearch('#member-list li');

	jQuery(".course-carousel #course-list").after('<ul id="course-list1" />').next().html(jQuery("#course-list").html());
	jQuery(".course-carousel #course-list li:odd").remove();
	jQuery(".course-carousel #course-list1 li:even").remove();
	
	jQuery(".course-carousel #course-list").carouFredSel({
		responsive	: true,
		width		: "100%",
		synchronise	: "#course-list1",
		auto		: false,
		pagination  : {
			container: "#carousel-pag",
			items	: 1
		},
		circular	: true,
		infinite	: false,
		items		: {
			width	: 220,
			visible : {
				min	: 1,
				max	: 2
			},
			start	: 0
		},
		scroll		: {
			items	: 1,
			duration: 1000
		},
		swipe       : {
			onTouch     : true,
			onMouse     : false
		}
	});
	jQuery(".course-carousel #course-list1").carouFredSel({
		responsive	: true,
		auto		: false,
		width		: "100%",
		/*pagination  : {
			container: "#carousel-pag",
			items	: 1
		},*/
		circular	: true,
		infinite	: false,
		items		: {
			width	: 200,
			visible : {
				min	: 1,
				max	: 2
			},
			start	: 0
		},
		scroll		: {
			items	: 1,
			duration: 1000
		},
		swipe       : {
			onTouch     : true,
			onMouse     : false
		}
	});
	
});

/**
 * Responsive menu
 */

var ww = window.innerWidth;

jQuery(document).ready(function() {
	jQuery(".nav ul li a").each(function() {
		if (jQuery(this).next().length > 0) {
			jQuery(this).addClass("parent");
		};
	})
	
	jQuery(".toggleMenu").click(function(e) {
		e.preventDefault();
		jQuery(this).toggleClass("active");
		jQuery(".nav").toggle();
	});
	adjustMenu();
})

jQuery(window).bind('resize orientationchange', function() {
	ww = document.body.clientWidth;
	adjustMenu();
});

var adjustMenu = function() {
	if (ww < 725) {
		jQuery(".toggleMenu").css("display", "inline-block");
		if (!jQuery(".toggleMenu").hasClass("active")) {
			jQuery(".nav").hide();
		} else {
			jQuery(".nav").show();
		}
		jQuery(".nav ul li").unbind('mouseenter mouseleave');
		jQuery(".nav ul li a.parent").unbind('click').bind('click', function(e) {
			// must be attached to anchor element to prevent bubbling
			e.preventDefault();
			jQuery(this).parent("li").toggleClass("hover");
		});
	} 
	else if (ww >= 725) {
		jQuery(".toggleMenu").css("display", "none");
		jQuery(".nav").show();
		jQuery(".nav ul li").removeClass("hover");
		jQuery(".nav ul li a").unbind('click');
		jQuery(".nav ul li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
		 	// must be attached to li so that mouseleave is not triggered when hover over submenu
		 	jQuery(this).toggleClass('hover');
		});
	}
}

try{Typekit.load();}catch(e){}