function openSearch() {

  $('.box-search-buttons .search').on('click', function () {

    $(this).hide();

    $('.box-search-buttons .close').show();

    $('.wrapper-busca').show();

  })



  $('.box-search-buttons .close').on('click', function () {

    $(this).hide();

    $('.wrapper-busca').hide();

    $('.box-search-buttons .search').show();

  })

}



function openMenuMob() {

  $('.menu-mob .menu').on('click', function () {

    $(this).hide()

    $('.menu-content-mob').show()

    $('.menu-mob .close').css('display', 'inline-block')

  })



  $('.menu-mob .close').on('click', function () {

    $(this).hide()

    $('.menu-content-mob').hide()

    $('.menu-mob .menu').show()

  })

}



function setColorCategory() {

  $('.post-categories li').each(function () {
    let nomeCategoria = $(this).find('a').attr('href').split('/category/')[1].replace('/', '');
    let _this = $(this);

    categoryJSON.map((item) => {
      if (nomeCategoria === item.nome) {
        _this.css('background', `${item.color}`)
      }
      if (nomeCategoria === item.nome && item.nome === 'piticas') {
        _this.find('a').css('color', `${item.corTexto}`)
      }
    })
  })
}



function cardPiticast() {



  setTimeout(function () {

    $('.wrapper-piticast .list-post-item').each(function () {

      let audio = $(this).find('audio source').attr('src').indexOf('.mp3');



      if (audio === -1) {

        $(this).find('audio').hide()

        $(this).find('.title-post').css('margin-top', '0');

      }

    });



  }, 1000)



  $('.wrapper-piticast .list-post-item > a').on('click', function (e) {

    e.preventDefault();



    let url = $(this).attr('href');



    if (url !== '') {

      window.open(url, '_blank');

    }

  });

}

function popupHome() {
  let urlvideo = $('.overlay-popup.popup-ativo .box-video').attr('urlvideo');
  let btnClose = $('.overlay-popup.popup-ativo .btn-close');
  let modalHasClose = sessionStorage.getItem('modalClose');

  if(urlvideo !== undefined){
    urlvideo = urlvideo.split('https://www.youtube.com/watch?v=')[1];
  }

  let iframe = `<iframe src="https://www.youtube.com/embed/${urlvideo}?enablejsapi=1&version=3&playerapiid=ytplayer" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;

  $('.overlay-popup.popup-ativo .box-video').append(iframe);


  if (modalHasClose !== 'true') {
    let interval = setInterval(function () {
      if ($('.overlay-popup.popup-ativo iframe').length > 0) {
        clearInterval(interval)

        setTimeout(function () {
          btnClose.css('display', 'flex');
        }, 3000)
      }
    }, 100)
  }else{
    $('.overlay-popup').removeClass('popup-ativo')
  }

  btnClose.on('click', function (e) {
    e.preventDefault();

    pauseIframeVideo()
    sessionStorage.setItem('modalClose', 'true');
    $('.overlay-popup').hide().removeClass('popup-ativo')
  })
}

function pauseIframeVideo() {
  $('.overlay-popup iframe')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}','*');
}



$(document).ready(() => {
  openSearch()
  openMenuMob()
  setColorCategory()
  cardPiticast()
  popupHome()
})




