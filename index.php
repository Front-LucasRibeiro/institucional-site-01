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
      <img src="<?php echo wp_get_attachment_url($banner_image_desktop); ?>" alt="<?php the_title(); ?>"
        class="banner-desktop">
      <?php endif; ?>

      <!-- Imagem para dispositivo móvel -->
      <?php if ($banner_image_mobile) : ?>
      <img src="<?php echo wp_get_attachment_url($banner_image_mobile); ?>" alt="<?php the_title(); ?>"
        class="banner-mobile" style="display: none;">
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
      <img src="<?php echo wp_get_attachment_url($section_image); ?>" alt="<?php the_title(); ?>">
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

<section id="servicos" class="section-servicos servicos container">
  <?php
  // Query para pegar o post de configurações
  $config_args = array(
    'post_type' => 'config_secoes',
    'posts_per_page' => 1, // Pega apenas um post
  );
  $config_query = new WP_Query($config_args);

  $disable_services = '0'; // Valor padrão
  if ($config_query->have_posts()) {
    while ($config_query->have_posts()) : $config_query->the_post();
      $disable_services = get_post_meta(get_the_ID(), 'disable_services', true);
    endwhile;
    wp_reset_postdata();
  }

  // Verifica se a seção de serviços está desativada
  if ($disable_services !== '1') {
    // Query para pegar os serviços
    $args = array(
      'post_type' => 'servicos',
      'posts_per_page' => 6, // Pega todos os serviços
    );
    $services_query = new WP_Query($args);

    if ($services_query->have_posts()) : ?>
  <h2 class="title">Serviços</h2>
  <h3 class="sub-title">
    <?php
        // Coloca o subtítulo da primeira postagem de serviços
        $first_service = $services_query->posts[0]; // Pega o primeiro serviço
        $subtitulo = esc_html(get_post_meta($first_service->ID, 'servico_subtitle', true));
        $servico_paragraph = esc_html(get_post_meta($first_service->ID, 'servico_paragraph', true));
        echo $subtitulo;
        ?>
  </h3>

  <div class="cards-services">
    <ul class="carousel-servicos">
      <?php
          while ($services_query->have_posts()) : $services_query->the_post();
            // Obter dados do serviço
            $servicos = get_post_meta(get_the_ID(), 'servicos', true) ?: array(); // Corrigido

            // Verifica se há serviços
            if (!empty($servicos)) {
              foreach ($servicos as $servico) {
                // Armazena o nome e a imagem do serviço
                $service_image = !empty($servico['image']) ? $servico['image'] : '';
                $service_name = !empty($servico['name']) ? $servico['name'] : '';

                // Exibição do serviço
          ?>
      <li>
        <?php if (!empty($service_name)): ?>
        <span class="name"><?php echo esc_html($service_name); ?></span>
        <?php endif; ?>
        <?php if (!empty($service_image)): ?>
        <img src="<?php echo esc_url($service_image); ?>" alt="<?php echo esc_attr($service_name); ?>" class="icon">
        <?php endif; ?>
      </li>
      <?php
              }
            }
          endwhile;
          ?>
    </ul>

    <p>
      <?php
          // Coloca o parágrafo da primeira postagem de serviços
          echo $servico_paragraph;
          ?>
    </p>
  </div>
  <?php else : ?>
  <div class="cards-services">
    <p>Nenhum serviço encontrado.</p>
  </div>
  <?php endif;

    wp_reset_postdata(); // Reseta a query dos serviços
  }
  ?>
</section>

