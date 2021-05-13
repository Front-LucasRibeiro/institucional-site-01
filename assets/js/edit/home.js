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


function instafeed(){
  let linkInstagram = $('.wrapper-instagram .title-desk a').attr('href')

  $('.instagram .popup-gallery li').each(function(){
    $(this).find('a').attr('href', `${linkInstagram}`).attr('target','_blank')
  })
}


$(document).ready(() => {

  slickPrincipal()
  instafeed()

})