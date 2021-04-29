<?php
$css_escolhido = 'single';
require_once('header.php');
?>

<div id="single-post" class="">
	<div class="container">

        <div class="adsence"></div>

		<?php while ( have_posts() ) : the_post(); ?>

            <?php the_title( '<h1 class="title">', '</h1>' ); ?>

            <div class="info-post">
                <div class="image"><?=get_avatar(get_the_author_meta('ID'))?></div>
                <?php the_author() ?>
                <span class="step">-</span>
                <span class="date"><?=get_the_date('d '.'\d\e'.' F '.'Y '.'\á\s'.' H'.'\h'.'i');?></span>
            </div>

			<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
                <div class="thumb">
                    <?php the_post_thumbnail();?>
                </div>

                <?php the_content(); ?>
			</article>

            <aside>
                <div class="title"></div>
                <?php  include (TEMPLATEPATH . '/inc/sidebar-lastposts.php'); ?>
                <div class="banner-destaque"></div>
                <div class="adsence"></div>
            </aside>

		<?php endwhile; // end of the loop. ?>
        <?php edit_post_link(); ?>
	</div>
</div><!-- #primary -->



<?php get_footer(); ?>