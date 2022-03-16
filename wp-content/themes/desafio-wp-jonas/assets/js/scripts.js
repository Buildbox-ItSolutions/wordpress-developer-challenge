$('.owl-carousel').owlCarousel({
   items: 1,
   margin: 30,
   dots: false,
   autoWidth: true,
   screenLeft: true,
});


video = document.querySelector('.video');
playButton = document.querySelector('.play-button');

playButton.addEventListener('click', function (e) {
   e.preventDefault();

   video.play()

   this.remove();

   video.setAttribute('controls', 'controls')
})