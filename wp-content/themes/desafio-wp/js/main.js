// Carousel Slide Swiper
const swiper = new Swiper('.swiper', {
  slidesPerView: 1,
  mousewheel: true,
  keyboard: true,
  breakpoints: {
    300: {
      slidesPerView: 2,
      setWrapperSize: true
    },
    550: {
      slidesPerView: 3,
      setWrapperSize: true
    },
    740: {
      slidesPerView: 4,
      setWrapperSize: true
    },
    900: {
      slidesPerView: 5,
      setWrapperSize: true
    },
    1150: {
      slidesPerView: 6,
      setWrapperSize: true
    }
  }
})