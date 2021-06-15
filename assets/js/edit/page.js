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
    let textoVideos = $('.yrc-video-list .yrc-load-more-button').html();
    let textoPlaylist = $('.yrc-playlists .yrc-load-more-button').html();
    let qtdItensVideos = textoVideos.split(' ')[0];
    let qtdItensPlaylist = textoPlaylist.split(' ')[0];

    $('.yrc-video-list .yrc-load-more-button').html(`carregar mais (${qtdItensVideos})`);
    $('.yrc-playlists .yrc-load-more-button').html(`carregar mais (${qtdItensPlaylist})`);
  },1500);
}

$(document).ajaxComplete(function (event, xhr, settings) {
  if (settings.url) {
    if (settings.url.indexOf('/youtube/v3/search') > -1) {
      let textoVideos = $('.yrc-video-list .yrc-load-more-button').html();
      let qtdItensVideos = textoVideos.split(' ')[0];
      $('.yrc-video-list .yrc-load-more-button').html(`carregar mais (${qtdItensVideos})`);
    }

    if (settings.url.indexOf('playlists') > -1) {
      let textoPlaylist = $('.yrc-playlists .yrc-load-more-button').html();
      let qtdItensPlaylist = textoPlaylist.split(' ')[0];
      $('.yrc-playlists .yrc-load-more-button').html(`carregar mais (${qtdItensPlaylist})`);
    }
  }
});

$(document).ready(() => {
  setMask()
  setBannerPitiplay()
  setLoadMoreTxt()
})