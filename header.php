<? php ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php $home = get_template_directory_uri(); ?>

  <!-- Adicionando cabeçalhos para prevenir cache -->
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />

  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?= $home; ?>/src/build/css/index.css?ver=1.6" type="text/css" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>

<body>
  <header class="header">
    <div class="container">
      <a href="/">
        <div class="logo">
          <?php
          // Supondo que você tenha o ID do post do tipo 'list-menu'
          $id_post = get_posts(array(
            'post_type' => 'list-menu',
            'numberposts' => 1
          ))[0]->ID;

          // Recupera o ID do logo a partir dos campos personalizados
          $itemLogo = get_post_meta($id_post, 'itemLogo', true);

          // Se houver um logo definido, exibe a imagem; caso contrário, exibe uma imagem padrão
          if ($itemLogo) {
            // Recupera a URL do anexo pelo ID
            $logo_url = wp_get_attachment_url($itemLogo);
            echo '<img src="' . esc_url($logo_url) . '" alt="Logo">';
          } else {
            echo '<img src="' . esc_url($home . '/src/images/logo-3.jpg') . '" alt="Logo Padrão">';
          }
          ?>
        </div>
      </a>
      <div class="menu">
        <ul>
          <?php
          // Recuperando os valores dos campos personalizados
          $itemServicesInativar = get_post_meta($id_post, 'itemServicesInativar', true);
          $itemPortfolioInativar = get_post_meta($id_post, 'itemPortfolioInativar', true);
          $itemEmpresaInativar = get_post_meta($id_post, 'itemEmpresaInativar', true);
          $itemBlogInativar = get_post_meta($id_post, 'itemBlogInativar', true);
          $itemContatoInativar = get_post_meta($id_post, 'itemContatoInativar', true);

          // Exibindo os itens se não estiverem inativados
          if ($itemServicesInativar !== '1') {
            echo '<li><a href="/#servicos">Serviços</a></li>';
          }
          if ($itemPortfolioInativar !== '1') {
            echo '<li><a href="/#portfolio">Portfólio</a></li>';
          }
          if ($itemEmpresaInativar !== '1') {
            echo '<li><a href="/#empresa">Empresa</a></li>';
          }
          if ($itemBlogInativar !== '1') {
            echo '<li><a href="/#blog">Blog</a></li>';
          }
          if ($itemContatoInativar !== '1') {
            echo '<li><a href="/#contato">Contato</a></li>';
          }
          ?>
        </ul>
      </div>
      <div class="redes-sociais">
        <ul>
          <?php
          // Recuperando os links das redes sociais a partir dos campos personalizados
          $itemFacebookLink = get_post_meta($id_post, 'itemFacebookLink', true);
          $itemInstagramLink = get_post_meta($id_post, 'itemInstagramLink', true);
          $itemLinkedInLink = get_post_meta($id_post, 'itemLinkedInLink', true);
          $itemWhatsAppLink = get_post_meta($id_post, 'itemWhatsAppLink', true);

          // Verificando se os links das redes sociais estão ativados
          $itemFacebookLinkInativar = get_post_meta($id_post, 'itemFacebookInativar', true);
          $itemInstagramLinkInativar = get_post_meta($id_post, 'itemInstagramInativar', true);
          $itemLinkedInLinkInativar = get_post_meta($id_post, 'itemInativaredInInativar', true);
          $itemWhatsAppLinkInativar = get_post_meta($id_post, 'itemWhatsAppInativar', true);

          if ($itemFacebookLinkInativar !== '1') {
            echo '<li class="face"><a href="' . esc_url($itemFacebookLink) . '" target="_blank"><img src="' . esc_url($home . '/src/images/facebook.svg') . '" title="Facebook" alt="Facebook"></a></li>';
          }
          if ($itemInstagramLinkInativar !== '1') {
            echo '<li class="insta"><a href="' . esc_url($itemInstagramLink) . '" target="_blank"><img src="' . esc_url($home . '/src/images/instagram.svg') . '" title="Instagram" alt="Instagram"></a></li>';
          }
          if ($itemLinkedInLinkInativar !== '1') {
            echo '<li class="linkedin"><a href="' . esc_url($itemLinkedInLink) . '" target="_blank"><img src="' . esc_url($home . '/src/images/linkedin.svg') . '" title="LinkedIn" alt="LinkedIn"></a></li>';
          }
          if ($itemWhatsAppLinkInativar !== '1') {
            echo '<li class="whats"><a href="' . esc_url($itemWhatsAppLink) . '" target="_blank"><img src="' . esc_url($home . '/src/images/whatsapp.svg') . '" title="WhatsApp" alt="WhatsApp"></a></li>';
          }
          ?>
        </ul>
      </div>
      <div class="menu-mob">
        <img src="<?= esc_url($home . '/src/images/bars.svg'); ?>" alt="Menu mobile" class="icon">
      </div>

      <div class="content-menu">
        <div class="close">
          <img src="<?= esc_url($home . '/src/images/times.svg?v=1'); ?>" alt="Fechar">
        </div>
        <div class="menu">
          <ul>
            <?php
            // Repetindo a lógica dos itens do menu
            if ($itemServicesInativar !== '1') {
              echo '<li><a href="/#servicos">Serviços</a></li>';
            }
            if ($itemPortfolioInativar !== '1') {
              echo '<li><a href="/#portfolio">Portfólio</a></li>';
            }
            if ($itemEmpresaInativar !== '1') {
              echo '<li><a href="/#empresa">Empresa</a></li>';
            }
            if ($itemBlogInativar !== '1') {
              echo '<li><a href="/#blog">Blog</a></li>';
            }
            if ($itemContatoInativar !== '1') {
              echo '<li><a href="/#contato">Contato</a></li>';
            }
            ?>
          </ul>
        </div>
        <div class="redes-sociais">
          <ul>
            <?php
            // Repetindo a lógica dos links das redes sociais no menu móvel
            if ($itemFacebookLinkInativar !== '1') {
              echo '<li class="face"><a href="' . esc_url($itemFacebookLink) . '" target="_blank"><img src="' . esc_url($home . '/src/images/facebook.svg') . '" title="Facebook" alt="Facebook"></a></li>';
            }
            if ($itemInstagramLinkInativar !== '1') {
              echo '<li class="insta"><a href="' . esc_url($itemInstagramLink) . '" target="_blank"><img src="' . esc_url($home . '/src/images/instagram.svg') . '" title="Instagram" alt="Instagram"></a></li>';
            }
            if ($itemLinkedInLinkInativar !== '1') {
              echo '<li class="linkedin"><a href="' . esc_url($itemLinkedInLink) . '" target="_blank"><img src="' . esc_url($home . '/src/images/linkedin.svg') . '" title="LinkedIn" alt="LinkedIn"></a></li>';
            }
            if ($itemWhatsAppLinkInativar !== '1') {
              echo '<li class="whats"><a href="' . esc_url($itemWhatsAppLink) . '" target="_blank"><img src="' . esc_url($home . '/src/images/whatsapp.svg') . '" title="WhatsApp" alt="WhatsApp"></a></li>';
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </header>