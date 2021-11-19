$(document).ready(function(){

  //Implement slide in films list
  $('.films .container .films-card').slick({
    dots: false,
    prevArrow: false,
    nextArrow: false,
    infinite: true,
    speed: 300,
    slidesToShow: 6,
    slidesToScroll: 6,
    responsive: [
      {
        breakpoint: 1601,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 5,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 1367,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }
    ]
  });

  //Set lightbox for embed films
  $('[data-fancybox]').fancybox({
    toolbar  : false,
    smallBtn : true,
    iframe : {
      preload : false
    }
  })

  //Scroll navbar in mobile version
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 100) {
      $(".nav-mobile").addClass("nav-transform");
    } else {
      $(".nav-mobile").removeClass("nav-transform");
    }
  }); //missing );
});
