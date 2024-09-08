<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
<?php $home = get_template_directory_uri(); ?>

<section class="banner-top">
  <div class="container-banner">
    <div>
      <img src="<?= $home; ?>/src/images/BANNER-HOME.png" alt="">
      <div class="info-text">
        <div class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum possimus aliquam assumenda fugit quaerat, praesentium quas dolores libero ratione commodi vero impedit optio blanditiis obcaecati hic adipisci cum odio illum.</div>
      </div>
    </div>
    <div>
      <img src="<?= $home; ?>/src/images/construction-cranes-and-concrete-structure-at-suns-PBLEVC8.jpg" alt="">
      <div class="info-text">
        <div class="text">
          Texto Informativo 2
        </div>  
      </div>
    </div>
  </div>
</section>

<section class="section-topo">
  <ul class="carousel-top container">
    <li>
      <img src="<?= $home; ?>/src/images/Ativo-1.png" alt="Item 1">
      <span class="text">Item 1</span>
    </li>
    <li>
      <img src="<?= $home; ?>/src/images/Ativo-4.png" alt="Item 3">
      <span class="text">Item 3</span>
    </li>
    <li>
      <img src="<?= $home; ?>/src/images/Ativo-1.png" alt="Item 1">
      <span class="text">Item 1</span>
    </li>
    <li>
      <img src="<?= $home; ?>/src/images/Ativo-4.png" alt="Item 3">
      <span class="text">Item 3</span>
    </li>
  </ul>
</section>

<section class="servicos container">
  <h2 class="title">Serviços</h2>

  <h3 class="sub-title">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda quae officia voluptatibus facere repudiandae, rem rerum nostrum molestiae reprehenderit. Error, corporis molestias.</h3>

  <div class="cards-services">
    <ul>
      <li>
        <span class="name">Projeto</span>
        <img src="<?= $home; ?>/src/images/projeto.jpg" alt="Projeto" class="icon">
      </li>
      <li>
        <span class="name">Consultoria</span>
        <img src="<?= $home; ?>/src/images/consultoria.jpg" alt="Projeto" class="icon">
      </li>
       <li>
        <span class="name">ASSISTÊNCIA À OBRA</span>
        <img src="<?= $home; ?>/src/images/assistencia.jpg" alt="Projeto" class="icon">
      </li>
      <li>
        <span class="name">Consultoria</span>
        <img src="<?= $home; ?>/src/images/consultoria.jpg" alt="Projeto" class="icon">
      </li>
      <li>
        <span class="name">Projeto</span>
        <img src="<?= $home; ?>/src/images/projeto.jpg" alt="Projeto" class="icon">
      </li>
      <li>
        <span class="name">Consultoria</span>
        <img src="<?= $home; ?>/src/images/consultoria.jpg" alt="Projeto" class="icon">
      </li>
    </ul>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique alias autem delectus id cupiditate impedit. Nisi dolore sapiente eaque deleniti atque, alias omnis quis aperiam. Tempore consequatur nostrum fugiat magni? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias quis tempore nisi modi enim. Vitae veritatis hic amet distinctio dolorum tenetur saepe repudiandae dolorem, nobis eos consequatur quam quasi ipsum?</p>
  </div>
</section>

