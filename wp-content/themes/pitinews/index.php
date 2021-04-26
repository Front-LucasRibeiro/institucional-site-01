<?php
	$home = get_template_directory_uri();
	$css_escolhido = 'index';
	require_once('header.php');
?>

<section class="wrapper-slider">
	<?php
		query_posts('post_type=bg_slide_principal');
		while(have_posts()): the_post();
	?>

	<div class="fundo">
		<?php the_post_thumbnail(); ?>
	</div>

	<?php
		endwhile;
		wp_reset_query();
	?>

	<div class="box-container">
		<ul id="sliderTopo" class="slider-topo desk">
	
			<?php
				query_posts('post_type=home_slide_principal');
				while(have_posts()): the_post();
			?>
	
			<li class="slider-topo" data-thumb="">
				<?php the_post_thumbnail(); ?>
				<div class="box-legenda">
					<?php the_content(); ?>
				</div>
			</li>
	
			<?php
				endwhile;
				wp_reset_query();
			?>
		</ul>

		<ul id="sliderTopoMob" class="slider-topo mob">
			<?php
				$args = array(
					'post_type' => 'home_slide_principal'
				);
				
				$loop = new WP_Query( $args );
				if( $loop->have_posts() ) { 
					while( $loop-> have_posts()) {
						$loop-> the_post();
						$post = get_post();
						$id_post = $post->ID;
			?>
		
			<li class="slider-topo" data-thumb="">
				<img src="<?= get_post_meta( $id_post, 'image_slide_mob', true) ?>	" alt="banner - pitinews">

				<div class="box-legenda">
					<?php the_content(); ?>
				</div>
			</li>
	
			<?php
					}
				}
			?>
		</ul>
	</div>
</section>

<section class="box-adsense">
	
</section>

