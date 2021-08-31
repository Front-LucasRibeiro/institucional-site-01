<?php
$css_escolhido = 'index';
$has_reset_css = true;
require_once('header.php');
?>

<section class="wrapper-slider">
	<?php
	query_posts('post_type=bg_slide_principal');
	while (have_posts()) : the_post();
	?>

		<?php
			if(get_post_meta(300, 'link-fundo-home-topo', true) !== ""){
		?>
			<a href="<?= get_post_meta(300, 'link-fundo-home-topo', true) ?>" target="_blank">
				<div class="fundo">
					<?php the_post_thumbnail(); ?>
				</div>
			</a>
		<?php
			} else {
		?>
			<div class="fundo">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php
			}	
		?>
			

	<?php
	endwhile;
	wp_reset_query();
	?>

	<div class="box-container">
		<ul id="sliderTopo" class="slider-topo desk">

			<?php
			$args = array(
				'post_type' => 'home_slide_principal'
			);

			$loop = new WP_Query($args);
			if ($loop->have_posts()) {
				while ($loop->have_posts()) {
					$loop->the_post();
					$post = get_post();
					$id_post = $post->ID;
			?>

					<li class="slider-topo" data-thumb="">
						<a class="link-full" href="<?= get_post_meta($id_post, 'link_banner_slide', true) ?>">
							<?php the_post_thumbnail('banner-slide-principal-1170x500'); ?>

							<div class="box-legenda">
								<?php the_content(); ?>
							</div>
						</a>
					</li>

			<?php
				}
			}
			?>
		</ul>

		<ul id="sliderTopoMob" class="slider-topo mob">
			<?php
			$args = array(
				'post_type' => 'home_slide_principal'
			);

			$loop = new WP_Query($args);
			if ($loop->have_posts()) {
				while ($loop->have_posts()) {
					$loop->the_post();
					$post = get_post();
					$id_post = $post->ID;
			?>

					<li class="slider-topo" data-thumb="">
						<a class="link-full" href="<?= get_post_meta($id_post, 'link_banner_slide', true) ?>">
							<?php the_post_thumbnail('banner-slide-principal-mobile-480x600'); ?> 

							<div class="box-legenda">
								<?php the_content(); ?>
							</div>
						</a>
					</li>

			<?php
				}
			}
			?>
		</ul>
	</div>
</section>

<section class="banner-top-home box-adsense">
	<?= get_post_meta(165, 'banner-adsense-home-topo', true) ?>
</section>

<div class="wrapper-section">
	<section class="box-ultimas-noticias">
		<div class="container">
			<h2 class="section-title">
				<span class="title-desk">
					<?= get_post_meta(100, 'title-ultimas-noticias', true) ?>
				</span>
				<span class="title-mob">
					<?= get_post_meta(103, 'title-ultimas-noticias-mob', true) ?>
				</span>
				<span class="separator"></span>
				<span class="veja-mais">
					<a href="<?= get_post_meta(104, 'link-veja-mais', true) ?>">Veja mais</a>
				</span>
			</h2>

			<ul class="list-posts">
				<?php
				$args = array(
					'post_type' => 'post',
					'showposts' => 6,
					'posts_per_page' => 6,
					'meta_key' => 'ed_post_views_count',
					'orderby' => 'meta_value_num',
					'order' => 'DESC', //Ou ASC
					'hide_empty' => true,
					'date_query' => array(
						'after' => date('Y-m-d', strtotime('-30 days')) 
					)
				);

				$cont = 1;

				$loop = new WP_Query($args);
				if ($loop->have_posts()) {
					while ($loop->have_posts()) {
						$loop->the_post();
						$post = get_post();
						$id_post = $post->ID;

						if ($cont < 7) {
				?>



							<li class="list-post-item">
								<a href="<?php the_permalink() ?>">
									<div class="image-desk">
										<?php the_post_thumbnail('banner-370x370'); ?>
									</div>
									<div class="image-mob">
										<?php the_post_thumbnail('banner-220x243'); ?>
									</div>
								</a>

								<div class="wrapper-title">
									<div class="box-category">
										<?php the_category() ?>
									</div>

									<div class="box-title">
										<a href="<?php the_permalink() ?>">
											<h3 class="title-post">
												<?php the_title(); ?>
											</h3>
										</a>
									</div>
								</div>

								<?php edit_post_link(); ?>
							</li>

				<?php }
						$cont++;
						wp_reset_query();
						wp_reset_postdata();
					}
				}
				?>
			</ul>
		</div>
	</section>

	<section class="box-categorias">
		<div class="container">
			<h2 class="section-title">
				<span class="title-desk">
					<?= get_post_meta(101, 'title-categorias', true) ?>
				</span>
				<span class="title-mob">
					<?= get_post_meta(101, 'title-categorias', true) ?>
				</span>
				<span class="separator"></span>
			</h2>

			<ul class="list-category">

				<?php
				$args = array(
					'post_type' => 'home_list_category'
				);

				$loop = new WP_Query($args);
				if ($loop->have_posts()) {
					while ($loop->have_posts()) {
						$loop->the_post();
						$post = get_post();
						$id_post = $post->ID;
				?>

						<li class="list-category-item" data-thumb="" style="border: 4px solid <?= get_post_meta($id_post, 'border-color-category', true) ?> ">
							<a href="<?= get_post_meta($id_post, 'link-category', true) ?>">
								<?php the_post_thumbnail(); ?>
								<div class="box-legenda">
									<?php the_title(); ?>
								</div>
							</a>
						</li>
						<?php edit_post_link(); ?>
				<?php
					}
				}
				?>
			</ul>
		</div>
	</section>
