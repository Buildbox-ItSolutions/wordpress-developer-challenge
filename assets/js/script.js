(function( $ ) {
$(document).ready(function() {
  $('.wrapper').slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    mobileFirst:true,
    responsive: [
    {
      breakpoint: 2000,
      settings: {
        slidesToShow: 7,
        slidesToScroll: 1,
        infinite: true,
      }
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
      }
    }
  // You can unslick at a given breakpoint now by adding:
  // settings: "unslick"
  // instead of a settings object
]
  });
});
})(jQuery);