<div class="wrapper-section">
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
						'posts_per_page' => 6,
						'order' => 'DESC', //Ou ASC
						'orderby' => 'date',
						'hide_empty' => true,
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
		
				<?php
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
					<?= get_post_meta( 101, 'title-categorias', true) ?>
				</span>
				<span class="title-mob">
					<?= get_post_meta( 101, 'title-categorias', true) ?>
				</span>
				<span class="separator"></span>
				<span class="veja-mais">
					<a href="<?= get_post_meta( 104, 'link-veja-mais', true) ?>">Veja mais</a>
				</span>
			</h2>
	
			<ul class="list-category">
	
				<?php
					$args = array(
						'post_type' => 'home_list_category'
					);
					
					$loop = new WP_Query( $args );
					if( $loop->have_posts() ) { 
						while( $loop-> have_posts()) {
							$loop-> the_post();
							$post = get_post();
							$id_post = $post->ID;
				?>
		
				<li class="list-category-item" data-thumb="" style="border: 4px solid <?= get_post_meta( $id_post, 'border-color-category', true) ?> ">
					<a href="<?= get_post_meta( $id_post, 'link-category', true) ?>">
						<?php the_post_thumbnail(); ?>
						<div class="box-legenda">
							<?php the_title(); ?>
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
</div>

<section class="ultimas-noticas-by-category">
	<div class="container">
		<div class="box-wrapper">
			<div class="box-secao-category">
				<h2 class="title-post-by-category title-item" style="color: <?= get_post_meta( 107, 'cor-item-1', true) ?>">
					<img class="icon" src="<?= get_post_meta( 106, 'icon-item-1', true) ?>" />
					<?= get_post_meta( 105, 'title-item-1', true) ?>
				</h2>
				<div class="box-separator">
					<span class="separator" style="border-bottom: 4px solid <?= get_post_meta( 107, 'cor-item-1', true) ?>"></span>
					<a href="<?= get_post_meta( 108, 'link-veja-mais-item-1', true) ?>">
						<span class="link" style="color: <?= get_post_meta( 107, 'cor-item-1', true) ?>">Veja mais</span>
						<img src="<?= get_post_meta( 112, 'icone-veja-mais-item-1', true) ?>" alt="">
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
							'category_name' => get_post_meta( 113, 'categoria-item-1', true)
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
								<?php
									if ( $indexBoxImage === 0 ) {
										the_post_thumbnail('banner-570x400');
										$indexBoxImage++;
									}else{
										the_post_thumbnail('banner-170x119');
									}
								?>
							</div>
						</a>

						<?php
								while ( $indexBoxCategory === 0 ) {
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
								while ( $indexContent === 0 ) {
						?>
							<div class="box-content">
									<?php
										$limite = '200';
										$descricao = get_the_content();
										$descricao = strip_tags($descricao); 
										$descricao = mb_substr($descricao,0,$limite);
										echo $descricao."...";

										$indexContent++;
									?>
							</div>	

							<a href="<?php the_permalink() ?>" class="ler-tudo">Ler tudo</a>
						<?php
							}
						?>
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
							'category_name' => get_post_meta( 113, 'categoria-item-1', true)
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
							<div class="image-mob">
								<?php the_post_thumbnail('banner-67x67');?>
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
										$descricao = mb_substr($descricao,0,$limite);
										echo $descricao."...";
									?>
							</div>							
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
			<div class="box-secao-category">
				<h2 class="title-post-by-category title-item" style="color: <?= get_post_meta( 115, 'cor-item-2', true) ?>">
					<img class="icon" src="<?= get_post_meta( 118, 'icon-item-2', true) ?>" />
					<?= get_post_meta( 114, 'title-item-2', true) ?>
				</h2>
				<div class="box-separator">
					<span class="separator" style="border-bottom: 4px solid <?= get_post_meta( 115, 'cor-item-2', true) ?>"></span>
					<a href="<?= get_post_meta( 116, 'link-veja-mais-item-2', true) ?>">
						<span class="link" style="color: <?= get_post_meta( 115, 'cor-item-2', true) ?>">Veja mais</span>
						<img src="<?= get_post_meta( 117, 'icone-veja-mais-item-2', true) ?>" alt="">
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
							'category_name' => get_post_meta( 119, 'categoria-item-2', true)
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
								<?php
									if ( $indexBoxImage === 0 ) {
										the_post_thumbnail('banner-570x400');
										$indexBoxImage++;
									}else{
										the_post_thumbnail('banner-170x119');
									}
								?>
							</div>
						</a>

						<?php
								while ( $indexBoxCategory === 0 ) {
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
								while ( $indexContent === 0 ) {
						?>
							<div class="box-content">
									<?php
										$limite = '200';
										$descricao = get_the_content();
										$descricao = strip_tags($descricao); 
										$descricao = mb_substr($descricao,0,$limite);
										echo $descricao."...";

										$indexContent++;
									?>
							</div>	

							<a href="<?php the_permalink() ?>" class="ler-tudo">Ler tudo</a>
						<?php
							}
						?>
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
							'category_name' => get_post_meta( 119, 'categoria-item-2', true)
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
							<div class="image-mob">
								<?php the_post_thumbnail('banner-220x243');?>
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
				<h2 class="title-post-by-category title-item" style="color: <?= get_post_meta( 120, 'cor-item-3', true) ?>">
					<img class="icon" src="<?= get_post_meta( 121, 'icon-item-3', true) ?>" />
					<?= get_post_meta( 122, 'title-item-3', true) ?>
				</h2>
				<div class="box-separator">
					<span class="separator" style="border-bottom: 4px solid <?= get_post_meta( 120, 'cor-item-3', true) ?>"></span>
					<a href="<?= get_post_meta( 123, 'link-veja-mais-item-3', true) ?>">
						<span class="link" style="color: <?= get_post_meta( 120, 'cor-item-3', true) ?>">Veja mais</span>
						<img src="<?= get_post_meta( 124, 'icone-veja-mais-item-3', true) ?>" alt="">
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
							'category_name' => get_post_meta( 125, 'categoria-item-3', true)
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
								<?php
									if ( $indexBoxImage === 0 ) {
										the_post_thumbnail('banner-570x400');
										$indexBoxImage++;
									}else{
										the_post_thumbnail('banner-170x119');
									}
								?>
							</div>
						</a>

						<?php
								while ( $indexBoxCategory === 0 ) {
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
								while ( $indexContent === 0 ) {
						?>
							<div class="box-content">
									<?php
										$limite = '200';
										$descricao = get_the_content();
										$descricao = strip_tags($descricao); 
										$descricao = mb_substr($descricao,0,$limite);
										echo $descricao."...";

										$indexContent++;
									?>
							</div>	

							<a href="<?php the_permalink() ?>" class="ler-tudo">Ler tudo</a>
						<?php
							}
						?>
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
							'category_name' => get_post_meta( 125, 'categoria-item-3', true)
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
							<div class="image-mob">
								<?php the_post_thumbnail('banner-67x67');?>
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
										$descricao = mb_substr($descricao,0,$limite);
										echo $descricao."...";
									?>
							</div>							
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
			<div class="box-secao-category">
				<h2 class="title-post-by-category title-item" style="color: <?= get_post_meta( 126, 'cor-item-4', true) ?>">
					<img class="icon" src="<?= get_post_meta( 127, 'icon-item-4', true) ?>" />
					<?= get_post_meta( 131, 'title-item-4', true) ?>
				</h2>
				<div class="box-separator">
					<span class="separator" style="border-bottom: 4px solid <?= get_post_meta( 126, 'cor-item-4', true) ?>"></span>
					<a href="<?= get_post_meta( 128, 'link-veja-mais-item-4', true) ?>">
						<span class="link" style="color: <?= get_post_meta( 126, 'cor-item-4', true) ?>">Veja mais</span>
						<img src="<?= get_post_meta( 129, 'icone-veja-mais-item-4', true) ?>" alt="">
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
							'category_name' => get_post_meta( 130, 'categoria-item-4', true)
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
								<?php
									if ( $indexBoxImage === 0 ) {
										the_post_thumbnail('banner-570x400');
										$indexBoxImage++;
									}else{
										the_post_thumbnail('banner-170x119');
									}
								?>
							</div>
						</a>

						<?php
								while ( $indexBoxCategory === 0 ) {
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
								while ( $indexContent === 0 ) {
						?>
							<div class="box-content">
									<?php
										$limite = '200';
										$descricao = get_the_content();
										$descricao = strip_tags($descricao); 
										$descricao = mb_substr($descricao,0,$limite);
										echo $descricao."...";

										$indexContent++;
									?>
							</div>	

							<a href="<?php the_permalink() ?>" class="ler-tudo">Ler tudo</a>
						<?php
							}
						?>
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
							'category_name' => get_post_meta( 130, 'categoria-item-4', true)
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
							<div class="image-mob">
								<?php the_post_thumbnail('banner-220x243');?>
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
										$descricao = mb_substr($descricao,0,$limite);
										echo $descricao."...";
									?>
							</div>		
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
		</div>
	</div>
</section>

<section class="colunas-criticas">
	<div class="container">
		<div class="wrapper-colunas">
			<h2 class="section-title">
				<span class="title-desk">
					<?= get_post_meta( 134, 'title-colunas', true) ?>
				</span>
				<span class="title-mob">
					<?= get_post_meta( 135, 'title-colunas-mob', true) ?>
				</span>
				<span class="separator"></span>
				<span class="veja-mais">
					<a href="<?= get_post_meta( 136, 'link-ver-tudo', true) ?>">
						<span class="desk">
							<?= get_post_meta( 139, 'texto-ver-mais', true) ?>
						</span>
						<span class="mob">
							<?= get_post_meta( 138, 'texto-ver-mais-mob', true) ?>
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
						'category_name' => get_post_meta( 131, 'categoria-colunas', true)
					);
					
					$loop = new WP_Query( $args );
					if( $loop->have_posts() ) { 
						while( $loop-> have_posts()) {
							$loop-> the_post();
							$post = get_post();
							$id_post = $post->ID;
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

							<p class="nome-autor">
								<a href="<?= get_home_url().'/'.$autor_formatted; ?>">
									<?php the_author(); ?>
								</a>
							</p>
						</div>
						<a href="<?php the_permalink() ?>" class="ler-tudo"><?= get_post_meta( 141, 'texto-ler-mais-colunas', true) ?></a>
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
		<div class="wrapper-criticas">
			<h2 class="section-title">
				<span class="title-desk">
					<?= get_post_meta( 142, 'title-criticas', true) ?>
				</span>
				<span class="separator"></span>
				<span class="veja-mais">
					<a href="<?= get_post_meta( 143, 'link-ver-mais-criticas', true) ?>">
						<span class="mob">
							<?= get_post_meta( 144, 'texto-ver-mais-mob-criticas', true) ?>
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
						'category_name' => get_post_meta( 132, 'categoria-criticas', true)
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
							<?php the_post_thumbnail('banner-370x160');?>
						</div>
					</a>
					
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
			<div class="banner-bottom">
	
			</div>
		</div>
	</div>
</section>

<section class="diversidade">
	<div class="container">
		<div class="wrapper-diversidade">
			<h2 class="section-title">
				<span class="title-desk">
					<?= get_post_meta( 154, 'title-diversidade', true) ?>
				</span>
				<span class="separator"></span>
				<span class="veja-mais">
					<a href="<?= get_post_meta( 146, 'link-ver-tudo-diversidade', true) ?>">
						<span class="desk">
							<?= get_post_meta( 152, 'texto-ver-mais-desk-diversidade', true) ?>
						</span>
						<span class="mob">
							<?= get_post_meta( 155, 'texto-ver-mais-mob-diversidade', true) ?>
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
						'category_name' => get_post_meta( 150, 'categoria-diversidade', true),
					);
					
					$loop = new WP_Query( $args );
					if( $loop->have_posts() ) { 
						while( $loop-> have_posts()) {
							$loop-> the_post();
							$post = get_post();
							$id_post = $post->ID;
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

							<p class="nome-autor">
								<a href="<?= get_home_url().'/'.$autor_formatted; ?>">
									<?php the_author(); ?>
								</a>
							</p>
						</div>
						<a href="<?php the_permalink() ?>" class="ler-tudo"><?= get_post_meta( 156, 'texto-ler-mais-diversidade', true) ?></a>
					</div>
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
						'category_name' => get_post_meta( 150, 'categoria-diversidade', true),
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
						<div class="image-mob">
							<?php the_post_thumbnail('banner-370x160');?>

							<div class="box-title">
								<h3 class="title-post">
									<?php the_title(); ?>
								</h3>
							</div>
						</div>
					</a>
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

<?php 
	$js_escolhido = 'home';
	require_once('footer.php');
?>