</div>

<section class="ultimas-noticas-by-category">
	<div class="container">
		<div class="box-wrapper">
			<div class="box-secao-category">
				<h2 class="title-post-by-category title-item" style="color: <?= get_post_meta(107, 'cor-item-1', true) ?>">
					<img class="icon" src="<?= get_post_meta(106, 'icon-item-1', true) ?>" />
					<?= get_post_meta(105, 'title-item-1', true) ?>
				</h2>
				<div class="box-separator">
					<span class="separator" style="border-bottom: 4px solid <?= get_post_meta(107, 'cor-item-1', true) ?>"></span>
					<a href="<?= get_post_meta(108, 'link-veja-mais-item-1', true) ?>">
						<span class="link" style="color: <?= get_post_meta(107, 'cor-item-1', true) ?>">Veja mais</span>
						<img src="<?= get_post_meta(112, 'icone-veja-mais-item-1', true) ?>" alt="">
					</a>
				</div>

				<ul class="list-posts desk">
					<?php
					$indexContent = 0;
					$indexBoxCategory = 0;
					$indexBoxImage = 0;

					$args = array(
						'posts_per_page' => 3,
						'order' => 'DESC', //Ou ASC
						'orderby' => 'date',
						'hide_empty' => true,
						'category_name' => get_post_meta(113, 'categoria-item-1', true)
					);

					$loop = new WP_Query($args);
					if ($loop->have_posts()) {
						while ($loop->have_posts()) {
							$loop->the_post();
							$post = get_post();
							$id_post = $post->ID;
					?>

							<li class="list-post-item">
								<a href="<?php the_permalink() ?>">
									<div class="image-desk">
										<?php
										if ($indexBoxImage === 0) {
											the_post_thumbnail('banner-570x400');
											$indexBoxImage++;
										} else {
											the_post_thumbnail('banner-170x119');
										}
										?>
									</div>
								</a>

								<?php
								while ($indexBoxCategory === 0) {
								?>
									<div class="box-category">
										<?php the_category(); ?>
									</div>
								<?php
									$indexBoxCategory++;
								}
								?>

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

								<?php
								while ($indexContent === 0) {
								?>
									<div class="box-content">
										<?php
										echo get_the_excerpt();
										$indexContent++;
										?>
									</div>

									<a href="<?php the_permalink() ?>" class="ler-tudo">Ler tudo</a>
								<?php
								}
								?>

									<?php edit_post_link(); ?>
							</li>

					<?php
							wp_reset_query();
							wp_reset_postdata();
						}
					}
					?>
				</ul>

				<ul class="list-posts mob">
					<?php
					$indexContent = 0;
					$indexBoxCategory = 0;
					$indexBoxImage = 0;

					$args = array(
						'posts_per_page' => 3,
						'order' => 'DESC', //Ou ASC
						'orderby' => 'date',
						'hide_empty' => true,
						'category_name' => get_post_meta(113, 'categoria-item-1', true)
					);

					$loop = new WP_Query($args);
					if ($loop->have_posts()) {
						while ($loop->have_posts()) {
							$loop->the_post();
							$post = get_post();
							$id_post = $post->ID;
					?>

							<li class="list-post-item">
								<a href="<?php the_permalink() ?>">
									<div class="image-mob">
										<?php the_post_thumbnail('banner-67x67'); ?>
									</div>
								</a>

								<div class="wrapper-content">
									<div class="box-title">
										<a href="<?php the_permalink() ?>">
											<h3 class="title-post">
												<?php the_title(); ?>
											</h3>
										</a>
									</div>

									<div class="box-content">
										<?php
										$limite = '200';
										$descricao = get_the_content();
										$descricao = strip_tags($descricao);
										$descricao = mb_substr($descricao, 0, $limite);
										echo $descricao . "...";
										?>
									</div>
								</div>
								<?php edit_post_link(); ?>
							</li>

					<?php
							wp_reset_query();
							wp_reset_postdata();
						}
					}
					?>
				</ul>

			</div>
			<div class="box-secao-category">
				<h2 class="title-post-by-category title-item" style="color: <?= get_post_meta(115, 'cor-item-2', true) ?>">
					<img class="icon" src="<?= get_post_meta(118, 'icon-item-2', true) ?>" />
					<?= get_post_meta(114, 'title-item-2', true) ?>
				</h2>
				<div class="box-separator">
					<span class="separator" style="border-bottom: 4px solid <?= get_post_meta(115, 'cor-item-2', true) ?>"></span>
					<a href="<?= get_post_meta(116, 'link-veja-mais-item-2', true) ?>">
						<span class="link" style="color: <?= get_post_meta(115, 'cor-item-2', true) ?>">Veja mais</span>
						<img src="<?= get_post_meta(117, 'icone-veja-mais-item-2', true) ?>" alt="">
					</a>
				</div>

				<ul class="list-posts desk">
					<?php
					$indexContent = 0;
					$indexBoxCategory = 0;
					$indexBoxImage = 0;

					$args = array(
						'posts_per_page' => 3,
						'order' => 'DESC', //Ou ASC
						'orderby' => 'date',
						'hide_empty' => true,
						'category_name' => get_post_meta(119, 'categoria-item-2', true)
					);

					$loop = new WP_Query($args);
					if ($loop->have_posts()) {
						while ($loop->have_posts()) {
							$loop->the_post();
							$post = get_post();
							$id_post = $post->ID;
					?>

							<li class="list-post-item">
								<a href="<?php the_permalink() ?>">
									<div class="image-desk">
										<?php
										if ($indexBoxImage === 0) {
											the_post_thumbnail('banner-570x400');
											$indexBoxImage++;
										} else {
											the_post_thumbnail('banner-170x119');
										}
										?>
									</div>
								</a>

								<?php
								while ($indexBoxCategory === 0) {
								?>
									<div class="box-category">
										<?php the_category(); ?>
									</div>
								<?php
									$indexBoxCategory++;
								}
								?>

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

								<?php
								while ($indexContent === 0) {
								?>
									<div class="box-content">
										<?php
										echo get_the_excerpt();
										$indexContent++;
										?>
									</div>

									<a href="<?php the_permalink() ?>" class="ler-tudo">Ler tudo</a>
								<?php
								}
								?>

								<?php edit_post_link(); ?>
							</li>

					<?php
							wp_reset_query();
							wp_reset_postdata();
						}
					}
					?>
				</ul>

				<ul class="list-posts mob">
					<?php
					$indexContent = 0;
					$indexBoxCategory = 0;
					$indexBoxImage = 0;

					$args = array(
						'posts_per_page' => 4,
						'order' => 'DESC', //Ou ASC
						'orderby' => 'date',
						'hide_empty' => true,
						'category_name' => get_post_meta(119, 'categoria-item-2', true)
					);

					$loop = new WP_Query($args);
					if ($loop->have_posts()) {
						while ($loop->have_posts()) {
							$loop->the_post();
							$post = get_post();
							$id_post = $post->ID;
					?>

							<li class="list-post-item">
								<a href="<?php the_permalink() ?>">
									<div class="image-mob">
										<?php the_post_thumbnail('banner-220x243'); ?>
									</div>
								</a>

								<div class="wrapper-content">
									<div class="box-title">
										<a href="<?php the_permalink() ?>">
											<h3 class="title-post">
												<?php the_title(); ?>
											</h3>
										</a>
									</div>
								</div>
								<?php edit_post_link(); ?>
							</li>

					<?php
							wp_reset_query();
							wp_reset_postdata();
						}
					}
					?>
				</ul>

			</div>
		</div>
		<div class="box-wrapper">
			<div class="box-secao-category">
				<h2 class="title-post-by-category title-item" style="color: <?= get_post_meta(120, 'cor-item-3', true) ?>">
					<img class="icon" src="<?= get_post_meta(121, 'icon-item-3', true) ?>" />
					<?= get_post_meta(122, 'title-item-3', true) ?>
				</h2>
				<div class="box-separator">
					<span class="separator" style="border-bottom: 4px solid <?= get_post_meta(120, 'cor-item-3', true) ?>"></span>
					<a href="<?= get_post_meta(123, 'link-veja-mais-item-3', true) ?>">
						<span class="link" style="color: <?= get_post_meta(120, 'cor-item-3', true) ?>">Veja mais</span>
						<img src="<?= get_post_meta(124, 'icone-veja-mais-item-3', true) ?>" alt="">
					</a>
				</div>

				<ul class="list-posts desk">
					<?php
					$indexContent = 0;
					$indexBoxCategory = 0;
					$indexBoxImage = 0;

					$args = array(
						'posts_per_page' => 3,
						'order' => 'DESC', //Ou ASC
						'orderby' => 'date',
						'hide_empty' => true,
						'category_name' => get_post_meta(125, 'categoria-item-3', true)
					);

					$loop = new WP_Query($args);
					if ($loop->have_posts()) {
						while ($loop->have_posts()) {
							$loop->the_post();
							$post = get_post();
							$id_post = $post->ID;
					?>

							<li class="list-post-item">
								<a href="<?php the_permalink() ?>">
									<div class="image-desk">
										<?php
										if ($indexBoxImage === 0) {
											the_post_thumbnail('banner-570x400');
											$indexBoxImage++;
										} else {
											the_post_thumbnail('banner-170x119');
										}
										?>
									</div>
								</a>

								<?php
								while ($indexBoxCategory === 0) {
								?>
									<div class="box-category">
										<?php the_category(); ?>
									</div>
								<?php
									$indexBoxCategory++;
								}
								?>

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

								<?php
								while ($indexContent === 0) {
								?>
									<div class="box-content">
										<?php
										echo get_the_excerpt();
										$indexContent++;
										?>
									</div>

									<a href="<?php the_permalink() ?>" class="ler-tudo">Ler tudo</a>
								<?php
								}
								?>

								<?php edit_post_link(); ?>
							</li>

					<?php
							wp_reset_query();
							wp_reset_postdata();
						}
					}
					?>
				</ul>

				<ul class="list-posts mob">
					<?php
					$indexContent = 0;
					$indexBoxCategory = 0;
					$indexBoxImage = 0;

					$args = array(
						'posts_per_page' => 3,
						'order' => 'DESC', //Ou ASC
						'orderby' => 'date',
						'hide_empty' => true,
						'category_name' => get_post_meta(125, 'categoria-item-3', true)
					);

					$loop = new WP_Query($args);
					if ($loop->have_posts()) {
						while ($loop->have_posts()) {
							$loop->the_post();
							$post = get_post();
							$id_post = $post->ID;
					?>

							<li class="list-post-item">
								<a href="<?php the_permalink() ?>">
									<div class="image-mob">
										<?php the_post_thumbnail('banner-67x67'); ?>
									</div>
								</a>

								<div class="wrapper-content">
									<div class="box-title">
										<a href="<?php the_permalink() ?>">
											<h3 class="title-post">
												<?php the_title(); ?>
											</h3>
										</a>
									</div>

									<div class="box-content">
										<?php
										$limite = '200';
										$descricao = get_the_content();
										$descricao = strip_tags($descricao);
										$descricao = mb_substr($descricao, 0, $limite);
										echo $descricao . "...";
										?>
									</div>
								</div>
								<?php edit_post_link(); ?>
							</li>

					<?php
							wp_reset_query();
							wp_reset_postdata();
						}
					}
					?>
				</ul>

			</div>
			<div class="box-secao-category">
				<h2 class="title-post-by-category title-item" style="color: <?= get_post_meta(126, 'cor-item-4', true) ?>">
					<img class="icon" src="<?= get_post_meta(127, 'icon-item-4', true) ?>" />
					<?= get_post_meta(131, 'title-item-4', true) ?>
				</h2>
				<div class="box-separator">
					<span class="separator" style="border-bottom: 4px solid <?= get_post_meta(126, 'cor-item-4', true) ?>"></span>
					<a href="<?= get_post_meta(128, 'link-veja-mais-item-4', true) ?>">
						<span class="link" style="color: <?= get_post_meta(126, 'cor-item-4', true) ?>">Veja mais</span>
						<img src="<?= get_post_meta(129, 'icone-veja-mais-item-4', true) ?>" alt="">
					</a>
				</div>

				<ul class="list-posts desk">
					<?php
					$indexContent = 0;
					$indexBoxCategory = 0;
					$indexBoxImage = 0;

					$args = array(
						'posts_per_page' => 3,
						'order' => 'DESC', //Ou ASC
						'orderby' => 'date',
						'hide_empty' => true,
						'category_name' => get_post_meta(130, 'categoria-item-4', true)
					);

					$loop = new WP_Query($args);
					if ($loop->have_posts()) {
						while ($loop->have_posts()) {
							$loop->the_post();
							$post = get_post();
							$id_post = $post->ID;
					?>

							<li class="list-post-item">
								<a href="<?php the_permalink() ?>">
									<div class="image-desk">
										<?php
										if ($indexBoxImage === 0) {
											the_post_thumbnail('banner-570x400');
											$indexBoxImage++;
										} else {
											the_post_thumbnail('banner-170x119');
										}
										?>
									</div>
								</a>

								<?php
								while ($indexBoxCategory === 0) {
								?>
									<div class="box-category">
										<?php the_category(); ?>
									</div>
								<?php
									$indexBoxCategory++;
								}
								?>

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

								<?php
								while ($indexContent === 0) {
								?>
									<div class="box-content">
										<?php
										echo get_the_excerpt();
										$indexContent++;
										?>
									</div>

									<a href="<?php the_permalink() ?>" class="ler-tudo">Ler tudo</a>
								<?php
								}
								?>
								<?php edit_post_link(); ?>
							</li>

					<?php
							wp_reset_query();
							wp_reset_postdata();
						}
					}
					?>
				</ul>

				<ul class="list-posts mob">
					<?php
					$indexContent = 0;
					$indexBoxCategory = 0;
					$indexBoxImage = 0;

					$args = array(
						'posts_per_page' => 2,
						'order' => 'DESC', //Ou ASC
						'orderby' => 'date',
						'hide_empty' => true,
						'category_name' => get_post_meta(130, 'categoria-item-4', true)
					);

					$loop = new WP_Query($args);
					if ($loop->have_posts()) {
						while ($loop->have_posts()) {
							$loop->the_post();
							$post = get_post();
							$id_post = $post->ID;
					?>

							<li class="list-post-item">
								<a href="<?php the_permalink() ?>">
									<div class="image-mob">
										<?php the_post_thumbnail('banner-220x243'); ?>
									</div>
								</a>

								<div class="wrapper-content">
									<div class="box-title">
										<a href="<?php the_permalink() ?>">
											<h3 class="title-post">
												<?php the_title(); ?>
											</h3>
										</a>
									</div>
									<div class="box-content">
										<?php
										$limite = '200';
										$descricao = get_the_content();
										$descricao = strip_tags($descricao);
										$descricao = mb_substr($descricao, 0, $limite);
										echo $descricao . "...";
										?>
									</div>
								</div>
								<?php edit_post_link(); ?>
							</li>

					<?php
							wp_reset_query();
							wp_reset_postdata();
						}
					}
					?>
				</ul>


			</div>
		</div>
	</div>
