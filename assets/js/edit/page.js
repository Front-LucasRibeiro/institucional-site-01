function setMask() {
  $('input[name="telefone"]').mask('(00) 00000-0000');
}

function setBannerPitiplay(){
  let bannerTop = $('.banner-top-pitiplay img');

  setTimeout(function(){
    $('.institucional.pitiplay .yrc-brand').append(bannerTop)
  },1500);
}

function setLoadMoreTxt(){
  setTimeout(function(){
    let texto = $('.yrc-load-more-button').html();
    let qtdItens = texto.split(' ')[0];

    $('.yrc-load-more-button').html(`carregar mais (${qtdItens})`);
  },1500);
}


$(document).ready(() => {
  setMask()
  setBannerPitiplay()
  setLoadMoreTxt()
})