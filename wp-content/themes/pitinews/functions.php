<?php

add_theme_support('post-thumbnails');
add_theme_support( 'custom-logo', array(
    'height' => 38,
    'width'  => 170,
) );


add_image_size('banner-370x370', 370, 370, true);
add_image_size('banner-570x400', 570, 400, true);
add_image_size('banner-220x243', 220, 243, true);
add_image_size('banner-170x119', 170, 119, true);
add_image_size('banner-67x67', 67, 67, true);



/* Registrando menu de navegação */
function registrar_menu_navegacao() {
	register_nav_menu('header-menu', 'Menu Header');
}
add_action( 'init', 'registrar_menu_navegacao');

function get_titulo() {
	if( is_home() ) {
		bloginfo('name');
	} else {
		bloginfo('name');
		echo ' | ';
		the_title();
	}
}


//Posts Type
function meus_posts_type(){
	register_post_type('home_slide_principal',
		array(
			'labels'         => array(
				'name'         => __('Home - Slide Principal'),
				'singular_name' => __('Slide')
			),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-buddicons-buddypress-logo',
			'supports'    => array('title','editor', 'thumbnail'),
		) 
	);

	register_post_type('bg_slide_principal',
		array(
			'labels'         => array(
				'name'         => __('Home - Fundo Topo'),
				'singular_name' => __('Home - Fundo Topo')
			),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-buddicons-buddypress-logo',
			'supports'    => array('title', 'thumbnail'),
		) 
	);

	register_post_type('box_app_mob',
		array(
			'labels'         => array(
				'name'         => __('Box - Links App'),
				'singular_name' => __('Box - Links App')
			),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-buddicons-buddypress-logo',
			'supports'    => array('title'),
		) 
	);

	register_post_type('cores_categorias',
		array(
			'labels'         => array(
				'name'         => __('Cores - Categorias'),
				'singular_name' => __('Cores - Categorias')
			),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-buddicons-buddypress-logo',
			'supports'    => array('title'),
		) 
	);

	register_post_type('title_section',
		array(
			'labels'         => array(
				'name'         => __('Títulos - Seções'),
				'singular_name' => __('Títulos - Seções')
			),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-buddicons-buddypress-logo',
			'supports'    => array('title'),
		) 
	);

	register_post_type('home_list_category',
		array(
			'labels'         => array(
				'name'         => __('Seção Categorias'),
				'singular_name' => __('Seção Categorias')
			),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-buddicons-buddypress-logo',
			'supports'    => array('title', 'thumbnail'),
		) 
	);
}
add_action( 'init', 'meus_posts_type' );


// Callback
function pn_funcao_callback_box_app_mob(){
	$linkGooglePlay= get_post_meta( 5, 'link_google_play', true);
	$linkAppStore = get_post_meta( 6, 'link_app_store', true);
	$linkBaixeApp= get_post_meta( 15, 'link_baixe_app', true);

	?>

	<style>
			textarea,
			input{
				width: 100%;
				margin-top: 5px;
			}

			label{
				font-weight: bold;
			}

			.field{
				margin: 12px 0;
			}
		</style>

	<div class="box">
		<div class="field">
			<label for="link_google_play">Link Google Play</label>
			<input type="text" id="link_google_play" name="link_google_play" value="<?= $linkGooglePlay; ?>" />
		</div>

		<div class="field">
			<label for="link_app_store">Link App Store</label>
			<input type="text" id="link_app_store" name="link_app_store" value="<?= $linkAppStore; ?>" />
		</div>

		<div class="field">
			<label for="link_baixe_app">Link Baixe o App</label>
			<input type="text" id="link_baixe_app" name="link_baixe_app" value="<?= $linkBaixeApp; ?>" />
		</div>
	</div>
	
	<?php
}

function pn_funcao_callback_slide_principal_mob(){
		$post = get_post();
		$id_post = $post->ID;

		$imageMob= get_post_meta( $id_post, 'image_slide_mob', true);
	?>

	<style>
			textarea,
			input{
				width: 100%;
				margin-top: 5px;
			}

			label{
				font-weight: bold;
			}

			.field{
				margin: 12px 0;
			}
		</style>

	<div class="box">
		<div class="field">
			<label for="image_slide_mob">Link da imagem mobile</label>
			<input type="text" id="image_slide_mob" name="image_slide_mob" value="<?= $imageMob; ?>" />
		</div>
	</div>
	
	<?php
}