<section class="portfolio container swiper">
  <h2 class="title">Portfólio</h2>

  <ul class="cards-portfolio swiper-wrapper">
    <li class="swiper-slide card" onclick="openModal(this)">
      <div class="image-container">
        <img src="<?= $home; ?>/src/images/83-FACHADA-CASA-TIPO-1-FRENTE-2-2000x1205-1.jpg" alt="Ekko - Live Aplha One">
      </div>
      <span class="legend">Ekko - Live Aplha One</span>
    </li>
    <li class="swiper-slide card" onclick="openModal(this)">
      <div class="image-container">
        <img src="<?= $home; ?>/src/images/Sem-t°tulo-2-e1641944435393.jpg" alt="Palme - Tempus">
      </div>
      <span class="legend">Palme - Tempus</span>
    </li>
    <li class="swiper-slide card" onclick="openModal(this)">
      <div class="image-container">
        <img src="<?= $home; ?>/src/images/foto-de-maquete-fisica-de-Edificios_Residenciais-em-SC-2.webp" alt="Procave - Fischer Dreams">
      </div>
      <span class="legend">Procave - Fischer Dreams</span>
    </li>
    <li class="swiper-slide card" onclick="openModal(this)">
      <div class="image-container">
        <img src="<?= $home; ?>/src/images/stefani_nogueira__20072021105848.jpg" alt="Stéfani Nogueira - Plaza La Coruña">
      </div>
      <span class="legend">Stéfani Nogueira - Plaza La Coruña</span>
    </li>
    <li class="swiper-slide card" onclick="openModal(this)">
      <div class="image-container">
        <img src="<?= $home; ?>/src/images/full-perspectiva-ilustrada-da-fachada.jpg" alt="Stéfani Nogueira - Resid. Atmosphere">
      </div>
      <span class="legend">Stéfani Nogueira - Resid. Atmosphere</span>
    </li>
    <li class="swiper-slide card" onclick="openModal(this)">
      <div class="image-container">
        <img src="<?= $home; ?>/src/images/5a09a5e5162f9400010f5c5b_cam2-scaled.jpg" alt="Stéfani Nogueira - Ribeirão Diesel">
      </div>
      <span class="legend">Stéfani Nogueira - Ribeirão Diesel</span>
    </li>
  </ul>

  <a href="" class="btn-more">Veja mais</a>
</section>


<section class="empresa">
  <h2 class="title">Empresa</h2>
  <div class="container">
    <div class="wrap">
      <div class="card">
        <img src="<?= $home; ?>/src/images/bullseye-arrow.svg" alt="Missão">
        <h3>Missão:</h3>
        <p>Nossa missão é prestar o melhor serviço de projeto e consultoria voltados para a produção de vedações em edificações, oferecendo assessoria integral e eficiente para obter a confiança e satisfação de nossos clientes.</p>
      </div>
       <div class="card">
        <img src="<?= $home; ?>/src/images/arrow-square-up.svg" alt="Visão">
        <h3>Visão:</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum reiciendis quaerat sed maiores. Impedit provident vitae repellendus similique quos aliquid, numquam voluptatem tempora fugiat ipsum doloremque, sint esse alias ratione.</p>
      </div>
       <div class="card">
        <img src="<?= $home; ?>/src/images/handshake.svg" alt="Valores">
        <h3>Valores:</h3>
        <p>Competência, Confiança, Proximidade, Pessoalidade.</p>
      </div>
    </div>
  </div>
</section>

<section class="equipe container">
  <h2 class="title">Equipe</h2>

  <ul>
    <li>
      <div class="col-left">
        <img src="<?= $home; ?>/src/images/user.jpg" alt="" class="photo">
        <span class="name">Lorem Ipsun</span>
        <span class="cargo">Sócio</span>
      </div>
      <div class="col-right">
        <span class="name">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio provident esse tenetur voluptate</span>
      </div>
    </li>
    <li>
      <div class="col-left">
        <img src="<?= $home; ?>/src/images/user.jpg" alt="" class="photo">
        <span class="name">Lorem Ipsun</span>
        <span class="cargo">Sócio</span>
      </div>
      <div class="col-right">
        <span class="name">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio provident esse tenetur voluptate</span>
      </div>
    </li>
    <li>
      <div class="col-left">
        <img src="<?= $home; ?>/src/images/user.jpg" alt="" class="photo">
        <span class="name">Lorem Ipsun</span>
        <span class="cargo">Gerente</span>
      </div>
      <div class="col-right">
        <span class="name">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio provident esse tenetur voluptate</span>
      </div>
    </li>
    <li>
      <div class="col-left">
        <img src="<?= $home; ?>/src/images/user.jpg" alt="" class="photo">
        <span class="name">Lorem Ipsun</span>
        <span class="cargo">Sócio</span>
      </div>
      <div class="col-right">
        <span class="name">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio provident esse tenetur voluptate</span>
      </div>
    </li>
  </ul>
</section>

