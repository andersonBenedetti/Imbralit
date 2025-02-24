jQuery(document).ready(function ($) {
  let $carouselBanner = $(".carousel-banner");

  $carouselBanner.on(
    "init reInit afterChange",
    function (event, slick, currentSlide) {
      let i = (currentSlide ? currentSlide : 0) + 1;
      $(".slick-counter").text(i + "/" + slick.slideCount);
    }
  );

  $carouselBanner.slick({
    autoplay: true,
    dots: false,
    arrows: true,
    infinite: false,
    speed: 1000,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
  });

  jQuery(".carousel-blog").slick({
    autoplay: true,
    dots: false,
    arrows: false,
    infinite: true,
    speed: 1000,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    centerMode: false,
    variableWidth: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          variableWidth: false,
        },
      },
    ],
  });

  jQuery(".carousel-story").slick({
    autoplay: false,
    dots: false,
    arrows: true,
    infinite: false,
    speed: 1000,
    autoplaySpeed: 2000,
    slidesToShow: 4,
    swipeToSlide: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1.5,
        },
      },
    ],
  });

  jQuery(".carousel-social").slick({
    autoplay: true,
    dots: false,
    arrows: true,
    infinite: true,
    speed: 1000,
    autoplaySpeed: 2000,
    slidesToShow: 2,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
});
