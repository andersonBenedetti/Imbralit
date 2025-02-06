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
});
