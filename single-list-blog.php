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
            <div class="post-date"><?php echo get_the_date(); ?></div>
            <div class="post-thumbnail">
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                } ?>
            </div>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
            <div class="post-meta">
                <h3>Descrição:</h3>
                <p><?php echo get_post_meta(get_the_ID(), 'blog_description', true); ?></p>
                <h3>Leia Mais:</h3>
                <p><a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'blog_read_more', true)); ?>">Clique aqui</a></p>
            </div>
        <?php endwhile;
    else :
        echo '<p>Nenhum post encontrado.</p>';
    endif; ?>
</div>

<?php get_footer(); ?>