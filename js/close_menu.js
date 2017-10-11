$(document).ready(function(){
	$(".fa-times").click(function(){
		$(".sidebar").addClass("hide_menu");
		$(".toggle_menu").addClass("opacity_one");
	});

	$(".toggle_menu").click(function(){
		$(".sidebar").removeClass("hide_menu");
		$(".toggle_menu").removeClass("opacity_one");
	});
});
