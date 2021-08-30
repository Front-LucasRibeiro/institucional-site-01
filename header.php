<!doctype html>
<html>
<head>
	<?php $home = get_template_directory_uri(); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="adopt-website-id" content="ec86716e-b974-4e95-9e02-f21d94088a56" />
	<meta property="og:locale" content="pt_BR">
	<meta property="og:url" content="https://www.pitinews.com.br<?php echo $_SERVER['REQUEST_URI']; ?>">
	<?php 		
	if(is_home()){?>
	<meta property="og:title" content="Pitinews">
	<?php }	else { ?>
	<meta property="og:title" content="<?php the_title(); ?> | Pitinews"> 
	<?php } ?>
	<?php 
	if($has_thumbnail){?>
	<meta property="og:image" content="<?php echo $post_thumb_url ?>"> 
	<meta property="og:description" content="<?php echo $post_resumo ?>"> 
	<?php }
	else { ?>
	<meta property="og:image" content="https://www.pitinews.com.br/wp-content/uploads/2021/06/opengraph-pitinews.png"> 
	<meta property="og:description" content="Somos um canal de notícias focado em entretenimento. Séries, filmes, anime, críticas, e muito conteúdo sobre o mundo de cultura pop.">
	<?php } ?>

	<meta property="og:site_name" content="Pitinews">


	<meta property="og:image:type" content="image/png">
	<meta property="og:image:width" content="200">
	<meta property="og:image:height" content="200">
	<meta property="og:type" content="website">

	<title>
		<?php 		
			if($has_title){
				echo $titlePage;
		?>
		<?php	}	else { ?>
			<?php get_titulo(); ?>
		<?php } ?>
	</title>

	<link rel="shortcut icon" sizes="512x512" href="/wp-content/themes/pitinews/assets/imagens/favicon.png">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="<?= $home ?>/assets/css/lib/slick.css">

	<?php 		
		if($has_reset_css){
	?>
		<link rel="stylesheet" href="<?= $home ?>/assets/css/reset.css">
	<?php	}	?>
	<link rel="stylesheet" href="<?= $home; ?>/assets/css/comum.css">
	<link rel="stylesheet" href="<?= $home; ?>/assets/css/header.css">
	<link rel="stylesheet" href="<?= $home; ?>/assets/css/footer.css">
	<link rel="stylesheet" href="<?= $home; ?>/assets/css/page.css">

	<link rel="stylesheet" href="<?= $home; ?>/assets/css/<?= $css_escolhido; ?>.css">

	<!-- style default wp  -->
	<link rel="stylesheet" href="<?= $home ?>/style.css">

	<!-- google adsense -->
	<!-- <script data-ad-client="ca-pub-6636390705016140" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->

	<!-- GA  -->
	<!-- Global site tag (gtag.js) - Google Analytics PITINEWS-->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-WKKJJZJT9D"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-WKKJJZJT9D');
	</script>
	<script src="//tag.goadopt.io/injector.js?website_code=ec86716e-b974-4e95-9e02-f21d94088a56" class="adopt-injector"></script>
	<script>window.adoptHideAfterConsent = true;</script>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-T6RL6LC');</script>
	<!-- End Google Tag Manager -->
</head>
<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T6RL6LC"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
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
			<div class="gcse-search"></div>
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
