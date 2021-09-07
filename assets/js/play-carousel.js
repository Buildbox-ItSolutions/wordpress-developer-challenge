jQuery(document).ready(function($) {
	$('#playFilmes').owlCarousel({
		stagePadding: 50,
		margin:30,
		loop:true,
		autoWidth:true,
		items:7,
		dots:false,
		nav: true,
		navText: [
			'<img src="wp-content/themes/wordpress-developer-challenge/assets/img/left.svg" width="45" />',
			'<img src="wp-content/themes/wordpress-developer-challenge/assets/img/right.svg" width="45" />'
		],
		navContainer: '#playCarousel.filmes .custom-nav',
		responsive:{
			0:{
				items: 1
			},
			600:{
				items: 3
			},
			1000:{
				items: 5
			}
		}
	});
	$('#playDocumentarios').owlCarousel({
		stagePadding: 50,
		margin:30,
		loop:true,
		autoWidth:true,
		items:7,
		dots:false,
		nav: true,
		navText: [
			'<img src="wp-content/themes/wordpress-developer-challenge/assets/img/left.svg" width="45" />',
			'<img src="wp-content/themes/wordpress-developer-challenge/assets/img/right.svg" width="45" />'
		],
		navContainer: '#playCarousel.doc .custom-nav',
		responsive:{
			0:{
				items: 1
			},
			600:{
				items: 3
			},
			1000:{
				items: 5
			}
		}
	});
	$('#playSeries').owlCarousel({
		stagePadding: 50,
		margin:30,
		loop:true,
		autoWidth:true,
		items:7,
		dots:false,
		nav: true,
		navText: [
			'<img src="wp-content/themes/wordpress-developer-challenge/assets/img/left.svg" width="45" />',
			'<img src="wp-content/themes/wordpress-developer-challenge/assets/img/right.svg" width="45" />'
		],
		navContainer: '#playCarousel.series .custom-nav',
		responsive:{
			0:{
				items: 1
			},
			600:{
				items: 3
			},
			1000:{
				items: 5
			}
		}
	});

});