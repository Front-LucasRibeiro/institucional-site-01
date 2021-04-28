<!doctype html>
<html>
<head>
	<?php $home = get_template_directory_uri(); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php get_titulo(); ?>
	</title>

	<link rel="shortcut icon" sizes="57x57" href="/wp-content/uploads/2021/04/apple-icon-57x57-1.png">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="<?= $home ?>/assets/css/lib/slick.css">

	<link rel="stylesheet" href="<?= $home ?>/assets/css/reset.css">
	<link rel="stylesheet" href="<?= $home; ?>/assets/css/comum.css">
	<link rel="stylesheet" href="<?= $home; ?>/assets/css/header.css">

	<link rel="stylesheet" href="<?= $home; ?>/assets/css/<?= $css_escolhido; ?>.css">

	<!-- google adsense -->
	<script data-ad-client="ca-pub-6636390705016140" async src=https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js></script>
</head>
<body>

<header>
	<div class="container">
		<div class="content-header">
			<div class="menu-mob">
				<span class="close"></span>
				<span class="menu"></span>
			</div>

			<?php
				the_custom_logo();
				$args = array( 'theme_location' => 'header-menu');
				wp_nav_menu( $args ); 
			?>
		</div>

		<div class="box-search-buttons">
			<span class="close"></span>
			<span class="search"></span>
		</div>

		<div class="wrapper-busca">
			<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="search" class="search-field" placeholder="Faça sua busca" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x ( 'Search for:', 'label'); ?>" autocomplete="off" />
					<button type="submit" class="search-submit"></button>
			</form>
		</div>

	</div>

	<div class="menu-content-mob">
		<div class="container">
			<?php
				$args = array( 'theme_location' => 'header-menu');
				wp_nav_menu( $args ); 
			?>

			<div class="box-app">
				<a href="<?= get_post_meta( 15, 'link_baixe_app', true) ?>" class="btn-baixe-app">Baixe o app</a>

				<div class="wrapper-btn">
					<a href="<?= get_post_meta( 6, 'link_app_store', true) ?>" class="btn btn-app-store">
						<span class="icon"></span>
						<p>Disponível na <span>App Store</span></p>
					</a>
					<a href="<?= get_post_meta( 5, 'link_google_play', true) ?>" class="btn btn-app-google-play">
						<span class="icon"></span>
						<p>Disponível na <span>Google Play</span></p>
					</a>
				</div>
			</div>
		</div>
	</div>
</header>