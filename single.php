<?php
$css_escolhido = 'single';
$has_reset_css = false;
require_once('header.php');
?>

<div id="single-post" class="">
	<div class="container">

		<div class="box-wrapper-adsense topo">
			<div class="adsence topo">
				<?= get_post_meta( 240, 'banner-adsense-post-topo', true) ?>
			</div>
		</div>

		<?php while ( have_posts() ) : the_post(); 
			if( class_exists('Dynamic_Featured_Image') ) {
				global $dynamic_featured_image;
				$featured_images = $dynamic_featured_image->get_featured_images();
			}
		?>

            <?php the_title( '<h1 class="title">', '</h1>' ); ?>

            <div class="info-post">
                <div class="image"><?=get_avatar(get_the_author_meta('ID'))?></div>						

                <span class="autor">
									<?php 
										$user_name = get_the_author(); 
										$userName =  preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$user_name);
										
										$autor_formatted = str_replace ( " ", "-", strtolower($userName) );
									?>

									<a href="<?= get_home_url().'/'.$autor_formatted; ?>">
										<?php the_author() ?>
									</a>
									</span><span>&nbsp;-
								</span>
                <span class="date"><?=get_the_date('d '.'\d\e'.' F '.'Y '.'\á\s'.' H'.'\h'.'i');?></span>
            </div>

							<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
                <div class="thumb">
                    <?php the_post_thumbnail('banner-post-770x400');?>

										<div class="box-category">
											<?php the_category(); ?>
										</div>
                </div>

								<div class="box-content">
									<?php the_content(); ?>

									<div class="wrapper-tags">
										
										<p class="title"><strong>Tags</strong></p>
											
										<div class="list-tags">
											<?php
												$tags_list = get_the_tag_list();
												echo $tags_list;
											?>
										</div>

									</div>
								</div>
							</article>

            <aside>
								<div class="box-ultimas-noticias">
									<div class="title">
										<span>Últimas notícias</span>
										<div class="sep"></div>
									</div>
									<?php  include (TEMPLATEPATH . '/inc/sidebar-lastposts.php'); ?>
								</div>

                <div class="banner-destaque">									
									<?php
										foreach ($featured_images as $image) {
									?>

										<img src="<?= $image['full']; ?>">

									<?php
										}
									?>
								</div>
								
                <div class="adsence">
									<?= get_post_meta( 241, 'banner-adsense-post-lateral', true) ?>
								</div>
            </aside>

		<?php endwhile; // end of the loop. ?>

        <div class="related-posts">

			<div class="title">
				<span>Notícias relacionadas</span>
				<div class="sep"></div>
			</div>
					<ul class="box-list-post">
            <?php
            $categories = get_the_category();
            $category_id = $categories[0]->cat_ID;
            $args = array( 
                'posts_per_page' => 3,
                'order' => 'DESC',
                'cat' => $category_id,
            );
            
            $loop = new WP_Query( $args );
            if( $loop->have_posts() ) { 
                while( $loop-> have_posts()) {
                    $loop-> the_post();
										$post = get_post();
										$autor_id = $post->post_author;
            ?>

                <li class="list-post-item">
							<a href="<?php the_permalink() ?>">
								<div class="image-desk">
									<?php the_post_thumbnail('banner-370x260');?>
								</div>
							</a>
							
							<div class="box-title">
								<a href="<?php the_permalink() ?>">
									<h3 class="title-post">
										<?php the_title(); ?>
									</h3>
			
									<div class="data">
										<?= get_the_date('d \d\e F Y'); ?>
									</div>
								</a>
							</div>

							<div class="box-bottom">
								<div class="box-autor">
									<?php 
										$user_info = get_userdata($autor_id);
										$user_name = $user_info->display_name;
										$user_email = $user_info->user_email;
									?>

									<div class="box-avatar">
										<?= get_avatar($user_email, 24);?>
									</div>
									
									<?php
										$autor_formatted = str_replace ( " ", "-", strtolower($user_name) );
									?>

									<?php
										$userName =  preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$user_name);
											
										$autor_formatted = str_replace ( " ", "-", strtolower($userName) );
									?>

									<p class="nome-autor">
										<a href="<?= get_home_url().'/'.$autor_formatted; ?>">
											<?php the_author(); ?>
										</a>
									</p>
								</div>
								<a href="<?php the_permalink() ?>" class="ler-tudo"><?= get_post_meta( 141, 'texto-ler-mais-colunas', true) ?></a>
							</div>

							<?php edit_post_link(); ?>
				</li>
                
            <?php } } ?>

        </ul>
        </div>

	</div>
</div><!-- #primary -->



<?php get_footer(); ?>