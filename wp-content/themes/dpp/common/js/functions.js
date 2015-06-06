// remap jQuery to $
(function($){})(window.jQuery);

/*
* Handles the news slider on the homepage
*/
var newsSlider = {

	slider : $(".news-slider .flexslider"),

	init: function() {

		this.slider.flexslider({
		    namespace: "flex-",             //{NEW} String: Prefix string attached to the class of every element generated by the plugin
			selector: ".slides > li",       //{NEW} Selector: Must match a simple pattern. '{container} > {slide}' -- Ignore pattern at your own peril
			animation: "fade",              //String: Select your animation type, "fade" or "slide"
			easing: "swing",               //{NEW} String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!
			direction: "horizontal",        //String: Select the sliding direction, "horizontal" or "vertical"
			reverse: false,                 //{NEW} Boolean: Reverse the animation direction
			animationLoop: true,             //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
			smoothHeight: false,            //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode
			startAt: 0,                     //Integer: The slide that the slider should start on. Array notation (0 = first slide)
			slideshow: true,                //Boolean: Animate slider automatically
			slideshowSpeed: 7000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
			animationSpeed: 700,            //Integer: Set the speed of animations, in milliseconds
			initDelay: 0,                   //{NEW} Integer: Set an initialization delay, in milliseconds
			randomize: false               //Boolean: Randomize slide order
		});
}

}


/*
* Handles the smooth scrolling back to the top when link is clicked
*/
var smoothScroll = {

	anchor : $(".back-to-top"),

	init: function(){


		/* Scroll to anchor target on click */
		this.anchor.on("click", function(e){
			e.preventDefault();
			$('html, body').animate({
				scrollTop: $( $(this).attr('href') ).offset().top
			}, 500);
		});



	}
}

var events = {
	/*
	* Event Single pages arnt associated under either 'upcoming' or 'past' events so using
	* JS to update title.
	*/
	init: function(){
		var $eventHeader = $('#event-header'),
		fullDate = new Date(),
			//Convert date to same format as event date
			twoDigitDate = fullDate.getDate()+"";if(twoDigitDate.length==1) twoDigitDate="0" +twoDigitDate,
			twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1),
			todayDate =  fullDate.getFullYear() + twoDigitMonth + twoDigitDate;


			if($eventHeader.length) {
			// Pull the event data (on data attribute in post)
			var eventDate = $eventHeader.data('event-date');

			// Update Event title based on comparison of dates
			if (eventDate >= todayDate) {
				$eventHeader.html("Upcoming events");
			} else {
				$eventHeader.html("Past events");
			}

		}

	}

}

/*
* To support archives on custom post type a plugin was needed - but it doesnt add active classes
* to the side nav when an archive year is chosen.  This does that,
*/
var archiveHighlight = {

	init: function(){

		var $archiveTitle = $("#archive-title"),
		$archiveMenu = $("#news-archive-menu");

		if($archiveTitle.length) {
			var archiveYear = $archiveTitle.data('year'),
			$archiveYearsList = $archiveMenu.find("li");

			// Loop through each archive year and compare - add active class if match.
			$archiveYearsList.each(function(index) {
				var archiveListYear = $(this).find("a").html();
				if (archiveYear == archiveListYear ) {
					$(this).addClass('current_page_item');
				}
			});
		}
	}
}


$(document).ready(function (){
	newsSlider.init();
	smoothScroll.init();
	events.init();
	archiveHighlight.init();
	pluginClasses.init();
	subNav.init();
	getParameter.init()
	//populateMembers.init();
});

$(window).resize(function() {
	setTimeout(function() { 
	}, 500);
});

var populateMembers = {
	init: function() {
		var membership = $('#signupboxes')

	}

}

