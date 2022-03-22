export default {
  init() {
    // JavaScript to be fired on the home page
    $('.slick-vitrine').slick({
      infinite: true,
      autoplay: true,
      dots: false,
      arrows: false,
      lazyLoad: 'progressive',
    });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