</section>

<section class="colunas-criticas">
	<div class="container">
		<div class="wrapper-colunas">
			<h2 class="section-title">
				<span class="title-desk">
					<?= get_post_meta(134, 'title-colunas', true) ?>
				</span>
				<span class="title-mob">
					<?= get_post_meta(135, 'title-colunas-mob', true) ?>
				</span>
				<span class="separator"></span>
				<span class="veja-mais">
					<a href="<?= get_post_meta(136, 'link-ver-tudo', true) ?>">
						<span class="desk">
							<?= get_post_meta(139, 'texto-ver-mais', true) ?>
						</span>
						<span class="mob">
							<?= get_post_meta(138, 'texto-ver-mais-mob', true) ?>
						</span>
					</a>
				</span>
			</h2>

			<ul class="list-posts desk">
				<?php
				$args = array(
					'posts_per_page' => 6,
					'order' => 'DESC', //Ou ASC
					'orderby' => 'date',
					'hide_empty' => true,
					'category_name' => get_post_meta(601, 'categoria-colunas', true)
				);

				$loop = new WP_Query($args);
				if ($loop->have_posts()) {
					while ($loop->have_posts()) {
						$loop->the_post();
						$post = get_post();
						$id_post = $post->ID;
						$autor_id = $post->post_author;
				?>

						<li class="list-post-item">
							<a href="<?php the_permalink() ?>">
								<div class="image-desk">
									<?php the_post_thumbnail('banner-370x260'); ?>
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
										<?= get_avatar($user_email, 24); ?>
									</div>



									<?php

									$userName =  preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $user_name);

									$autor_formatted = str_replace(" ", "-", strtolower($userName));
									?>

									<p class="nome-autor">

										<a href="<?= get_home_url() . '/' . $autor_formatted; ?>">
											<?php the_author(); ?>
										</a>
									</p>
								</div>
								<a href="<?php the_permalink() ?>" class="ler-tudo"><?= get_post_meta(141, 'texto-ler-mais-colunas', true) ?></a>
							</div>
							<?php edit_post_link(); ?>
						</li>

				<?php
						wp_reset_query();
						wp_reset_postdata();
					}
				}
				?>
			</ul>
		</div>
		<div class="wrapper-criticas">
			<h2 class="section-title">
				<span class="title-desk">
					<?= get_post_meta(142, 'title-criticas', true) ?>
				</span>
				<span class="separator"></span>
				<span class="veja-mais">
					<a href="<?= get_post_meta(143, 'link-ver-mais-criticas', true) ?>">
						<span class="mob">
							<?= get_post_meta(144, 'texto-ver-mais-mob-criticas', true) ?>
						</span>
					</a>
				</span>
			</h2>

			<ul class="list-posts desk">
				<?php
				$args = array(
					'posts_per_page' => 3,
					'order' => 'DESC', //Ou ASC
					'orderby' => 'date',
					'hide_empty' => true,
					'category_name' => get_post_meta(132, 'categoria-criticas', true)
				);

				$loop = new WP_Query($args);
				if ($loop->have_posts()) {
					while ($loop->have_posts()) {
						$loop->the_post();
						$post = get_post();
						$id_post = $post->ID;
				?>

						<li class="list-post-item">
							<a href="<?php the_permalink() ?>">
								<div class="image-desk">
									<?php the_post_thumbnail('banner-370x160'); ?>
								</div>
							</a>

							<div class="box-title">
								<a href="<?php the_permalink() ?>">
									<h3 class="title-post">
										<?php the_title(); ?>
									</h3>
								</a>
							</div>
							<?php edit_post_link(); ?>
						</li>

				<?php
						wp_reset_query();
						wp_reset_postdata();
					}
				}
				?>
			</ul>
			<div class="banner-bottom box-adsense">
				<?= get_post_meta(170, 'banner-adsense-home-bottom', true) ?>
			</div>
		</div>
	</div>
