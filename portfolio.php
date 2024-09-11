<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

<div class="portfolio-container">
    <h1>Meu Portfólio</h1>
    <div class="portfolio-grid">
        <?php
        $args = array(
            'post_type' => 'list-portfolio',
            'posts_per_page' => -1, // Exibe todos os projetos
        );
        $portfolio_query = new WP_Query($args);

        if ($portfolio_query->have_posts()) :
            while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
                <div class="portfolio-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('medium');
                        } ?>
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_excerpt(); ?></p>
                    </a>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else :
            echo '<p>Nenhum projeto encontrado.</p>';
        endif; ?>
    </div>
</div>

<?php get_footer(); ?>