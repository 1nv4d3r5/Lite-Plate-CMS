$(document).ready(function(){
	$('.return_to_top').click(function() {
		window.scrollTo(0,0);
		return false;
	});
	$('.return_to_top').mouseover(function() {
		$(this).addClass('return_to_top_hover');
	});
	$('.return_to_top').mouseout(function() {
		$(this).removeClass('return_to_top_hover');
	});
});