window.onload = function() {
    var video = document.querySelector('video');
    var img = document.getElementById('imgId');
    console.log(img)
    var poster = video.getAttribute('poster');
    img.setAttribute('src', poster);
    console.log(poster);
    
    
 
    var fixed = document.querySelector('.list-categoria .info');
    if(fixed){
        var initTop = 0;
        var footer = document.querySelector('footer');
        var main = document.querySelector('.list-categoria .container-grid');
        window.addEventListener('scroll', function() {
    
        var alturaMin = main.offsetHeight - footer.offsetHeight - fixed.offsetHeight - fixed.offsetTop;
        var altMin = (main.offsetHeight - (footer.offsetHeight + fixed.offsetHeight));
            
        if(this.scrollY > 0) {
            fixed.classList.add('fixed');
        } else {
            fixed.classList.remove('fixed');
        }
        
        initTop = initTop == 0 ? fixed.offsetTop : initTop;
        
        if(this.scrollY > alturaMin) {
            var sub = alturaMin - this.scrollY + fixed.offsetTop;
            fixed.style.top = sub + 'px';
            
        } else if(this.scrollY < altMin) {
            if(fixed.offsetTop != initTop) {
            fixed.style.top = initTop + 'px';
            
            }
        } else {
            fixed.style.top = (altMin - this.scrollY) + 'px';
        }
        });
    }

    const icons = document.querySelector('.ico-documentarios');
    const doc = '../img/ico-doc.pgn';
    doc.append(icons);

}

jQuery(document).ready(function ($) {
    $('.slider').slick({
        dots: false,
        infinite: true,
        arrows: false,
        slidesToShow: 6,
        slidesToScroll: 3,
        responsive: [{
            breakpoint: 1200,
                settings: {
                    slidesToShow: 5,
                }
            },{
            breakpoint: 992,
                settings: {
                    slidesToShow: 4, 
                }
            },{
                breakpoint: 768,
                settings: {
                    slidesToScroll: 3,
                    slidesToShow: 3,
                }
            },{
            breakpoint: 576,
                settings: {
                    slidesToScroll: 2,
                    slidesToShow: 2,
                }
            },{
            breakpoint: 400,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                }
            },{
            breakpoint: 320,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                }
            }
        ]
    });

    const container = document.querySelector('.container-grid');
    const slider = document.querySelectorAll('.slider');
    if(slider){
        function margin(){
            const slideWidth = container.offsetLeft+'px';
            slider.forEach(element => {
                element.style.marginLeft = slideWidth;
            });
        }
        window.addEventListener('resize', margin);
        margin();
    }
    
});
