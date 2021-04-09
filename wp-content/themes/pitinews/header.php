<!doctype html>
<html>
<head>
	<?php $home = get_template_directory_uri(); ?>
	<meta charset="utf-8">
	<title>
		<?php get_titulo(); ?>
	</title>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?= $home ?>/assets/css/reset.css">
	<link rel="stylesheet" href="<?= $home; ?>/assets/css/comum.css">
	<link rel="stylesheet" href="<?= $home; ?>/assets/css/header.css">

	<link rel="stylesheet" href="<?= $home; ?>/assets/css/<?= $css_escolhido; ?>.css">
</head>
<body>

<header>
	<div class="container">
		<?php
			$args = array( 'theme_location' => 'header-menu');
			wp_nav_menu( $args ); 
		?>

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
</header>