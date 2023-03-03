jQuery(function($){	
	$(document).ready(function(){

		// let heightHeader = $('header.header').height()
		// $('.speace-header').css('height', heightHeader + 10)

		// $('.banner > div.banner-item:first-child').addClass('active').on('load', function() {});		  
		// let interval = setInterval(nextImage, 15000)
		// function nextImage(){
		// 	let activeImg = $('.banner > div.banner-item.active')
		// 	if(activeImg.next('div').length){
		// 		activeImg.next('div').addClass('active')
		// 	}else{
		// 		$('.banner > div.banner-item:first-child').addClass('active')
		// 	}
		// 	activeImg.removeClass('active')
		// }

		$('.banner').slick({
			arrows: false,
			dots: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 600000,
			infinite: false,
		})
		$('.slider').slick({
			centerMode: true,
			centerPadding: '0px',
			initialSlide: 3,
  			infinite: false,
			arrows: false,
			dots: false,
			swipeToSlid: true,
			slidesToShow: 7,
			slidesToScroll: 3,
			responsive: [
			  {
				breakpoint: 700,
				settings: {
					centerMode: true,
					centerPadding: '00px',
					initialSlide: 1,
					infinite: false,
					arrows: false,
					dots: false,
					swipeToSlid: true,
					slidesToShow: 2,
					slidesToScroll: 3,
				}
			  },
			]
		  });
	});
});