</section>

<section class="box-diversidade">
	<div class="container">
		<div class="wrapper-diversidade">
			<h2 class="section-title">
				<span class="title-desk">
					<?= get_post_meta(154, 'title-diversidade', true) ?>
				</span>
				<span class="separator"></span>
				<span class="veja-mais">
					<a href="<?= get_post_meta(146, 'link-ver-tudo-diversidade', true) ?>">
						<span class="desk">
							<?= get_post_meta(152, 'texto-ver-mais-desk-diversidade', true) ?>
						</span>
						<span class="mob">
							<?= get_post_meta(155, 'texto-ver-mais-mob-diversidade', true) ?>
						</span>
					</a>
				</span>
			</h2>

			<ul class="list-posts desk">
				<?php
				$args = array(
					'posts_per_page' => 6,
					'order' => 'DESC', //Ou ASC
					'orderby' => 'date',
					'hide_empty' => true,
					'category_name' => get_post_meta(150, 'categoria-diversidade', true),
				);

				$loop = new WP_Query($args);
				if ($loop->have_posts()) {
					while ($loop->have_posts()) {
						$loop->the_post();
						$post = get_post();
						$id_post = $post->ID;
						$autor_id = $post->post_author;
				?>

						<li class="list-post-item">
							<a href="<?php the_permalink() ?>">
								<div class="image-desk">
									<?php the_post_thumbnail('banner-370x260'); ?>
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
										<?= get_avatar($user_email, 24); ?>
									</div>

									<?php
									$userName =  preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $user_name);

									$autor_formatted = str_replace(" ", "-", strtolower($userName));
									?>

									<p class="nome-autor">
										<a href="<?= get_home_url() . '/' . $autor_formatted; ?>">
											<?php the_author(); ?>
										</a>
									</p>
								</div>
								<a href="<?php the_permalink() ?>" class="ler-tudo"><?= get_post_meta(156, 'texto-ler-mais-diversidade', true) ?></a>
							</div>
							<?php edit_post_link(); ?>
						</li>

				<?php
						wp_reset_query();
						wp_reset_postdata();
					}
				}
				?>
			</ul>

			<ul class="list-posts mob">
				<?php
				$args = array(
					'posts_per_page' => 3,
					'order' => 'DESC', //Ou ASC
					'orderby' => 'date',
					'hide_empty' => true,
					'category_name' => get_post_meta(150, 'categoria-diversidade', true),
				);

				$loop = new WP_Query($args);
				if ($loop->have_posts()) {
					while ($loop->have_posts()) {
						$loop->the_post();
						$post = get_post();
						$id_post = $post->ID;
				?>

						<li class="list-post-item">
							<a href="<?php the_permalink() ?>">
								<div class="image-mob">
									<?php the_post_thumbnail('banner-370x160'); ?>

									<div class="box-title">
										<h3 class="title-post">
											<?php the_title(); ?>
										</h3>
									</div>
								</div>
							</a>
							<?php edit_post_link(); ?>
						</li>

				<?php
						wp_reset_query();
						wp_reset_postdata();
					}
				}
				?>
			</ul>
		</div>
	</div>
