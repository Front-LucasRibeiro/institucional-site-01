<?php
/*
Template Name: Portfolio
*/

get_header(); ?>

<h2 class="title-page-portfolio">Portfólio</h2>

<section class="portfolio portfolio-page container swiper">
    <ul class="cards-portfolio swiper-wrapper">
        <?php
        // Obtendo o número da página atual
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        // Argumentos da consulta
        $args = array(
            'post_type' => 'list-portfolio',
            'posts_per_page' => 9, // Exibe 9 projetos por página
            'paged' => $paged, // Adiciona a paginação
        );
        $portfolio_query = new WP_Query($args);

        if ($portfolio_query->have_posts()) :
            while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
                <li class="swiper-slide card" onclick="openModal(this)">
                    <div class="image-container">
                        <?php if (has_post_thumbnail()) {
                            echo get_the_post_thumbnail(get_the_ID(), 'full'); // Exibe a imagem original
                        } ?>
                    </div>
                    <?php 
                    $text_legend = get_post_meta(get_the_ID(), 'portfolio_description', true); 
                    if ($text_legend) {
                        echo '<span class="legend">' . esc_html($text_legend) . '</span>';
                    }
                    ?>
                </li>
            <?php endwhile;
            wp_reset_postdata();
        else :
            echo '<li>Nenhum projeto encontrado.</li>';
        endif; ?>
    </ul>
</section>

<div class="pagination">
    <?php
    $big = 999999999; // Um número grande para substituir na string de paginação
    $current_page = max(1, get_query_var('paged'));
    $total_pages = $portfolio_query->max_num_pages;

    // Calcula o número de páginas a serem exibidas
    $page_links = array();

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i <= 2 || $i == $current_page || $i == $total_pages || ($i >= $current_page - 1 && $i <= $current_page + 1)) {
            $page_links[] = $i; // Adiciona o número da página ao array
        }
    }

    // Exibe os links de paginação
    foreach ($page_links as $page) {
        if ($page == $current_page) {
            echo '<span class="current">' . $page . '</span>'; // Página atual
        } else {
            echo '<a href="' . esc_url(get_pagenum_link($page)) . '">' . $page . '</a>'; // Link para a página
        }
    }

    // Exibe o botão "Próximo" se não estiver na última página
    if ($current_page < $total_pages) {
        echo '<a href="' . esc_url(get_pagenum_link($current_page + 1)) . '">Próximo</a>';
    }
    ?>
</div>

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