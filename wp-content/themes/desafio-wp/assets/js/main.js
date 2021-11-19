//repetidor do conteúdo da homepage

jQuery( function(){

  $('div.carr').owlCarousel({

	loop: true,

	lazyLoad: true,

	margin: 0,

	autoWidth: false,

	  responsive: {
		0: {
		  items: 2,
		},
		768: {
		  items: 2,
		  autoWidth: false,
		},
		992: {
		  items: 4,
		  autoWidth: false,
		},
		1310: {
		  items: 5,
		  autoWidth: false,
		}
	  }


  });

});