<section id="portfolio" class="portfolio container swiper">
  <?php
  // Query para pegar o post de configurações
  $config_args = array(
    'post_type' => 'config_secoes',
    'posts_per_page' => 1, // Pega apenas um post
  );
  $config_query = new WP_Query($config_args);

  $disable_portfolio = '0'; // Valor padrão
  if ($config_query->have_posts()) {
    while ($config_query->have_posts()) : $config_query->the_post();
      $disable_portfolio = get_post_meta(get_the_ID(), 'disable_portfolio', true);
    endwhile;
    wp_reset_postdata();
  }

  // Verifica se a seção de portfólio está desativada
  if ($disable_portfolio !== '1') {
    // Query para buscar os posts do tipo "list-portfolio"
    $args = array(
      'post_type' => 'list-portfolio',
      'posts_per_page' => 6, // Limita a 6 posts
    );
    $portfolio_query = new WP_Query($args);

    if ($portfolio_query->have_posts()) : ?>
  <h2 class="title">Portfólio</h2>

  <ul class="cards-portfolio swiper-wrapper">
    <?php
        while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
          $portfolio_description = get_post_meta(get_the_ID(), 'portfolio_description', true);
        ?>
    <li class="swiper-slide card" onclick="openModal(this)">
      <div class="image-container">
        <?php if (has_post_thumbnail()) : ?>
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        <?php else : ?>
        <img src="<?php echo esc_url(get_template_directory_uri() . '/path/to/default-image.jpg'); ?>"
          alt="Imagem padrão">
        <?php endif; ?>
      </div>
      <span class="legend"><?php echo esc_html($portfolio_description); ?></span>
    </li>
    <?php endwhile; ?>
  </ul>

  <a href="/portfolio" class="btn-more">Veja mais</a>
  <?php else : ?>
  <li class="swiper-slide card">Nenhum portfólio encontrado.</li>
  <?php endif;

    wp_reset_postdata(); // Reseta a consulta
  }
  ?>
</section>

<section id="empresa" class="empresa">
  <?php
  // Query para pegar o post de configurações
  $config_args = array(
    'post_type' => 'config_secoes',
    'posts_per_page' => 1, // Pega apenas um post
  );
  $config_query = new WP_Query($config_args);

  $disable_empresa = '0'; // Valor padrão
  if ($config_query->have_posts()) {
    while ($config_query->have_posts()) : $config_query->the_post();
      $disable_empresa = get_post_meta(get_the_ID(), 'disable_empresa', true);
    endwhile;
    wp_reset_postdata();
  }

  // Verifica se a seção de empresa está desativada
  if ($disable_empresa !== '1') :
    // Query para pegar o post da empresa
    $empresa_args = array(
      'post_type' => 'empresa',
      'posts_per_page' => 1, // Pega apenas um post
    );
    $empresa_query = new WP_Query($empresa_args);

    if ($empresa_query->have_posts()) :
      while ($empresa_query->have_posts()) : $empresa_query->the_post();
        $missao = get_post_meta(get_the_ID(), 'missao', true);
        $visao = get_post_meta(get_the_ID(), 'visao', true);
        $valores = get_post_meta(get_the_ID(), 'valores', true);
  ?>
  <h2 class="title">Empresa</h2>
  <div class="container">
    <div class="wrap">
      <div class="card">
        <img src="<?= esc_url($home); ?>/src/images/bullseye-arrow.svg" alt="Missão">
        <h3>Missão:</h3>
        <p><?php echo esc_html($missao); ?></p>
      </div>
      <div class="card">
        <img src="<?= esc_url($home); ?>/src/images/arrow-square-up.svg" alt="Visão">
        <h3>Visão:</h3>
        <p><?php echo esc_html($visao); ?></p>
      </div>
      <div class="card">
        <img src="<?= esc_url($home); ?>/src/images/handshake.svg" alt="Valores">
        <h3>Valores:</h3>
        <p><?php echo esc_html($valores); ?></p>
      </div>
    </div>
  </div>
  <?php endwhile;
      wp_reset_postdata(); // Reseta a consulta da empresa
    endif;
  endif; ?>
</section>

