jQuery(window).load(function() {
	jQuery(".loader-wrapper").delay(500).fadeOut("slow");
	jQuery('html').delay(1500).css({
		"margin":"",
		"height":"",
		"overflow":"",
	});
});
jQuery(document).ready(function($) {
	$('#menu-principal a, .item a, .logo, .destaque .btn-padrao-big').on('click', function(){
		$(".loader-wrapper").fadeIn("slow");
	});
});