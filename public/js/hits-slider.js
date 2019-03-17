$('.lazy').slick({
  lazyLoad: 'ondemand',
  speed:300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
  	{
      breakpoint: 1620,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 567,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
  prevArrow: "<button class='slick-arrow slick-prev'><i class='fas fa-caret-square-left'></i></button>",
  nextArrow: "<button class='slick-arrow slick-next'><i class='fas fa-caret-square-right'></i></button>",
  centerPadding: '80px',
  slidesToScroll: 1
});