</section>

<section class="piticast">
	<div class="container">
		<div class="wrapper-piticast">
			<h2 class="section-title">
				<span class="title-desk">
					<img src="<?= get_post_meta(172, 'title-piticast', true) ?>" alt="Piticast" />
				</span>
				<span class="separator"></span>
				<span class="veja-mais">
					<a href="<?= get_post_meta(176, 'link-ver-tudo-piticast', true) ?>">
						<span class="desk">
							<?= get_post_meta(174, 'texto-ver-mais-desk-piticast', true) ?>
						</span>
						<span class="mob">
							<?= get_post_meta(178, 'texto-ver-mais-mob-piticast', true) ?>
						</span>
					</a>
				</span>
			</h2>

			<div id='buzzsprout-large-player-1757249'></div>
			<script type='text/javascript' charset='utf-8' src='https://www.buzzsprout.com/1757249.js?container_id=buzzsprout-large-player-1757249&player=large'></script>

		</div>
	</div>
</section>

<section class="pitiplay">
	<div class="container">
		<div class="wrapper-pitiplay">
			<h2 class="section-title">
				<span class="title-desk">
					<img src="<?= get_post_meta(187, 'title-pitiplay', true) ?>" alt="Pitiplay" />
				</span>
				<span class="separator"></span>
				<span class="veja-mais">
					<a href="<?= get_post_meta(181, 'link-ver-tudo-pitiplay', true) ?>">
						<span class="desk">
							<?= get_post_meta(185, 'texto-ver-mais-desk-pitiplay', true) ?>
						</span>
						<span class="mob">
							<?= get_post_meta(183, 'texto-ver-mais-mob-pitiplay', true) ?>
						</span>
					</a>
				</span>
			</h2>

			<?php echo do_shortcode('[yourchannel user="Piticas"]'); ?>
		</div>
	</div>
