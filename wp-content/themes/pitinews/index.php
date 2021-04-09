<?php
	$queryTaxonomy = array_key_exists('taxonomy', $_GET);
	if( $queryTaxonomy && $_GET['taxonomy'] == '') {
		wp_redirect( home_url() );
		exit;
	}

	$css_escolhido = 'index';
	require_once('header.php');
?>




<?php get_footer(); ?>