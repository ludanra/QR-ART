
    const swiper = new Swiper('.swiper', {

       // Optional parameters
    direction: 'horizontal',
    loop: true,

      // Default parameters
      slidesPerView: 1.5,
      spaceBetween: 10,
      // Responsive breakpoints
      breakpoints: {
        // when window width is >= 320px
        320: {
          slidesPerView: 1.5,
          spaceBetween: 20
        },
        // when window width is >= 480px
        480: {
          slidesPerView: 2,
          spaceBetween: 30
        },
        // when window width is >= 640px
        640: {
          slidesPerView: 3.5,
          spaceBetween: 40
        },
        // when window width is >= 1200px
        1200:{
          slidesPerView:4.5,
          spaceBetween: 50.
        }
      }
    });

    

    