function pn_funcao_callback_category_color(){
		$categoryColor= get_post_meta( 99, 'category-color', true);
	?>

	<style>
		textarea,
		input{
			width: 100%;
			margin-top: 5px;
		}

		label{
			font-weight: bold;
		}

		.field{
			margin: 12px 0;
		}
	</style>

	<div class="box">
		<div class="field">
			<label for="category-color">Configurações de cores das categorias ( formato JSON )</label>
			<a href="https://jsonformatter.curiousconcept.com/" target="_blank">Ferramenta para validar JSON</a>
			<textarea name="category-color" id="category-color" cols="30" rows="10"><?= $categoryColor; ?></textarea>
		</div>
	</div>
	
	<?php
}

function pn_funcao_callback_title_section(){
		$title1= get_post_meta( 100, 'title-ultimas-noticias', true);
		$title2= get_post_meta( 101, 'title-categorias', true);
		$title3= get_post_meta( 103, 'title-ultimas-noticias-mob', true);
		$title4= get_post_meta( 104, 'link-veja-mais', true);
		
		$title5= get_post_meta( 105, 'title-item-1', true);
		$title6= get_post_meta( 106, 'icon-item-1', true);
		$title7= get_post_meta( 107, 'cor-item-1', true);
		$title8= get_post_meta( 108, 'link-veja-mais-item-1', true);
		$title9= get_post_meta( 112, 'icone-veja-mais-item-1', true);
		$title10= get_post_meta( 113, 'categoria-item-1', true);

		$title11= get_post_meta( 115, 'cor-item-2', true);
		$title12= get_post_meta( 116, 'link-veja-mais-item-2', true);
		$title13= get_post_meta( 117, 'icone-veja-mais-item-2', true);
		$title14= get_post_meta( 119, 'categoria-item-2', true);
		$title15= get_post_meta( 118, 'icon-item-2', true);
		$title16= get_post_meta( 114, 'title-item-2', true);


		$title17= get_post_meta( 120, 'cor-item-3', true);
		$title18= get_post_meta( 123, 'link-veja-mais-item-3', true);
		$title19= get_post_meta( 124, 'icone-veja-mais-item-3', true);
		$title20= get_post_meta( 125, 'categoria-item-3', true);
		$title21= get_post_meta( 121, 'icon-item-3', true);
		$title22= get_post_meta( 122, 'title-item-3', true);


		$title23= get_post_meta( 126, 'cor-item-4', true);
		$title24= get_post_meta( 128, 'link-veja-mais-item-4', true);
		$title25= get_post_meta( 129, 'icone-veja-mais-item-4', true);
		$title26= get_post_meta( 130, 'categoria-item-4', true);
		$title27= get_post_meta( 127, 'icon-item-4', true);
		$title28= get_post_meta( 131, 'title-item-4', true);
	?>

	<style>
		textarea,
		input{
			width: 100%;
			margin-top: 5px;
		}

		label{
			font-weight: bold;
		}

		.field{
			margin: 12px 0;
		}
	</style>

	<div class="box">
		<div class="field">
			<label for="title-ultimas-noticias">Título Últimas notícias</label>
			<input type="text" id="title-ultimas-noticias" name="title-ultimas-noticias" value="<?= $title1; ?>" />
		</div>
		<div class="field">
			<label for="title-ultimas-noticias-mob">Título Últimas notícias mobile</label>
			<input type="text" id="title-ultimas-noticias-mob" name="title-ultimas-noticias-mob" value="<?= $title3; ?>" />
		</div>
		<div class="field">
			<label for="link-veja-mais">Link veja mais</label>
			<input type="text" id="link-veja-mais" name="link-veja-mais" value="<?= $title4; ?>" />
		</div>
		<div class="field">
			<label for="title-categorias">Título Categorias</label>
			<input type="text" id="title-categorias" name="title-categorias" value="<?= $title2; ?>" />
		</div>


		<div class="field">
			<label for="title-item-1">Título 1 Seção Posts por Categoria</label>
			<input type="text" id="title-item-1" name="title-item-1" value="<?= $title5; ?>" />
		</div>
		<div class="field">
			<label for="icon-item-1">Link ícone 1 Seção Posts por Categoria</label>
			<input type="text" id="icon-item-1" name="icon-item-1" value="<?= $title6; ?>" />
		</div>
		<div class="field">
			<label for="cor-item-1">Cor 1 Seção Posts por Categoria</label>
			<input type="text" id="cor-item-1" name="cor-item-1" value="<?= $title7; ?>" />
		</div>
		<div class="field">
			<label for="link-veja-mais-item-1">Link Veja Mais 1 Seção Posts por Categoria</label>
			<input type="text" id="link-veja-mais-item-1" name="link-veja-mais-item-1" value="<?= $title8; ?>" />
		</div>
		<div class="field">
			<label for="icone-veja-mais-item-1">Ícone Veja Mais 1 Seção Posts por Categoria</label>
			<input type="text" id="icone-veja-mais-item-1" name="icone-veja-mais-item-1" value="<?= $title9; ?>" />
		</div>
		<div class="field">
			<label for="categoria-item-1">Slug da Categoria 1 Seção Posts por Categoria</label>
			<input type="text" id="categoria-item-1" name="categoria-item-1" value="<?= $title10; ?>" />
		</div>


		<div class="field">
			<label for="title-item-2">Título 2 Seção Posts por Categoria</label>
			<input type="text" id="title-item-2" name="title-item-2" value="<?= $title16; ?>" />
		</div>
		<div class="field">
			<label for="icon-item-2">Link ícone 2 Seção Posts por Categoria</label>
			<input type="text" id="icon-item-2" name="icon-item-2" value="<?= $title15; ?>" />
		</div>
		<div class="field">
			<label for="cor-item-2">Cor 2 Seção Posts por Categoria</label>
			<input type="text" id="cor-item-2" name="cor-item-2" value="<?= $title11; ?>" />
		</div>
		<div class="field">
			<label for="link-veja-mais-item-2">Link Veja Mais 2 Seção Posts por Categoria</label>
			<input type="text" id="link-veja-mais-item-2" name="link-veja-mais-item-2" value="<?= $title12; ?>" />
		</div>
		<div class="field">
			<label for="icone-veja-mais-item-2">Ícone Veja Mais 2 Seção Posts por Categoria</label>
			<input type="text" id="icone-veja-mais-item-2" name="icone-veja-mais-item-2" value="<?= $title13; ?>" />
		</div>
		<div class="field">
			<label for="categoria-item-2">Slug da Categoria 2 Seção Posts por Categoria</label>
			<input type="text" id="categoria-item-2" name="categoria-item-2" value="<?= $title14; ?>" />
		</div>


		<div class="field">
			<label for="title-item-3">Título 3 Seção Posts por Categoria</label>
			<input type="text" id="title-item-3" name="title-item-3" value="<?= $title22; ?>" />
		</div>
		<div class="field">
			<label for="icon-item-3">Link ícone 3 Seção Posts por Categoria</label>
			<input type="text" id="icon-item-3" name="icon-item-3" value="<?= $title21; ?>" />
		</div>
		<div class="field">
			<label for="cor-item-3">Cor 3 Seção Posts por Categoria</label>
			<input type="text" id="cor-item-3" name="cor-item-3" value="<?= $title17; ?>" />
		</div>
		<div class="field">
			<label for="link-veja-mais-item-3">Link Veja Mais 3 Seção Posts por Categoria</label>
			<input type="text" id="link-veja-mais-item-3" name="link-veja-mais-item-3" value="<?= $title18; ?>" />
		</div>
		<div class="field">
			<label for="icone-veja-mais-item-3">Ícone Veja Mais 3 Seção Posts por Categoria</label>
			<input type="text" id="icone-veja-mais-item-3" name="icone-veja-mais-item-3" value="<?= $title19; ?>" />
		</div>
		<div class="field">
			<label for="categoria-item-3">Slug da Categoria 3 Seção Posts por Categoria</label>
			<input type="text" id="categoria-item-3" name="categoria-item-3" value="<?= $title20; ?>" />
		</div>


		<div class="field">
			<label for="title-item-4">Título 4 Seção Posts por Categoria</label>
			<input type="text" id="title-item-4" name="title-item-4" value="<?= $title28; ?>" />
		</div>
		<div class="field">
			<label for="icon-item-4">Link ícone 4 Seção Posts por Categoria</label>
			<input type="text" id="icon-item-4" name="icon-item-4" value="<?= $title27; ?>" />
		</div>
		<div class="field">
			<label for="cor-item-4">Cor 4 Seção Posts por Categoria</label>
			<input type="text" id="cor-item-4" name="cor-item-4" value="<?= $title23; ?>" />
		</div>
		<div class="field">
			<label for="link-veja-mais-item-4">Link Veja Mais 4 Seção Posts por Categoria</label>
			<input type="text" id="link-veja-mais-item-4" name="link-veja-mais-item-4" value="<?= $title24; ?>" />
		</div>
		<div class="field">
			<label for="icone-veja-mais-item-4">Ícone Veja Mais 4 Seção Posts por Categoria</label>
			<input type="text" id="icone-veja-mais-item-4" name="icone-veja-mais-item-4" value="<?= $title25; ?>" />
		</div>
		<div class="field">
			<label for="categoria-item-4">Slug da Categoria 4 Seção Posts por Categoria</label>
			<input type="text" id="categoria-item-4" name="categoria-item-4" value="<?= $title26; ?>" />
		</div>
		
	</div>
	
	<?php
}


