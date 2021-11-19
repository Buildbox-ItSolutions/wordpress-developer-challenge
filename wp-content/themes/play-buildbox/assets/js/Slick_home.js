$(document).ready(function(){
  $('.card--list').slick({
    centerMode: true,
    centerPadding: '80px',
    dots: false,
    infinite: true,
    slidesToShow: 6,
    responsive: [
    {
      breakpoint: 768,
      settings: {
        centerPadding: '30px',
        centerMode: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
        dots: false
      }
    }],
  });
});