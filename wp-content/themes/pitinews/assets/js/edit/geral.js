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
    $('.menu-mob .close').css('display','inline-block')
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
    $(`.${item.nome} a`).css('color',`${item.corTexto}`)
  })
}

$(document).ready(() => {
  openSearch()
  openMenuMob()
  setColorCategory()
})

