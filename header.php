<?php?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php $home = get_template_directory_uri(); ?>
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<link rel="stylesheet" href="<?= $home; ?>/src/build/css/index.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
</head>

<body>
	<header class="header">
		<div class="container">
			<a href="/">
				<div class="logo">
					<img src="<?= $home; ?>/src/images/logo-3.jpg" alt="">
				</div>
			</a>
			<div class="menu">
				<ul>
					<li><a href="/#servicos">Serviços</a></li>
					<li><a href="/#portfolio">Portfólio</a></li>
					<li><a href="/#empresa">Empresa</a></li>
					<li><a href="/#blog">Blog</a></li>
					<li><a href="/#contato">Contato</a></li>
				</ul>
			</div>
			<div class="redes-sociais">
				<ul>
					<li class="face">
						<a href="">
							<img src="<?= $home; ?>/src/images/facebook.svg" title="Facebook" alt="Facebook">
						</a>
					</li>
					<li class="insta">
						<a href="">
							<img src="<?= $home; ?>/src/images/instagram.svg" title="Instagram" alt="Instagram">
						</a>
					</li>
					<li class="linkedin">
						<a href="">
							<img src="<?= $home; ?>/src/images/linkedin.svg" title="LinkedIn" alt="LinkedIn">
						</a>
					</li>
					<li class="whats">
						<a href="">
							<img src="<?= $home; ?>/src/images/whatsapp.svg" title="WhatsApp" alt="WhatsApp">
						</a>
					</li>
				</ul>
			</div>
			<div class="menu-mob">
				<img src="<?= $home; ?>/src/images/bars.svg" alt="Menu mobile" class="icon">
			</div>

			<div class="content-menu">
				<div class="close">
					<img src="<?= $home; ?>/src/images/times.svg?v=1" alt="Fechar">
				</div>
				<div class="menu">
					<ul>
						<li><a href="/#servicos">Serviços</a></li>
						<li><a href="/#portfolio">Portfólio</a></li>
						<li><a href="/#empresa">Empresa</a></li>
						<li><a href="/#blog">Blog</a></li>
						<li><a href="/#contato">Contato</a></li>
					</ul>
				</div>
				<div class="redes-sociais">
					<ul>
						<li class="face">
							<a href="">
								<img src="<?= $home; ?>/src/images/facebook.svg" title="Facebook" alt="Facebook">
							</a>
						</li>
						<li class="insta">
							<a href="">
								<img src="<?= $home; ?>/src/images/instagram.svg" title="Instagram" alt="Instagram">
							</a>
						</li>
						<li class="linkedin">
							<a href="">
								<img src="<?= $home; ?>/src/images/linkedin.svg" title="LinkedIn" alt="LinkedIn">
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>

