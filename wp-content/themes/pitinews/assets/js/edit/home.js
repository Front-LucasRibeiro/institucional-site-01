let tela = window.innerWidth

function slickPrincipal() {
  $('#sliderTopo').slick({
    arrows: false,
    dots: true,
    autoplay: true,
    autoplaySpeed: 2000,
  });

  if (tela <= 480) {
    $('#sliderTopoMob').slick({
      arrows: false,
      dots: true,
      autoplay: true,
      autoplaySpeed: 2000,
    });
  }
}

$(document).ready(() => {
  slickPrincipal()
})