 $('.product-sl').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  swipe:false,
  asNavFor: '.product-sl-nav'
});
$('.product-sl-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows:false,
  asNavFor: '.product-sl',
  centerMode: true,
  focusOnSelect: true
});