</section>

<section class="instagram">
	<div class="container">
		<div class="wrapper-instagram">
			<h2 class="section-title">
				<span class="title-desk">
					<a href="<?= get_post_meta(211, 'link-instagram', true) ?>" target="_blank">
						<?= get_post_meta(189, 'title-instagram', true) ?>
					</a>
				</span>
				<span class="separator"></span>
				<span class="veja-mais">
					<a href="https://www.instagram.com/piticasoficial" target="_blank">
						<span class="desk">Ver mais</span>
						<span class="mob">Ver tudo</span>
					</a>
				</span>
			</h2>
		</div>

		<div class="content-posts">
		<iframe src="https://cdn.lightwidget.com/widgets/974c25e9c8c957fb8f659465655f6c5b.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;" loading="lazy"></iframe>
		</div>
	</div>
</section>


<section class="loja-online">
	<div class="container">
		<div class="wrapper-loja-online">
			<h2 class="section-title">
				<span class="title-desk">
					<a href="<?= get_post_meta(212, 'link-ver-tudo-loja-online', true) ?>" target="_blank">
						<?= get_post_meta(230, 'title-loja-online', true) ?>
					</a>
				</span>
				<span class="separator"></span>
				<span class="veja-mais">
					<a href="<?= get_post_meta(212, 'link-ver-tudo-loja-online', true) ?>" target="_blank">
						<span class="desk">
							<?= get_post_meta(281, 'texto-ver-mais-desk-loja-online', true) ?>
						</span>
						<span class="mob">
							<?= get_post_meta(192, 'texto-ver-mais-mob-loja-online', true) ?>
						</span>
					</a>
				</span>
			</h2>

			<ul class="list-posts desk">
				<?php
				$args = array(
					'post_type' => 'loja_online',
					'posts_per_page' => 4,
				);

				$loop = new WP_Query($args);
				if ($loop->have_posts()) {
					while ($loop->have_posts()) {
						$loop->the_post();
						$post = get_post();
						$id_post = $post->ID;
				?>

						<li class="list-post-item">
							<a href="<?= get_post_meta($id_post, 'link-comprar-agora', true) ?>" target="_blank">
								<div class="card">
									<div class="image-desk">
										<?php the_post_thumbnail(); ?>
									</div>
									<div class="box-title">
										<h3 class="title-post">
											<?php the_title(); ?>
										</h3>

										<div class="content">
											<?php the_content(); ?>
										</div>

										<a href="<?= get_post_meta($id_post, 'link-comprar-agora', true) ?>" target="_blank" class="btn-comprar">Comprar Agora</a>
									</div>
								</div>
							</a>
							<?php edit_post_link(); ?>
						</li>

				<?php
					}
				}
				?>
			</ul>

		</div>
	</div>
</section>

<!-- popup  home-->
<?php
$args = array(
	'post_type' => 'popup'
);

$loop = new WP_Query($args);
if ($loop->have_posts()) {
	while ($loop->have_posts()) {
		$loop->the_post();
		$post = get_post();
		$id_post = $post->ID;
?>
	<div class="overlay-popup <?= get_post_meta($id_post, 'ativar_popup', true); ?>">
		<div class="popup-content">
			<a href="#" class="btn-close">X</a>

			<div class="box-content">
				<div class="box-video" urlVideo="<?= get_post_meta($id_post, 'url_video', true) ?>">

				</div>
			</div>
		</div>
	</div>
<?php
	}
}
?>


<?php
$js_escolhido = 'home';
require_once('footer.php');
?>