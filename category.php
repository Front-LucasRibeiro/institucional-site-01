<?php

$css_escolhido = 'category';
$has_reset_css = true;
require_once('header.php');



?>



<main id="category-page">

	<div class="container">



		<!-- start h2 tag abertura  -->

			<?php if(is_category('series')){ ?>

		<h1 class="title-post-by-category title-item" style="color: <?= get_post_meta( 107, 'cor-item-1', true) ?>;font-weight: 600; font-size: 26px; text-transform: capitalize;">

			<?php } elseif(is_category('filmes')){ ?>

		<h1 class="title-post-by-category title-item" style="color: <?= get_post_meta( 115, 'cor-item-2', true) ?>;font-weight: 600; font-size: 26px; text-transform: capitalize;">

			<?php } elseif(is_category('animes')){ ?>

		<h1 class="title-post-by-category title-item" style="color: <?= get_post_meta( 120, 'cor-item-3', true) ?>;font-weight: 600; font-size: 26px; text-transform: capitalize;">

			<?php } elseif(is_category('games')){ ?>

		<h1 class="title-post-by-category title-item" style="color: <?= get_post_meta( 126, 'cor-item-4', true) ?>;font-weight: 600; font-size: 26px; text-transform: capitalize;">

		<?php } elseif(is_category('diversidade')){ ?>

		<h1 class="title-post-by-category title-item" style="color: #E73336;font-weight: 600; font-size: 26px; text-transform: capitalize;">

		<?php } elseif(is_category('colunas')){ ?>

		<h1 class="title-post-by-category title-item" style="color: #104481;font-weight: 600; font-size: 26px; text-transform: capitalize;">

		<?php } elseif(is_category('criticas')){ ?>

		<h1 class="title-post-by-category title-item" style="color: #6C368C;font-weight: 600; font-size: 26px; text-transform: capitalize;">

		<?php } elseif(is_category('piticas')){ ?>

		<h1 class="title-post-by-category title-item" style="color: #ffe554;font-weight: 600; font-size: 26px; text-transform: capitalize;text-shadow: 0px 0px 2px #000;"> 

		<?php } elseif(is_category('podcast')){ ?>

		<h1 class="title-post-by-category title-item" style="color: #633b79;font-weight: 600; font-size: 26px; text-transform: capitalize;">

			<?php } else {?>

		<h1 class="title-post-by-category title-item" style="color: #266190; font-weight: 600; font-size: 26px; text-transform: capitalize;">

			<?php }?> 

			<!-- fim tag abertura h2  -->

		

		<!-- start icone-titulo  -->

		<?php if(is_category('series')){ ?>

			<img src="<?= get_post_meta( 106, 'icon-item-1', true) ?>">

			<?= get_post_meta( 105, 'title-item-1', true) ?>

		<?php } elseif(is_category('filmes')){ ?>

			<img src="<?= get_post_meta( 118, 'icon-item-2', true) ?>">

			<?= get_post_meta( 114, 'title-item-2', true) ?>

		<?php } elseif(is_category('animes')){ ?>

			<img src="<?= get_post_meta( 121, 'icon-item-3', true) ?>">

			<?= get_post_meta( 122, 'title-item-3', true) ?>

		<?php } elseif(is_category('games')){ ?>

			<img src="<?= get_post_meta( 127, 'icon-item-4', true) ?>">

			<?= get_post_meta( 131, 'title-item-4', true) ?>

		<?php } else {?>

			<img src="<?= get_post_meta( 245, 'icon-default-categoria', true) ?>">

			<?php single_cat_title();?>

		<?php }?> 

		<!-- end icone-titulo  -->

		</h1>



		<!-- start cor borda  -->

			<?php if(is_category('series')){ ?>

		<div class="box-separator">

			<span class="separator" style="display:block; border-bottom: 4px solid <?= get_post_meta( 107, 'cor-item-1', true) ?>"></span>

		</div>

			<?php } elseif(is_category('filmes')){ ?>

		<div class="box-separator">

			<span class="separator" style="display:block; border-bottom: 4px solid <?= get_post_meta( 115, 'cor-item-2', true) ?>"></span>

		</div>

		<?php } elseif(is_category('diversidade')){ ?>

		<div class="box-separator">

			<span class="separator" style="display:block; border-bottom: 4px solid #E73336;"></span>

		</div>

		<?php } elseif(is_category('piticas')){ ?>

		<div class="box-separator">

			<span class="separator" style="display:block; border-bottom: 4px solid #ffe554;box-shadow: 0px 0px 1px #000;"></span>

		</div>

		<?php } elseif(is_category('podcast')){ ?>

		<div class="box-separator">

			<span class="separator" style="display:block; border-bottom: 4px solid #633b79;"></span>

		</div>

		<?php } elseif(is_category('colunas')){ ?>

		<div class="box-separator">

			<span class="separator" style="display:block; border-bottom: 4px solid #104481;"></span>

		</div>

		<?php } elseif(is_category('criticas')){ ?>

		<div class="box-separator">

			<span class="separator" style="display:block; border-bottom: 4px solid #6C368C;"></span>

		</div>

			<?php } elseif(is_category('animes')){ ?>

		<div class="box-separator">

			<span class="separator" style="display:block; border-bottom: 4px solid <?= get_post_meta( 120, 'cor-item-3', true) ?>"></span>

		</div>

			<?php } elseif(is_category('games')){ ?>

		<div class="box-separator">

			<span class="separator" style="display:block; border-bottom: 4px solid <?= get_post_meta( 126, 'cor-item-4', true) ?>"></span>

		</div>

			<?php } else {?>

		<div class="box-separator">

			<span class="separator" style="display:block; border-bottom: 4px solid; color: #266190"></span>

		</div>

			<?php }?> 

		<!-- end cor borda  -->



		<div class="title-page">

			<span>Últimas notícias</span>

			<div class="sep"></div>

		</div>



		<article>

			<?php 

			$cont = 1;

			if ( have_posts() ) {

				while ( have_posts() ) {

					the_post(); 

					if($cont < 7){ ?>

				

						<li class="item-first-list">

							<a href="<?php the_permalink() ?>">

								<div class="image-desk">

									<?php the_post_thumbnail('banner-370x370');?>

								</div>

								<div class="image-mob">

									<?php the_post_thumbnail('banner-220x243');?>

								</div>

							</a>



							<div class="wrapper-title">

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

							</div>

						</li>



					<?php } else if($cont == 7){ ?>



						<div class="clear"></div>

						

						<div class="box-wrapper-adsense topo">

							<div class="adsence topo">

								<?= get_post_meta( 240, 'banner-adsense-post-topo', true) ?>

							</div>

						</div>



						<div class="title-page">

							<span>Mais notícias</span>

							<div class="sep"></div>

						</div>



						<li class="list-post-item list-post-item-<?=$cont?>">

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



									<p class="nome-autor">

										<a href="<?= get_home_url().'/'.$autor_formatted; ?>">

											<?php the_author(); ?>

										</a>

									</p>

								</div>

								<a href="<?php the_permalink() ?>" class="ler-tudo"><?= get_post_meta( 141, 'texto-ler-mais-colunas', true) ?></a>

							</div>

						</li>



					<?php }else{ ?>



						<li class="list-post-item list-post-item-<?=$cont?>">

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



									<p class="nome-autor">

										<a href="<?= get_home_url().'/'.$autor_formatted; ?>">

											<?php the_author(); ?>

										</a>

									</p>

								</div>

								<a href="<?php the_permalink() ?>" class="ler-tudo"><?= get_post_meta( 141, 'texto-ler-mais-colunas', true) ?></a>

							</div>

						</li>

						

					<?php } $cont++; } } ?>

			<div class="clear"></div>

		</article>

	</div>

</main>

		

<?php get_footer(); ?>