<section id="equipe" class="equipe container">
  <?php
  // Query para pegar o post de configurações
  $config_args = array(
    'post_type' => 'config_secoes',
    'posts_per_page' => 1, // Pega apenas um post
  );
  $config_query = new WP_Query($config_args);

  $disable_equipe = '0'; // Valor padrão
  if ($config_query->have_posts()) {
    while ($config_query->have_posts()) : $config_query->the_post();
      $disable_equipe = get_post_meta(get_the_ID(), 'disable_equipe', true);
    endwhile;
    wp_reset_postdata();
  }

  // Verifica se a seção de equipe está desativada
  if ($disable_equipe !== '1') :
    // Query para pegar os posts da equipe
    $equipe_args = array(
      'post_type' => 'equipe',
      'posts_per_page' => -1, // Pega todos os posts
    );
    $equipe_query = new WP_Query($equipe_args);

    if ($equipe_query->have_posts()) : ?>
  <h2 class="title">Equipe</h2>
  <ul class="equipe-grid">
    <?php while ($equipe_query->have_posts()) : $equipe_query->the_post();
          $foto = get_post_meta(get_the_ID(), 'foto', true);
          $cargo = get_post_meta(get_the_ID(), 'cargo', true);
          $descricao = get_post_meta(get_the_ID(), 'descricao', true);
        ?>
    <li class="equipe-card">
      <div class="col-left">
        <img src="<?php echo esc_url($foto); ?>" alt="<?php the_title(); ?>" class="photo">
        <span class="name"><?php the_title(); ?></span>
        <span class="cargo"><?php echo esc_html($cargo); ?></span>
      </div>
      <div class="col-right">
        <span class="description"><?php echo esc_html($descricao); ?></span>
      </div>
    </li>
    <?php endwhile; ?>
  </ul>
  <?php else : ?>
  <p>Nenhum membro da equipe encontrado.</p>
  <?php endif;

    wp_reset_postdata(); // Reseta a consulta da equipe
  endif; ?>
</section>

<section id="clientes" class="clientes container">
  <?php
  // Query para pegar o post de configurações
  $config_args = array(
    'post_type' => 'config_secoes',
    'posts_per_page' => 1, // Pega apenas um post
  );
  $config_query = new WP_Query($config_args);

  $disable_clientes = '0'; // Valor padrão
  if ($config_query->have_posts()) {
    while ($config_query->have_posts()) : $config_query->the_post();
      $disable_clientes = get_post_meta(get_the_ID(), 'disable_clientes', true);
    endwhile;
    wp_reset_postdata();
  }

  // Query para pegar os clientes
  $clientes_query = new WP_Query(array(
    'post_type' => 'clientes',
    'posts_per_page' => -1 // Para exibir todos os clientes
  ));

  // Verifica se não há clientes e desativa a seção automaticamente
  if (!$clientes_query->have_posts()) {
    $disable_clientes = '1'; // Desativa a seção se não houver clientes
  }

  // Exibe a seção de clientes se não estiver desativada
  if ($disable_clientes !== '1') {
  ?>
  <h2 class="title">Clientes</h2>

  <ul class="carousel-clientes">
    <?php
      if ($clientes_query->have_posts()) {
        while ($clientes_query->have_posts()) : $clientes_query->the_post();
          $logo = get_post_meta(get_the_ID(), 'logo', true);
      ?>
    <li>
      <img src="<?php echo esc_url($logo); ?>" alt="<?php the_title(); ?>">
    </li>
    <?php
        endwhile;
        wp_reset_postdata();
      }
      ?>
  </ul>
  <?php } ?>
</section>

<section id="blog" class="blog container">
  <?php
  // Query para pegar o post de configurações
  $config_args = array(
    'post_type' => 'config_secoes',
    'posts_per_page' => 1, // Pega apenas um post
  );
  $config_query = new WP_Query($config_args);

  $disable_blog = '0'; // Valor padrão
  if ($config_query->have_posts()) {
    while ($config_query->have_posts()) : $config_query->the_post();
      $disable_blog = get_post_meta(get_the_ID(), 'disable_blog', true);
    endwhile;
    wp_reset_postdata();
  }

  // Query para pegar os posts do blog
  $blog_args = array(
    'post_type' => 'list-blog',
    'posts_per_page' => 2, // Limitar a 2 posts
  );
  $blog_query = new WP_Query($blog_args);

  // Verifica se não há posts e desativa a seção automaticamente
  if (!$blog_query->have_posts()) {
    $disable_blog = '1'; // Desativa a seção se não houver posts
  }

  // Exibe a seção de blog se não estiver desativada
  if ($disable_blog !== '1') {
  ?>
  <h2 class="title">Blog</h2>

  <ul class="grid-blog">
    <?php
      while ($blog_query->have_posts()) : $blog_query->the_post();
        $description = get_post_meta(get_the_ID(), 'blog_description', true);
        $blog_date = get_post_meta(get_the_ID(), 'blog_date', true);
      ?>
    <li>
      <article class="top">
        <h3 class="title"><?php the_title(); ?></h3>
        <p><?php echo esc_html($description); ?></p>
        <a href="<?php the_permalink(); ?>" class="read-more">Leia mais</a>
      </article>
      <span class="date"><?php echo esc_html($blog_date); ?></span>
    </li>
    <?php endwhile; ?>
  </ul>
  <?php } ?>
  <a href="/blog" class="btn-more">Veja mais</a>
