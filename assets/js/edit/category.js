let tela2 = window.innerWidth

function carouselCriticas() {
  if (tela2 > 1260) {
    $('.section-criticas .list-posts').slick({
      arrows: true,
      dots: false,
      autoplay: false,
      autoplaySpeed: 2000,
      slidesToShow: 3,
      slidesToScroll: 2,
    });
  }
}



$(document).ready(function () {
  carouselCriticas();
})
