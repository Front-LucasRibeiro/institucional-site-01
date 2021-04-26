<?php
$css_escolhido = 'page';
require_once('header.php');
?>

<?php the_title(); ?>

<section class="box-ultimas-noticias">
  <div class="container">
    <h2 class="section-title">
      <span class="title-desk">
        <?= get_post_meta( 100, 'title-ultimas-noticias', true) ?>
      </span>
      <span class="title-mob">
        <?= get_post_meta( 103, 'title-ultimas-noticias-mob', true) ?>
      </span>
      <span class="separator"></span>
      <span class="veja-mais">
        <a href="<?= get_post_meta( 104, 'link-veja-mais', true) ?>">Veja mais</a>
      </span>
    </h2>

    <ul class="list-posts">
      <?php			
				$args = array( 
					'posts_per_page' => 3,
					'order' => 'DESC', //Ou ASC
					'orderby' => 'date',
					'hide_empty' => true,
					'author_name' => 'admin'
				);
				
				$loop = new WP_Query( $args );
				if( $loop->have_posts() ) { 
					while( $loop-> have_posts()) {
						$loop-> the_post();
						$post = get_post();
						$id_post = $post->ID;
			?>

      <li class="list-post-item">
        <a href="<?php the_permalink() ?>">
          <div class="image-desk">
            <?php the_post_thumbnail('banner-370x370');?>
          </div>
          <div class="image-mob">
            <?php the_post_thumbnail('banner-145x160');?>
          </div>
        </a>

        <div class="box-category">
          <?php the_category(); ?>
        </div>

        <div class="box-title">
          <a href="<?php the_permalink() ?>">
            <h3 class="title-post">
              <?php the_title(); ?>
            </h3>
          </a>
        </div>
      </li>

      <?php
					wp_reset_query(); 
					wp_reset_postdata();
						}
					}
				?>
    </ul>
  </div>
</section>

<?php get_footer(); ?>