</section>

<section id="contato" class="contato">
  <?php
  // Query para pegar o post de configurações
  $config_args = array(
    'post_type' => 'config_secoes',
    'posts_per_page' => 1, // Pega apenas um post
  );
  $config_query = new WP_Query($config_args);

  $disable_contato = '0'; // Valor padrão
  if ($config_query->have_posts()) {
    while ($config_query->have_posts()) : $config_query->the_post();
      $disable_contato = get_post_meta(get_the_ID(), 'disable_contato', true);
    endwhile;
    wp_reset_postdata();
  }

  // Consulta para pegar o post de configurações de contato
  $contato_args = array(
    'post_type' => 'config_contato',
    'posts_per_page' => 1, // Pega apenas um post
  );
  $contato_query = new WP_Query($contato_args);

  // Verifica se não há posts e desativa a seção automaticamente
  if (!$contato_query->have_posts()) {
    $disable_contato = '1'; // Desativa a seção se não houver posts
  }

  // Verifica se há post de configurações de contato
  if ($contato_query->have_posts()) {
    while ($contato_query->have_posts()) : $contato_query->the_post();
      $localizacao = get_post_meta(get_the_ID(), 'contato_localizacao', true);
      $telefone = get_post_meta(get_the_ID(), 'contato_telefone', true);
      $email = get_post_meta(get_the_ID(), 'contato_email', true);
    endwhile;
    wp_reset_postdata();

    // Verifica se a seção de contato está desativada
    if ($disable_contato !== '1') {
  ?>
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
              <?php echo esc_html($localizacao); ?>
            </p>
          </div>
        </li>
        <li>
          <span class="icon"></span>
          <div class="text">
            <h4>Telefone</h4>
            <p>
              <?php echo esc_html($telefone); ?>
            </p>
          </div>
        </li>
        <li>
          <span class="icon"></span>
          <div class="text">
            <h4>E-mail</h4>
            <p>
              <a href="mailto:<?php echo esc_html($email); ?>" target="_blank">
                <?php echo esc_html($email); ?>
              </a>
            </p>
          </div>
        </li>
      </ul>
    </div>
    <div class="form">
      <h3 class="title-section">Contato</h3>

      <?php echo do_shortcode('[wpforms id="137" title="false"]'); ?>
    </div>
  </div>
  <?php
    } // Fim da verificação de desativação
  } else {
    echo '<p>Configurações de contato não encontradas.</p>';
  }
  ?>
</section>

<section class="mapa-endereco">
  <?php
  // Consulta para pegar o post de configurações
  $config_args = array(
    'post_type' => 'config_secoes',
    'posts_per_page' => 1, // Pega apenas um post
  );
  $config_query = new WP_Query($config_args);

  $disable_mapa = '0'; // Valor padrão
  if ($config_query->have_posts()) {
    while ($config_query->have_posts()) : $config_query->the_post();
      $disable_mapa = get_post_meta(get_the_ID(), 'disable_mapa', true);
    endwhile;
    wp_reset_postdata();
  }

  // Consulta para pegar o post de configurações de mapa
  $mapa_args = array(
    'post_type' => 'config_mapa',
    'posts_per_page' => 1, // Pega apenas um post
  );
  $mapa_query = new WP_Query($mapa_args);

  // Verifica se há post de configurações de mapa
  if ($mapa_query->have_posts()) {
    while ($mapa_query->have_posts()) : $mapa_query->the_post();
      $map_link = get_post_meta(get_the_ID(), 'map_iframe', true); // Corrigido para 'map_iframe'
    endwhile;
    wp_reset_postdata();

    // Verifica se a seção de mapa está desativada e se o link não está vazio
    if ($disable_mapa !== '1' && !empty($map_link)) {
      echo $map_link; // Exibe o iframe diretamente
    }
  }
  ?>
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