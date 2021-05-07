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
  let iframe = $('.overlay-popup.popup-ativo iframe');
  let btnClose = $('.overlay-popup.popup-ativo .btn-close');
  let modalHasClose = sessionStorage.getItem('modalClose');

  console.log('mod', modalHasClose)

  if (modalHasClose !== 'true') {
    let interval = setInterval(function () {
      if (iframe.length > 0) {
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

    sessionStorage.setItem('modalClose', 'true');
    $('.overlay-popup').hide().removeClass('popup-ativo')
  })
}




$(document).ready(() => {
  openSearch()
  openMenuMob()
  setColorCategory()
  cardPiticast()
  popupHome()
})




