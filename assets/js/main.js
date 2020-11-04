
window.addEventListener('load',function(){
  document.querySelector('.glider1').addEventListener('glider-slide-visible', function(event){
      var glider = Glider(this);
      console.log('Slide Visible %s', event.detail.slide)
  });
  document.querySelector('.glider1').addEventListener('glider-slide-hidden', function(event){
      console.log('Slide Hidden %s', event.detail.slide)
  });
  document.querySelector('.glider1').addEventListener('glider-refresh', function(event){
      console.log('Refresh')
  });
  document.querySelector('.glider1').addEventListener('glider-loaded', function(event){
      console.log('Loaded')
  });

  window._ = new Glider(document.querySelector('.glider1'), {
      slidesToShow: 1, //'auto',
      slidesToScroll: 1,    
      draggable: true,
      scrollLock: false,
      dots: '#dots1',
      rewind: true,
      arrows: {
          prev: '.glider-prev1',
          next: '.glider-next1'
      },
      responsive: [
          {
              breakpoint: 800,
              settings: {
                  slidesToScroll: 'auto',               
                  slidesToShow: 'auto',
                  exactWidth: true
              }
          },
          {
              breakpoint: 700,
              settings: {
                  slidesToScroll: 4,
                  slidesToShow: 4,
                  dots: false,
                  arrows: false,
              }
          },
          {
              breakpoint: 600,
              settings: {
                  slidesToScroll: 3,
                  slidesToShow: 3
              }
          },
          {
              breakpoint: 500,
              settings: {
                  slidesToScroll: 2,
                  slidesToShow: 2,
                  dots: false,
                  arrows: false,
                  scrollLock: true
              }
          }
      ]
  });
});




window.addEventListener('load',function(){
    document.querySelector('.glider2').addEventListener('glider-slide-visible', function(event){
        var glider = Glider(this);
        console.log('Slide Visible %s', event.detail.slide)
    });
    document.querySelector('.glider2').addEventListener('glider-slide-hidden', function(event){
        console.log('Slide Hidden %s', event.detail.slide)
    });
    document.querySelector('.glider2').addEventListener('glider-refresh', function(event){
        console.log('Refresh')
    });
    document.querySelector('.glider2').addEventListener('glider-loaded', function(event){
        console.log('Loaded')
    });
  
    window._ = new Glider(document.querySelector('.glider2'), {
        slidesToShow: 1, //'auto',
        slidesToScroll: 1,   
        draggable: true,
        scrollLock: false,
        dots: '#dots2',
        rewind: true,
        arrows: {
            prev: '.glider-prev2',
            next: '.glider-next2'
        },
        responsive: [
            {
                breakpoint: 800,
                settings: {
                    slidesToScroll: 'auto',                   
                    slidesToShow: 'auto',
                    exactWidth: true
                }
            },
            {
                breakpoint: 700,
                settings: {
                    slidesToScroll: 4,
                    slidesToShow: 4,
                    dots: false,
                    arrows: false,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToScroll: 3,
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToScroll: 2,
                    slidesToShow: 2,
                    dots: false,
                    arrows: false,
                    scrollLock: true
                }
            }
        ]
    });
  });
  
  
window.addEventListener('load',function(){
    document.querySelector('.glider3').addEventListener('glider-slide-visible', function(event){
        var glider = Glider(this);
        console.log('Slide Visible %s', event.detail.slide)
    });
    document.querySelector('.glider3').addEventListener('glider-slide-hidden', function(event){
        console.log('Slide Hidden %s', event.detail.slide)
    });
    document.querySelector('.glider3').addEventListener('glider-refresh', function(event){
        console.log('Refresh')
    });
    document.querySelector('.glider3').addEventListener('glider-loaded', function(event){
        console.log('Loaded')
    });
  
    window._ = new Glider(document.querySelector('.glider3'), {
        slidesToShow: 1, //'auto',
        slidesToScroll: 1,
        // itemWidth: 250,
        draggable: true,
        scrollLock: false,
        dots: '#dots3',
        rewind: true,
        arrows: {
            prev: '.glider-prev3',
            next: '.glider-next3'
        },
        responsive: [
            {
                breakpoint: 800,
                settings: {
                    slidesToScroll: 'auto',
                    // itemWidth: 200,
                    slidesToShow: 'auto',
                    exactWidth: true
                }
            },
            {
                breakpoint: 700,
                settings: {
                    slidesToScroll: 4,
                    slidesToShow: 4,
                    dots: false,
                    arrows: false,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToScroll: 3,
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToScroll: 2,
                    slidesToShow: 2,
                    dots: false,
                    arrows: false,
                    scrollLock: true
                }
            }
        ]
    });
  });
  
  