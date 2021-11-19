document.addEventListener("DOMContentLoaded", function(event) { 
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 'auto',
        spaceBetween: 20,
        freeMode: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          // when window width is <= 499px
          499: {
              slidesPerView: 'auto',
              spaceBetweenSlides: 20
          },
          // when window width is <= 999px
          1200: {
              slidesPerView:'auto',
              spaceBetweenSlides: 5
          }
        }
      });
});

