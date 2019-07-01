//Slider masonry
/**
 * Slidewakars en este archivo
 * 	Slider de Mazonsy
 */
const $ = jQuery
const w = window

$(document).ready(function(){

	$('.flex-control-top').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		asNavFor: '.flex-control-nav',
	});
	$('.flex-control-nav').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: '.flex-control-top',
		focusOnSelect: true,
		vertical: true,
		verticalSwiping: true,
		arrows: false,
	});
});
