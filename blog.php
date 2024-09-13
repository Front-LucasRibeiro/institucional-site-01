<?php
/*
Template Name: Blog
*/

get_header(); ?>

<h2 class="title-page-portfolio">Blog</h2>

<section class="portfolio portfolio-page container swiper">
    <ul class="cards-portfolio swiper-wrapper">
        <?php
        // Obtendo o número da página atual
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        // Argumentos da consulta
        $args = array(
            'post_type' => 'list-blog',
            'posts_per_page' => 9, // Exibe 9 posts por página
            'paged' => $paged, // Adiciona a paginação
        );
        $blog_query = new WP_Query($args);

        if ($blog_query->have_posts()) :
            while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                <li class="swiper-slide card blog-card">
                    <a href="<?php the_permalink(); ?>">
                      <div class="image-container">
                          <?php  
                              the_post_thumbnail('Blog - (Banner do topo) - 1100x418');
                           ?>
                      </div>
                    </a>
                    <h3 class="portfolio-title"><?php the_title(); ?></h3>
                    <p class="portfolio-description"><?php echo get_post_meta(get_the_ID(), 'blog_description', true); ?></p>
                    <a href="<?php the_permalink(); ?>" class="read-more">Leia Mais</a>
                </li>
            <?php endwhile;
            wp_reset_postdata();
        else :
            echo '<li>Nenhum post encontrado.</li>';
        endif; ?>
    </ul>
</section>

<div class="pagination">
    <?php
    $big = 999999999; // Um número grande para substituir na string de paginação
    $current_page = max(1, get_query_var('paged'));
    $total_pages = $blog_query->max_num_pages;

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

<?php get_footer(); ?>