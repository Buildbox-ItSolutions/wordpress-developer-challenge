"use strict";

const options = { 
    slidesToShow: 1,
    slidesToScroll: 1,
    draggable: true,
    responsive: [
        {
        breakpoint: 0,
        settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
        breakpoint: 576,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
            },
        },
        {
        breakpoint: 768,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
            },
        },
        {
        breakpoint: 992,
            settings: {
                slidesToShow: 6,
                slidesToScroll: 6,
            },
        },
    ],
};

const carousels = document.querySelectorAll(".js-slider");
Object.values(carousels).map(carousel => {
    new Glider(carousel, options);
});