export function slick() {

    $('.slider_slick').slick();





    $('.slick_slider__carusel').slick({
        slidesToShow: 3,
        slidesToScroll: 2,
        swipeToSlide: true,
        variableWidth: true,
        infinite: true,
        dots: true,
        accessibility:false,
        arrows:false,
        speed: 700,
        autoplay: false,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,

                }
            },
            {
                breakpoint: 793,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.slick_slider__carusel_part').slick({
        slidesToShow: 3,
        slidesToScroll: 2,
        swipeToSlide: true,
        variableWidth: true,
        infinite: true,
        dots: true,
        accessibility:false,
        arrows:false,
        speed: 700,
        autoplay: false,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,

                }
            },
            {
                breakpoint: 793,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });



}
