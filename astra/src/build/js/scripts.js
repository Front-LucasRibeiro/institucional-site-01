var $ = jQuery;

function carouselTop() {
  $('.container-banner').slick({
    infinite: true,
    slidesToShow:  1,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 500,
    fade: true,
    cssEase: 'linear'
  })
}

function openMenuMob() {
  $('.menu-mob').on("click", function () {
    $('.content-menu').toggleClass('active');
  })

  $('.content-menu .close').on("click", function () {
    $('.content-menu').removeClass('active');
  })
}


$(document).ready(function () {
  carouselTop()
  openMenuMob()
})