function pn_funcao_callback_border_section_category(){
		$post = get_post();
		$id_post = $post->ID;

		$borderCategory= get_post_meta( $id_post, 'border-color-category', true);
		$linkCategory= get_post_meta( $id_post, 'link-category', true);
	?>

	<style>
		textarea,
		input{
			width: 100%;
			margin-top: 5px;
		}

		label{
			font-weight: bold;
		}

		.field{
			margin: 12px 0;
		}
	</style>

	<div class="box">
		<div class="field">
			<label for="border-color-category">Cor da borda</label>
			<input type="text" id="border-color-category" name="border-color-category" value="<?= $borderCategory; ?>" />
		</div>
		<div class="field">
			<label for="link-category">Link da categoria</label>
			<input type="text" id="link-category" name="link-category" value="<?= $linkCategory; ?>" />
		</div>
	</div>
	
	<?php
}



// Metabox
function pitinews_registrando_metabox(){
	add_meta_box(
		'pn_links_app',
		'Links App Mobile',
		'pn_funcao_callback_box_app_mob',
		'box_app_mob'
	);
	add_meta_box(
		'pn_slide_principal_mob',
		'Slide Principal Mob',
		'pn_funcao_callback_slide_principal_mob',
		'home_slide_principal'
	);
	add_meta_box(
		'pn_cores_categorias',
		'Cores Categorias',
		'pn_funcao_callback_category_color',
		'cores_categorias'
	);
	add_meta_box(
		'pn_title_section',
		'Título das Seções',
		'pn_funcao_callback_title_section',
		'title_section'
	);
	add_meta_box(
		'pn_border_section_category',
		'Border Seção Categorias',
		'pn_funcao_callback_border_section_category',
		'home_list_category'
	);
}
add_action('add_meta_boxes', 'pitinews_registrando_metabox');