var subNav= {
	init: function() {
		if ($('.side-bar nav').length >= '1') {
			$('.side-bar nav').addClass('mini-menus');

			var pageTitle = '';
			if ($('.likeh1').length >= '1') {
				pageTitle = $('.likeh1').text();	
			}
			else {
				pageTitle = $('.submenu-title').text().replace(' menu', '');
			}
			var subMenus = $('.side-bar nav');
			var subMChild = subMenus.children('div.item-list-tabs'); 
			subMChild.prepend('<span class="drop"><strong><i></i></strong></span>').wrapInner("<ul><li></li></ul>"); 
			$('#subnav .drop strong').prepend(pageTitle); 
			var subMCFirstLi = subMChild.children('li:first-child');
			var subMCFirstLiInnerLi = subMChild.children('ul li:nth-child(2)');
			var headTxt = subMCFirstLiInnerLi.text(); 
			subMenus.addClass('small-12 medium-12 large-12 xlarge-12 columns');

			$('body').on('click', '#subnav .drop', function(e) { 
				$(this).children('i').toggleClass( "toggle-arrow" );
				$(this).parent().children('ul ul').toggleClass( "dropdown-on" );
				e.preventDefault();
			});	 
		}
	}
}


var equalHeight = {

	init: function(group) {
		tallest = 0;
		group.each(function() {
			thisHeight = $(this).height();
			if(thisHeight > tallest) {
				tallest = thisHeight;
			}
		});
		group.height(tallest);
	} 

}


var pluginClasses = {

	init: function() {
		$('.widget').addClass('small-12 medium-6 large-12 xlarge-12 columns'); 
	} 

}

var getParameter = {
	init: function() {
		var vars = [], hash;
		var q = document.URL.split('?')[1];
		if(q != undefined){
			q = q.split('&');
			for(var i = 0; i < q.length; i++){
				hash = q[i].split('=');
				vars.push(hash[1]);
				vars[hash[0]] = hash[1];
			} 
		}
		var signup = vars['signup'];
		if ($('.page-id-31').length >= 1) { 


			if (signup == 'membership') {
				$('.checkbox-676 input:checkbox:visible:first').prop('checked', true);
			}
			else if (signup == 'newsletter') {

				$('.checkbox-676 input:checkbox').prop('checked', true);
				$('.checkbox-676 input:checkbox:visible:first').prop('checked', false);
			}
		}
	}
}

	//equalHeight.init($(".equal"));  

	/*

	if ($('#item-body').length >= '1') {
		$('#item-body').add('#item-nav').addClass('mini-menus');
	 
		var subMenus = $('.mini-menus').add('.sub-nav');
		var subMChild = subMenus.children('div.item-list-tabs'); 
		subMChild.prepend('<span class="drop"><i></i></span>').wrapInner("<ul><li></li></ul>"); 
		$('.sub-nav .drop').prepend('Submenu'); 
		$('#item-nav .drop').prepend('Member\'s menu');
		$('#item-body .drop').prepend('Actions'); 
		var subMCFirstLi = subMChild.children('li:first-child');
		var subMCFirstLiInnerLi = subMChild.children('ul li:nth-child(2)');
		var headTxt = subMCFirstLiInnerLi.text(); 
		subMenus.addClass('small-12 medium-12 large-12 xlarge-12 columns');
		 

		 
		$('body').on('click', '#item-nav .drop, #item-body .drop, .sub-nav .drop', function() { 
			$(this).children('i').toggleClass( "toggle-arrow" );
			$(this).parent().children('ul ul').toggleClass( "dropdown-on" );
			e.preventDefault();
		});	 
	}

	*/
$(function() {
  var loc = window.location.href; // returns the full URL
  if(/who-we-are/.test(loc)) {
    $('nav #who-we-are-links').addClass('current-menu-item'); 
  }
  if(/what-we-do/.test(loc)) {
    $('nav #what-we-do-links').addClass('current-menu-item'); 
  }
  if(/news/.test(loc)) {
    $('nav #news-links').addClass('current-menu-item'); 
  }
  if(/events/.test(loc)) {
    $('nav #events-links').addClass('current-menu-item'); 
  }
  if(/downloads/.test(loc)) {
    $('nav #downloads-links').addClass('current-menu-item'); 
  }
  if(/members/.test(loc) && !/group-members/.test(loc)) {
    $('nav #members-links').addClass('current-menu-item'); 
  }
  if(/group-members/.test(loc)) {
    $('nav #who-we-are').addClass('current-menu-item'); 
  }
  if(/contact-us/.test(loc)) {
    $('nav #contact-us-links').addClass('current-menu-item'); 
  } 
});