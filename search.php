<?php
	$css_escolhido = 'search';
	$has_reset_css = true;
	require_once('header.php');
?>

<?php
	global $sa_options;
	$sa_settings = get_option( 'sa_options', $sa_options );
?>


<section class="search">
	<div class="container">
		<?php			
			$args_search = array( 
				's' => $_GET["s"],
				'posts_per_page' => 6,
				'category_name' => 'filmes,series,games,animes,colunas,criticas,diversidade,podcast,piticas,piticast,pitiplay'
			);
			$the_query_post = new WP_Query( $args_search );

			if( $the_query_post->have_posts()){
		?>
		<p class="header-result">Resultado da busca para: <span>"<?=get_search_query();?>"</span></p>


		<ul class="list-posts desk">
			<?php
				while($the_query_post->have_posts()){
					$the_query_post->the_post();
			?>

			<li class="list-post-item">
				<a href="<?php the_permalink() ?>">
					<div class="image-desk">
						<?php
								the_post_thumbnail('banner-370x260');
						?>
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

				
					<div class="box-content">
							<?php
								$limite = '200';
								$descricao = get_the_content();
								$descricao = strip_tags($descricao); 
								$descricao = mb_substr($descricao,0,$limite);
								echo $descricao."...";
							?>
					</div>	

					<a href="<?php the_permalink() ?>" class="ler-tudo">Ler tudo</a>
			
			</li>

			<?php }} else { ?>
		</ul>

		<p class="no-result">Nenhum resultado encontrado para o termo: <span>"<?=get_search_query();?>"</span></p>

		<?php 
			} 
		?>
	</div>
	
	
	<div class="pagination">
		<?php wp_pagenavi(); ?> 
	</div>
</section>

	
<?php get_footer(); ?>
