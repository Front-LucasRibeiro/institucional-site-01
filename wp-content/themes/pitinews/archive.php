<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Seri.e Design
 */

get_header(); ?>

<?php
	global $sa_options;
	$sa_settings = get_option( 'sa_options', $sa_options );
?>

<div id="blog" class="content-page category-page">
	<div class="container">
	<?php if (function_exists('bcn_display')) : ?>
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php bcn_display(); ?>
		</div>
	<?php endif; ?>
		<article>

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<div class="post-category">
						<div class="thumb">
							<?php
							if (has_post_thumbnail( $post->ID ) ){
								the_post_thumbnail('thumb-category');
							} else { ?>
								<img src="<?=get_template_directory_uri()?>/assets/images/no-picture.png">
							<?php } ?>
						</div>
						<a href="<?php the_permalink(); ?>">
							<?php
							$limite = '150';
							$descricao = get_the_content();
							$descricao = strip_tags($descricao); 
							$descricao = mb_substr($descricao,0,$limite);
							echo $descricao."..."; ?>
						</a>
					</div>

				<?php endwhile; ?>
				<div class="clear"></div>
			<?php endif; ?>
		</article>

		<aside>
			<div class="title"><?=$sa_settings['title_news'];?> <span><?=$sa_settings['second_title'];?></span></div>
			<?php dynamic_sidebar('newsletter'); ?>
			<div class="title"><?=$sa_settings['title_sociais'];?></div>
			<a href="<?=$sa_settings['link_face'];?>" target="_blank" class="icon icon-1"><i class="fab fa-facebook-square"></i></a>
			<p class="txt"><?=$sa_settings['txt_facebook'];?></p>
			<a href="<?=$sa_settings['link_insta'];?>" target="_blank" class="icon icon-2"><i class="fab fa-instagram"></i></a>
			<p class="txt"><?=$sa_settings['txt_insta'];?></p>

		</aside>
		<div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>
