<?php
/*
Template Name: Blog Post
*/

get_header(); ?>



<div class="blog-post container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <h2 class="post-title"><?php the_title(); ?></h2>
            <div class="post-date">
                <?php
                    $date_string = get_post_meta(get_the_ID(), 'blog_date', true);
                    if ($date_string) {
                        // Define a localidade para português
                        setlocale(LC_TIME, 'pt_BR.UTF-8'); // Certifique-se de que essa localidade está disponível no servidor

                        // Cria um objeto DateTime
                        $date = DateTime::createFromFormat('Y-m-d', $date_string);
                        
                        // Formata a data
                        echo strftime('%e de %B de %Y', $date->getTimestamp());
                    }
                ?>
            </div>
            <div class="post-thumbnail">
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                } ?>
            </div>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        <?php endwhile;
    else :
        echo '<p>Nenhum post encontrado.</p>';
    endif; ?>
</div>

<?php get_footer(); ?>