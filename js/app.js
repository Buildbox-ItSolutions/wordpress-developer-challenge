jQuery(document).foundation();

jQuery(document).ready(function(){
    jQuery('.movielist').slick({
      slidesToShow: 7,
      slidesToScroll: 1,
      responsive: [
          {
              breakpoint: 1024,
              settings: {
                  slidesToShow: 5
              }
          },
          {
              breakpoint: 800,
              settings: {
                  slidesToShow: 4
              }
          },
          {
              breakpoint: 600,
              settings: {
                  slidesToShow: 3
              }
          },
          {
              breakpoint: 400,
              settings: {
                  slidesToShow: 2
              }
          }
      ]
    });
  });