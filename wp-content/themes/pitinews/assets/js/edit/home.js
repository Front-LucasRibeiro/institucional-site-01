function slickPrincipal() {
  let tela = window.innerWidth

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