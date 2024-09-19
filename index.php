<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
<?php $home = get_template_directory_uri(); ?>

<section class="banner-top">
  <div class="container-banner">
    <?php
    // Query para pegar o post de configurações
    $config_args = array(
        'post_type' => 'config_secoes',
        'posts_per_page' => 1, // Pega apenas um post
    );
    $config_query = new WP_Query($config_args);
    
    $disable_banners = '0'; // Valor padrão
    if ($config_query->have_posts()) {
        while ($config_query->have_posts()) : $config_query->the_post();
            $disable_banners = get_post_meta(get_the_ID(), 'disable_banners', true);
        endwhile;
        wp_reset_postdata(); // Reseta a query
    }

    if ($disable_banners !== '1') {
        // Query para pegar os banners do tipo 'banner-topo'
        $args = array(
            'post_type' => 'banner-topo',
            'posts_per_page' => -1, // Pega todos os banners
        );
        $banners = new WP_Query($args);

        if ($banners->have_posts()) :
            while ($banners->have_posts()) : $banners->the_post(); ?>
                <div>
                    <?php
                    // Obter URLs das imagens
                    $banner_image_desktop = get_post_meta(get_the_ID(), 'banner_image_desktop', true);
                    $banner_image_mobile = get_post_meta(get_the_ID(), 'banner_image_mobile', true);
                    ?>
                    
                    <!-- Imagem para computador -->
                    <?php if ($banner_image_desktop) : ?>
                        <img 
                            src="<?php echo wp_get_attachment_url($banner_image_desktop); ?>" 
                            alt="<?php the_title(); ?>" 
                            class="banner-desktop"
                        >
                    <?php endif; ?>

                    <!-- Imagem para dispositivo móvel -->
                    <?php if ($banner_image_mobile) : ?>
                        <img 
                            src="<?php echo wp_get_attachment_url($banner_image_mobile); ?>" 
                            alt="<?php the_title(); ?>" 
                            class="banner-mobile"
                            style="display: none;"
                        >
                    <?php endif; ?>

                    <div class="info-text">
                        <div class="text">
                            <?php echo esc_html(get_post_meta(get_the_ID(), 'banner_description', true)); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata(); // Reseta a query
        else : ?>
            <div>
                <p>Nenhum banner encontrado.</p>
            </div>
        <?php endif;
    }
    ?>
  </div>
</section>

<script>
    // Script para alternar entre imagens de desktop e móvel
    function updateBannerVisibility() {
        var width = window.innerWidth;
        var desktopBanners = document.querySelectorAll('.banner-desktop');
        var mobileBanners = document.querySelectorAll('.banner-mobile');

        if (width < 768) { // Ajuste de acordo com seu design responsivo
            desktopBanners.forEach(function(banner) {
                banner.style.display = 'none';
            });
            mobileBanners.forEach(function(banner) {
                banner.style.display = 'block';
            });
        } else {
            desktopBanners.forEach(function(banner) {
                banner.style.display = 'block';
            });
            mobileBanners.forEach(function(banner) {
                banner.style.display = 'none';
            });
        }
    }

    window.onload = updateBannerVisibility;
    window.onresize = updateBannerVisibility;
</script>

<section class="section-topo">
  <ul class="carousel-top container">
    <?php
    // Query para pegar o post de configurações
    $config_args = array(
        'post_type' => 'config_secoes',
        'posts_per_page' => 1, // Pega apenas um post
    );
    $config_query = new WP_Query($config_args);
    
    $disable_sections = '0'; // Valor padrão
    if ($config_query->have_posts()) {
        while ($config_query->have_posts()) : $config_query->the_post();
            $disable_sections = get_post_meta(get_the_ID(), 'disable_sections', true);
        endwhile;
        wp_reset_postdata(); // Reseta a query
    }

    if ($disable_sections !== '1') {
        // Query para pegar os sections do tipo 'section-topo'
        $args = array(
            'post_type' => 'section-topo',
            'posts_per_page' => -1, // Pega todos os sections
        );
        $sections = new WP_Query($args);

        if ($sections->have_posts()) :
            while ($sections->have_posts()) : $sections->the_post(); ?>
                <li>
                    <?php
                    // Obter URLs das imagens e textos
                    $section_image = get_post_meta(get_the_ID(), 'section_image', true);
                    $section_text = get_post_meta(get_the_ID(), 'section_text', true);
                    ?>
                    <?php if ($section_image) : ?>
                        <img 
                            src="<?php echo wp_get_attachment_url($section_image); ?>" 
                            alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <span class="text"><?php echo esc_html($section_text); ?></span>
                </li>
            <?php endwhile;
            wp_reset_postdata(); // Reseta a query
        else : ?>
            <li>
                <span class="text">Nenhum item encontrado.</span>
            </li>
        <?php endif;
    }
    ?>
  </ul>
</section>

<section class="section-servicos container">
  <h2 class="title">Serviços</h2>

  <?php
  // Query para pegar o post de configurações
  $config_args = array(
      'post_type' => 'servicos',
      'posts_per_page' => 1, // Pega apenas um post
  );
  $config_query = new WP_Query($config_args);
  
  if ($config_query->have_posts()) {
      while ($config_query->have_posts()) : $config_query->the_post();
          $subtitulo = esc_html(get_post_meta(get_the_ID(), 'servico_subtitle', true));
          $paragrafo = esc_html(get_post_meta(get_the_ID(), 'servico_paragraph', true));
          $servicos = get_post_meta(get_the_ID(), 'servicos', true) ?: array();
      endwhile;
      wp_reset_postdata();
  }


  ?>
  
  <h3 class="sub-title"><?php echo $subtitulo; ?></h3>

  <div class="cards-services">
    
    <ul class="carousel-servicos">
      <?php
  
      if (!empty($servicos)) :
          foreach ($servicos as $servico): ?>
              <li>
                  <span class="name"><?php echo esc_html($servico['name']); ?></span>
                  <?php if (!empty($servico['image'])): ?>
                      <img src="<?php echo esc_url($servico['image']); ?>" alt="<?php echo esc_attr($servico['name']); ?>" class="icon">
                  <?php endif; ?>
              </li>
          <?php endforeach;
      else : ?>
          <li>
              <span class="text">Nenhum serviço encontrado.</span>
          </li>
      <?php endif; ?>
    </ul>

    <p><?php echo $paragrafo; ?></p>
  </div>
</section>

<section id="portfolio" class="portfolio container swiper">
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

  <a href="/portfolio" class="btn-more">Veja mais</a>
</section>

<section id="empresa" class="empresa">
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

<section id="equipe" class="equipe container">
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

<section id="clientes" class="clientes container">
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

<section id="blog" class="blog container">
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

  <a href="/blog" class="btn-more">Veja mais</a>
</section>

<section id="contato" class="contato">
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
