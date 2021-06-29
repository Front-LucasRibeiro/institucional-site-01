<?php
	$has_title = true;
	$css_escolhido = 'search';
  $termo = $_SERVER["REQUEST_URI"];
  $termo = explode("tag/", $termo);
  $termoTag = str_replace("/", " ", $termo[1]);
  $termoTagFormatted = str_replace("-", " ", $termoTag);
  $titlePage = "Pitinews | $termoTagFormatted";
	$has_reset_css = true;
	require_once('header.php');
?>

<?php
	global $sa_options;
	$sa_settings = get_option( 'sa_options', $sa_options );
?>


<section class="search page-tag">
	<div class="container">

    <p class="header-result">Tudo sobre: <span><?= $termoTagFormatted ?></span></p>
		
		<ul class="list-posts desk">
			<!-- the loop -->
			<?php while ( have_posts() ) : the_post(); ?>
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
					<?php edit_post_link(); ?>
				</li>
			<?php endwhile; ?>
			<!-- end of the loop -->
		</ul>
			

		<div class="pagination">
			<?php				
				echo paginate_links();
			?>
		</div>
	
	</div>
</section>

	
<?php get_footer(); ?>
