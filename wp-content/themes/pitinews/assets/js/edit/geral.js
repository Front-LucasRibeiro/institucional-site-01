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
  $('.post-categories').each(function () {
    let urlCategory = $(this).find('li a').attr('href')
    urlCategory = urlCategory.split('category/')[1]
    urlCategory = urlCategory.split('/')[0]
    $(this).find('li a').parent().addClass(urlCategory)
  })

  categoryJSON.map((item) => {
    $(`.${item.nome}`).css('backgroundColor', `${item.color}`)
    $(`.${item.nome} a`).css('color', `${item.corTexto}`)
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

$(document).ready(() => {
  openSearch()
  openMenuMob()
  setColorCategory()
  cardPiticast()
})