<section class="clientes container">
  <h2 class="title">Clientes</h2>

  <ul class="carousel-clientes">
    <li>
      <img src="<?= $home; ?>/src/images/logo.png" alt="">
    </li>
    <li>
      <img src="<?= $home; ?>/src/images/no-logo.png" alt="">
    </li>
    <li>
      <img src="<?= $home; ?>/src/images/logo.png" alt="">
    </li>
    <li>
      <img src="<?= $home; ?>/src/images/no-logo.png" alt="">
    </li>
    <li>
      <img src="<?= $home; ?>/src/images/logo.png" alt="">
    </li>
    <li>
      <img src="<?= $home; ?>/src/images/no-logo.png" alt="">
    </li>
    <li>
      <img src="<?= $home; ?>/src/images/logo.png" alt="">
    </li>
    <li>
      <img src="<?= $home; ?>/src/images/no-logo.png" alt="">
    </li>
    <li>
      <img src="<?= $home; ?>/src/images/logo.png" alt="">
    </li>
    <li>
      <img src="<?= $home; ?>/src/images/no-logo.png" alt="">
    </li>
  </ul>
</section>

<section class="blog container">
  <h2 class="title">Blog</h2>

  <ul class="grid-blog">
    <li>
      <article class="top">
        <h3 class="title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo laborum consectetur repudiandae repellendus blibus rem.</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora sed modi eaque, molestiae similique adipisci commodi officiis, voluptatem odio inventore ullam voluptas vitae sint fuga quod aperiam esse repudiandae. Doloribus!</p>
        <a href="" class="read-more">Leia mais</a>
      </article>
      <span class="date">10/12/2021</span>
    </li>
    <li>
      <article class="top">
        <h3 class="title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo laborum consectetur repudiandae repellendus blibus rem.</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora sed modi eaque, molestiae similique adipisci commodi officiis, voluptatem odio inventore ullam voluptas vitae sint fuga quod aperiam esse repudiandae. Doloribus!</p>
        <a href="" class="read-more">Leia mais</a>
      </article>
      <span class="date">10/12/2021</span>
    </li>
  </ul>

  <a href="" class="btn-more">Veja mais</a>
</section>

<section class="contato">
  <h2 class="title">Contato</h2>

  <div class="wrap-content">
    <div class="information">
      <h3 class="title-section">Informações</h3>

      <ul>
        <li>
          <span class="icon"></span>
          <div class="text">
            <h4>Localização</h4>
            <p>
              <a href="">
                Rua Lorem ipsum dolor sit amet consectetur 145 | São Paulo - SP | 00000-000
              </a>
            </p>
          </div>
        </li>
        <li>
          <span class="icon"></span>
          <div class="text">
            <h4>Telefone</h4>
            <p>
              <a href="">
                +55 (11) 2368-3444
              </a>
            </p>
          </div>
        </li>
        <li>
          <span class="icon"></span>
          <div class="text">
            <h4>E-mail</h4>
            <p>
              <a href="mailto:lorem@lorem.com.br" target="_blank">
                lorem@lorem.com.br
              </a>
            </p>
          </div>
        </li>
      </ul>
    </div>
    <div class="form">
      <h3 class="title-section">Contato</h3>

      <?php echo do_shortcode('[wpforms id="12" title="false"]'); ?>
    </div>
  </div>
</section>

<section class="mapa-endereco">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.385166593419!2d-46.666904713902895!3d-23.554606306678146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce582d97462095%3A0x6032d751c2103c1a!2zUi4gZGEgQ29uc29sYcOnw6NvLCAyMzAyIC0gQ29uc29sYcOnw6NvLCBTw6NvIFBhdWxvIC0gU1AsIDAxMzAyLTAwMQ!5e0!3m2!1spt-BR!2sbr!4v1725751089396!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<div class="modal" id="myModal">
  <span class="close" onclick="closeModal()">&times;</span>
  <div class="modal-content">
    <div class="swiper-container">
      <div class="swiper-wrapper" id="modal-swiper-wrapper"></div>
    </div>
  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</div>

<?php get_footer(); ?>
