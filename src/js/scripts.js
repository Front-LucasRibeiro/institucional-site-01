var $ = jQuery;
let swiper;

function openModal(card) {
  const modal = document.getElementById("myModal");
  const modalSwiperWrapper = document.getElementById("modal-swiper-wrapper");
  modalSwiperWrapper.innerHTML = ''; // Limpa o conteúdo anterior

  const clickedImage = card.querySelector('img').src; // Obtém a imagem do card clicado
  const clickedLegend = card.querySelector('.legend').textContent; // Obtém a legenda do card clicado

  // Adiciona a imagem correspondente ao card clicado
  const slide = document.createElement('div');
  slide.classList.add('swiper-slide');

  const imgElement = document.createElement('img');
  imgElement.src = clickedImage;
  imgElement.alt = clickedLegend; // Usa a legenda como alt
  slide.appendChild(imgElement);

  const legend = document.createElement('span');
  legend.classList.add('legend');
  legend.textContent = clickedLegend; // Define a legenda abaixo da imagem
  slide.appendChild(legend);

  modalSwiperWrapper.appendChild(slide); // Adiciona o slide ao modal

  // Adiciona todas as outras imagens e legendas
  const images = document.querySelectorAll('.cards-portfolio .image-container img');
  images.forEach((img) => {
      if (img.src !== clickedImage) { // Evita adicionar a imagem já exibida
          const slide = document.createElement('div');
          slide.classList.add('swiper-slide');

          const imgElement = document.createElement('img');
          imgElement.src = img.src;
          imgElement.alt = img.alt;
          slide.appendChild(imgElement);

          const legend = document.createElement('span');
          legend.classList.add('legend');
          const legendText = img.closest('li').querySelector('.legend').textContent; // Pega a legenda do card correspondente
          legend.textContent = legendText;
          slide.appendChild(legend); // Adiciona a legenda abaixo da imagem

          modalSwiperWrapper.appendChild(slide);
      }
  });

  modal.style.display = "block";

  setTimeout(() => {
        swiper = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            loop: true,
        });
    }, 100); // Delay de 100 ms
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
  if (swiper) {
    swiper.destroy();
  }
}

window.onclick = function(event) {
  const modal = document.getElementById("myModal");
  if (event.target === modal) {
      closeModal();
  }
}

function carouselTop() {
  $('.container-banner').slick({
    infinite: true,
    slidesToShow:  1,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 500,
    fade: true,
    cssEase: 'linear'
  })
}

function carouselTeam() {
  if ($('.equipe > ul').length >= 3) { 

    $('.equipe > ul').slick({
      infinite: true,
      slidesToShow:  3,
      slidesToScroll: 1,
      arrows: true,
      autoplay: true,
      autoplaySpeed: 3000,
      speed: 500,
      responsive: [
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        },
      ]
    })
  }
}

function openMenuMob() {
  $('.menu-mob').on("click", function () {
    $('.content-menu').toggleClass('active');
  })

  $('.content-menu .close').on("click", function () {
    $('.content-menu').removeClass('active');
  })
}

function carouselSectionTop() {
  if ($('.carousel-top li').length >= 3) {
    $('.carousel-top').slick({
      infinite: true,
      slidesToShow:  3,
      slidesToScroll: 1,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 3000,
      speed: 500,
      responsive: [
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            centerMode: true,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
          }
        },
      ]
    })
  }
}

function carouselClients() {
  if ($('.carousel-clientes li').length >= 5) { 

    $('.carousel-clientes').slick({
      infinite: true,
      slidesToShow:  5,
      slidesToScroll: 1,
      arrows: true,
      autoplay: true,
      autoplaySpeed: 3000,
      speed: 500,
        responsive: [
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
      ]
    })
  }
}

function portfolioCarousel() {
  $('.cards-portfolio li').on('click', function () {
    openModal(this)
  })
}

function scrollTop() {
  
  $('#scroll-top').on('click', function () {
    $('html, body').animate({ scrollTop: $('.header').offset().top }, 500);
  })

  $(window).on('scroll', function () {
    if ($(this).scrollTop() > $('.header').height()) {
      $('#scroll-top').show()
    } else {
      $('#scroll-top').hide()
    }
  })
}

function scrollSection() {
  $('header .menu li a').on('click', function () {
    const url = $(this).attr('href').split('/')[1]    
    $('html, body').animate({ scrollTop: $(url).offset().top - 50 }, 500);
    
    if (window.innerWidth <= 942) {
      $('.content-menu').removeClass('active');
    }
  })
}


$(document).ready(function () {
  scrollSection()
  carouselTop()
  carouselSectionTop()
  portfolioCarousel()
  carouselTeam()
  setTimeout(function () {
    carouselClients()
  }, 500)
  scrollTop()
  openMenuMob()
  closeModal()
})