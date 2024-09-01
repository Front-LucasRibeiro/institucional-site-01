<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php $home = get_template_directory_uri(); ?>
<link rel="stylesheet" href="<?= $home; ?>/src/build/css/index.css?v=32" type="text/css" />
<?php 
if ( apply_filters( 'astra_header_profile_gmpg_link', true ) ) {
	?>
	 <link rel="profile" href="https://gmpg.org/xfn/11"> 
	 <?php
} 
?>
<?php wp_head(); ?>
<?php astra_head_bottom(); ?>

	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
</head>

<body>
	<header class="header">
		<div class="container">
			<div class="logo">
				<img src="<?= $home; ?>/src/images/Logo_Site.png" alt="">
			</div>
			<div class="menu">
				<ul>
					<li><a href="">Serviços</a></li>
					<li><a href="">Portfólio</a></li>
					<li><a href="">Empresa</a></li>
					<li><a href="">Blog</a></li>
					<li><a href="">Contato</a></li>
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
			<div class="menu-mob">
				<img src="<?= $home; ?>/src/images/bars.svg" alt="Menu mobile" class="icon">
			</div>

			<div class="content-menu">
				<div class="close">
					<img src="<?= $home; ?>/src/images/times.svg?v=1" alt="Fechar">
				</div>
				<div class="menu">
					<ul>
						<li><a href="">Serviços</a></li>
						<li><a href="">Portfólio</a></li>
						<li><a href="">Empresa</a></li>
						<li><a href="">Blog</a></li>
						<li><a href="">Contato</a></li>
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