//Atualiza Metabox
function atualiza_meta_info() { 
	$post = get_post();
  $id_post = $post->ID;

	if( isset($_POST['link_google_play'])){
		update_post_meta( 5, 'link_google_play', sanitize_text_field($_POST['link_google_play']) );
	}
	if( isset($_POST['link_app_store'])){
		update_post_meta( 6, 'link_app_store', sanitize_text_field($_POST['link_app_store']) );
	}
	if( isset($_POST['link_baixe_app'])){
		update_post_meta( 15, 'link_baixe_app', sanitize_text_field($_POST['link_baixe_app']) );
	}
	if( isset($_POST['image_slide_mob'])){
		update_post_meta( $id_post, 'image_slide_mob', sanitize_text_field($_POST['image_slide_mob']) );
	}
	if( isset($_POST['category-color'])){
		update_post_meta( 99, 'category-color', sanitize_text_field($_POST['category-color']) );
	}
	if( isset($_POST['title-ultimas-noticias'])){
		update_post_meta( 100, 'title-ultimas-noticias', sanitize_text_field($_POST['title-ultimas-noticias']) );
	}
	if( isset($_POST['title-categorias'])){
		update_post_meta( 101, 'title-categorias', sanitize_text_field($_POST['title-categorias']) );
	}
	if( isset($_POST['title-ultimas-noticias-mob'])){
		update_post_meta( 103, 'title-ultimas-noticias-mob', sanitize_text_field($_POST['title-ultimas-noticias-mob']) );
	}
	if( isset($_POST['link-veja-mais'])){
		update_post_meta( 104, 'link-veja-mais', sanitize_text_field($_POST['link-veja-mais']) );
	}


	if( isset($_POST['title-item-1'])){
		update_post_meta( 105, 'title-item-1', sanitize_text_field($_POST['title-item-1']) );
	}
	if( isset($_POST['icon-item-1'])){
		update_post_meta( 106, 'icon-item-1', sanitize_text_field($_POST['icon-item-1']) );
	}
	if( isset($_POST['cor-item-1'])){
		update_post_meta( 107, 'cor-item-1', sanitize_text_field($_POST['cor-item-1']) );
	}
	if( isset($_POST['link-veja-mais-item-1'])){
		update_post_meta( 108, 'link-veja-mais-item-1', sanitize_text_field($_POST['link-veja-mais-item-1']) );
	}
	if( isset($_POST['icone-veja-mais-item-1'])){
		update_post_meta( 112, 'icone-veja-mais-item-1', sanitize_text_field($_POST['icone-veja-mais-item-1']) );
	}
	if( isset($_POST['categoria-item-1'])){
		update_post_meta( 113, 'categoria-item-1', sanitize_text_field($_POST['categoria-item-1']) );
	}


	if( isset($_POST['title-item-2'])){
		update_post_meta( 114, 'title-item-2', sanitize_text_field($_POST['title-item-2']) );
	}
	if( isset($_POST['icon-item-2'])){
		update_post_meta( 118, 'icon-item-2', sanitize_text_field($_POST['icon-item-2']) );
	}
	if( isset($_POST['cor-item-2'])){
		update_post_meta( 115, 'cor-item-2', sanitize_text_field($_POST['cor-item-2']) );
	}
	if( isset($_POST['link-veja-mais-item-2'])){
		update_post_meta( 116, 'link-veja-mais-item-2', sanitize_text_field($_POST['link-veja-mais-item-2']) );
	}
	if( isset($_POST['icone-veja-mais-item-2'])){
		update_post_meta( 117, 'icone-veja-mais-item-2', sanitize_text_field($_POST['icone-veja-mais-item-2']) );
	}
	if( isset($_POST['categoria-item-2'])){
		update_post_meta( 119, 'categoria-item-2', sanitize_text_field($_POST['categoria-item-2']) );
	}


	if( isset($_POST['title-item-3'])){
		update_post_meta( 122, 'title-item-3', sanitize_text_field($_POST['title-item-3']) );
	}
	if( isset($_POST['icon-item-3'])){
		update_post_meta( 121, 'icon-item-3', sanitize_text_field($_POST['icon-item-3']) );
	}
	if( isset($_POST['cor-item-3'])){
		update_post_meta( 120, 'cor-item-3', sanitize_text_field($_POST['cor-item-3']) );
	}
	if( isset($_POST['link-veja-mais-item-3'])){
		update_post_meta( 123, 'link-veja-mais-item-3', sanitize_text_field($_POST['link-veja-mais-item-3']) );
	}
	if( isset($_POST['icone-veja-mais-item-3'])){
		update_post_meta( 124, 'icone-veja-mais-item-3', sanitize_text_field($_POST['icone-veja-mais-item-3']) );
	}
	if( isset($_POST['categoria-item-3'])){
		update_post_meta( 125, 'categoria-item-3', sanitize_text_field($_POST['categoria-item-3']) );
	}


	if( isset($_POST['title-item-4'])){
		update_post_meta( 131, 'title-item-4', sanitize_text_field($_POST['title-item-4']) );
	}
	if( isset($_POST['icon-item-4'])){
		update_post_meta( 127, 'icon-item-4', sanitize_text_field($_POST['icon-item-4']) );
	}
	if( isset($_POST['cor-item-4'])){
		update_post_meta( 126, 'cor-item-4', sanitize_text_field($_POST['cor-item-4']) );
	}
	if( isset($_POST['link-veja-mais-item-4'])){
		update_post_meta( 128, 'link-veja-mais-item-4', sanitize_text_field($_POST['link-veja-mais-item-4']) );
	}
	if( isset($_POST['icone-veja-mais-item-4'])){
		update_post_meta( 129, 'icone-veja-mais-item-4', sanitize_text_field($_POST['icone-veja-mais-item-4']) );
	}
	if( isset($_POST['categoria-item-4'])){
		update_post_meta( 130, 'categoria-item-4', sanitize_text_field($_POST['categoria-item-4']) );
	}




	if( isset($_POST['link-category'])){
		update_post_meta( $id_post, 'link-category', sanitize_text_field($_POST['link-category']) );
	}
	
	if( isset($_POST['border-color-category'])){
		update_post_meta( $id_post, 'border-color-category', sanitize_text_field($_POST['border-color-category']) );
	}
}
add_action('save_post', 'atualiza_meta_info');

