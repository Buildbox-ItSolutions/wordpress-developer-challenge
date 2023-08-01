const sliderFilm = document.querySelector('.slider-single__film')
const sliderDocs = document.querySelector('.slider-single__docs')
const sliderSeries = document.querySelector('.slider-single__series')
const buttonArrow = document.querySelector(".btn-control")
const isLeft = document.querySelectorAll(".btn-slider-left")
const isRight = document.querySelectorAll(".btn-slider-right")

const articleItem = document.querySelector('.article')

isLeft.forEach(function(element) {
  element.addEventListener("click", function() {
    let slider;
  
    if (element.classList.contains('left-film')) {
      slider = sliderFilm;
    } else if (element.classList.contains('left-docs')) {
      slider = sliderDocs;
    } else if (element.classList.contains('left-series')) {
      slider = sliderSeries;
    }
  
    const sliderItems = slider.children;
  
    let moveElement = sliderItems[0];
    let cloneElement = moveElement.cloneNode(true);
    let parentElement = moveElement.parentNode;
  
    cloneElement.style.opacity = 0;
    cloneElement.style.pointerEvents = 'none';
  
    parentElement.appendChild(cloneElement);
  
    requestAnimationFrame(() => {
      cloneElement.style.transform = 'translateX(100%)';
  
      setTimeout(() => {
        parentElement.removeChild(cloneElement);
        parentElement.appendChild(moveElement);
      }, 400);
    });
  });
});

isRight.forEach(function(element) {
  element.addEventListener("click", function() {
    let slider;
  
    if (element.classList.contains('right-film')) {
      slider = sliderFilm;
    } else if (element.classList.contains('right-docs')) {
      slider = sliderDocs;
    } else if (element.classList.contains('right-series')) {
      slider = sliderSeries;
    }
  
    const sliderItems = slider.children;
  
    let moveElement = sliderItems[sliderItems.length - 1];
    let cloneElement = moveElement.cloneNode(true);
    let parentElement = moveElement.parentNode;
  
    cloneElement.style.opacity = 0;
    cloneElement.style.pointerEvents = 'none';
  
    parentElement.insertBefore(cloneElement, parentElement.firstChild);
  
    requestAnimationFrame(() => {
      cloneElement.style.transform = 'translateX(-100%)';
  
      setTimeout(() => {
        parentElement.removeChild(cloneElement);
        parentElement.insertBefore(moveElement, parentElement.firstChild);
      }, 100);
    });
  });
});
