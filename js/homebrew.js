//Hard-coded JS JQuery AJAX AngularJS
//Author : Rohan Krishna
//All Rights Reserved.
//Version 1.0

$(document).ready(function() {
	

	//Adjust Channel Navigation Toggle
	var chnTgWd = $('.channel-toggle').outerWidth();
	$('.channel-menu ul li').css("width",chnTgWd);

	$('.channel-toggle').click(function() {
		$('.channel-menu ul').toggle();
	});
	$('.channel-toggle').click(function(e) {
		e.stopPropagation();
		return false;
	});
	$('.wp-post-image').addClass('waves-toggle');

	//Waves Attachments
	Waves.init();
	Waves.attach('.waves-toggle');
	Waves.attach('.flat-box', ['waves-block']);

	//About University Divs
	

	//Navigation Menu Drop-down
	var aboutSub = $('#about-item');
		$(aboutSub).click(function(event) {
			event.stopPropagation();
			$('#about-sub').slideToggle();
		});
		$(document).click(function() {
			$('#about-sub').slideUp();
		});
	
	//Slider Tweaks

	//Title Attribute Selector]
	
	$(document).click(function() {
		$('.hidden-nav').removeClass('show-me');
	});
	$('.hidden-nav').click(function(e) {
		e.stopPropagation();
	});
	$("a[title |='trigger']").click(function(e) {
		$('.hidden-nav').addClass('show-me');
		e.stopPropagation();
	});

});
