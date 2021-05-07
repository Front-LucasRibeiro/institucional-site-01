<?php
add_theme_support('post-thumbnails');
add_theme_support( 'custom-logo', array(
    'height' => 38,
    'width'  => 170,
) );


add_image_size('banner-370x370', 370, 370, true);
add_image_size('imagem-autor-170x170', 170, 170, true);
add_image_size('banner-post-770x400', 770, 400, true);
add_image_size('banner-570x400', 570, 400, true);
add_image_size('banner-220x243', 220, 243, true);
add_image_size('banner-170x119', 170, 119, true);
add_image_size('banner-370x260', 370, 260, true);
add_image_size('banner-370x160', 370, 160, true);
add_image_size('banner-270x270-piticast', 270, 270, true);
add_image_size('banner-67x67', 67, 67, true);



/* Registrando menu de navegação */
function registrar_menu_navegacao() {
	register_nav_menu('header-menu', 'Menu Header');
	register_nav_menu('footer-menu-pitinews', 'Menu Footer Pitinews');
	register_nav_menu('footer-menu-categorias', 'Menu Footer Categorias');
	register_nav_menu('footer-menu-outros-canais', 'Menu Footer Outros-canais');
	register_nav_menu('footer-menu-outros-canais', 'Menu Footer Outros-canais');
	register_nav_menu('footer-menu-piticas', 'Menu Footer Piticas');
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
	register_post_type('footer',
		array(
			'labels'         => array(
				'name'         => __('Footer'),
				'singular_name' => __('Footer')
			),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-buddicons-buddypress-logo',
			'supports'    => array('title'),
		) 
	);

	register_post_type('loja_online',
		array(
			'labels'         => array(
				'name'         => __('Loja Online'),
				'singular_name' => __('Loja Online')
			),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-buddicons-buddypress-logo',
			'supports'    => array('title','editor', 'thumbnail'),
		) 
	);

	register_post_type('pitiplay',
		array(
			'labels'         => array(
				'name'         => __('Pitiplay'),
				'singular_name' => __('Pitiplay')
			),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-buddicons-buddypress-logo',
			'supports'    => array('title','editor'),
		) 
	);
	
	register_post_type('piticast',
		array(
			'labels'         => array(
				'name'         => __('Piticast'),
				'singular_name' => __('Piticast')
			),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-buddicons-buddypress-logo',
			'supports'    => array('title','editor', 'thumbnail'),
		) 
	);

	register_post_type('box_adsense',
		array(
			'labels'         => array(
				'name'         => __('Banners AdSense'),
				'singular_name' => __('Banners AdSense')
			),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-buddicons-buddypress-logo',
			'supports'    => array('title'),
		) 
	);

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
			<label for="image_slide_mob">Link da imagem mobile(480x600)</label>
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
			<textarea name="category-color" id="category-color" cols="30" rows="10"><?php echo htmlentities($categoryColor); ?></textarea>
		</div>
	</div>
	
	<?php
}

function pn_funcao_callback_title_section(){
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
		.wrapper-section{
			margin-bottom:42px
		}
	</style>

	<div class="box">

		<!-- start - seção últimas notícias -->
		<?php
			$title1= get_post_meta( 100, 'title-ultimas-noticias', true);
			$title3= get_post_meta( 103, 'title-ultimas-noticias-mob', true);
			$title4= get_post_meta( 104, 'link-veja-mais', true);
		?>
		<div class="wrapper-section">
			<div class="field">
				<label for="title-ultimas-noticias">Título Últimas notícias</label>
				<input type="text" id="title-ultimas-noticias" name="title-ultimas-noticias" value="<?= $title1; ?>" />
			</div>
			<div class="field">
				<label for="title-ultimas-noticias-mob">Título Últimas notícias mobile</label>
				<input type="text" id="title-ultimas-noticias-mob" name="title-ultimas-noticias-mob" value="<?= $title3; ?>" />
			</div>
			<div class="field">
				<label for="link-veja-mais">Link veja mais seção últimas notícias e seção categorias</label>
				<input type="text" id="link-veja-mais" name="link-veja-mais" value="<?= $title4; ?>" />
			</div>
		</div>
		<!-- end - seção últimas notícias -->


		<!-- start - seção categorias -->
		<?php
			$title2= get_post_meta( 101, 'title-categorias', true);
		?>
		<div class="wrapper-section">
			<div class="field">
				<label for="title-categorias">Título Categorias</label>
				<input type="text" id="title-categorias" name="title-categorias" value="<?= $title2; ?>" />
			</div>
		</div>
		<!-- end - seção categorias -->


		<!-- start - seção 1 posts por categoria -->
		<?php
			$title5= get_post_meta( 105, 'title-item-1', true);
			$title6= get_post_meta( 106, 'icon-item-1', true);
			$title7= get_post_meta( 107, 'cor-item-1', true);
			$title8= get_post_meta( 108, 'link-veja-mais-item-1', true);
			$title9= get_post_meta( 112, 'icone-veja-mais-item-1', true);
			$title10= get_post_meta( 113, 'categoria-item-1', true);
			$iconeDefaultCategory = get_post_meta( 245, 'icon-default-categoria', true);
		?>
		<div class="wrapper-section">
			<div class="field">
				<label for="icon-default-categoria">Ícone Default Categoria</label>
				<input type="text" id="icon-default-categoria" name="icon-default-categoria" value="<?= $iconeDefaultCategory; ?>" />
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
		</div>	
		<!-- end - seção 1 posts por categoria -->
		
		<!-- start - seção 2 posts por categoria -->
		<?php
			$title11= get_post_meta( 115, 'cor-item-2', true);
			$title12= get_post_meta( 116, 'link-veja-mais-item-2', true);
			$title13= get_post_meta( 117, 'icone-veja-mais-item-2', true);
			$title14= get_post_meta( 119, 'categoria-item-2', true);
			$title15= get_post_meta( 118, 'icon-item-2', true);
			$title16= get_post_meta( 114, 'title-item-2', true);
		?>
		<div class="wrapper-section">
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
		</div>	
		<!-- end - seção 2 posts por categoria -->
		
		<!-- start - seção 3 posts por categoria -->
		<?php
			$title17= get_post_meta( 120, 'cor-item-3', true);
			$title18= get_post_meta( 123, 'link-veja-mais-item-3', true);
			$title19= get_post_meta( 124, 'icone-veja-mais-item-3', true);
			$title20= get_post_meta( 125, 'categoria-item-3', true);
			$title21= get_post_meta( 121, 'icon-item-3', true);
			$title22= get_post_meta( 122, 'title-item-3', true);
		?>
		<div class="wrapper-section">
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
		</div>
		<!-- end - seção 3 posts por categoria -->
		
		<!-- start - seção 4 posts por categoria -->
		<?php
			$title23= get_post_meta( 126, 'cor-item-4', true);
			$title24= get_post_meta( 128, 'link-veja-mais-item-4', true);
			$title25= get_post_meta( 129, 'icone-veja-mais-item-4', true);
			$title26= get_post_meta( 130, 'categoria-item-4', true);
			$title27= get_post_meta( 127, 'icon-item-4', true);
			$title28= get_post_meta( 131, 'title-item-4', true);
		?>
		<div class="wrapper-section">
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
		<!-- end - seção 4 posts por categoria -->
		
		<!-- start - seção colunas -->
		<?php
			$title29= get_post_meta( 134, 'title-colunas', true);
			$title30= get_post_meta( 135, 'title-colunas-mob', true);
			$title31= get_post_meta( 136, 'link-ver-tudo', true);
			$title32= get_post_meta( 139, 'texto-ver-mais', true);
			$title33= get_post_meta( 138, 'texto-ver-mais-mob', true);
			$title34= get_post_meta( 141, 'texto-ler-mais-colunas', true);
			$title38= get_post_meta( 131, 'categoria-colunas', true);
		?>
		<div class="wrapper-section">
			<div class="field">
				<label for="title-colunas">Título seção colunas</label>
				<input type="text" id="title-colunas" name="title-colunas" value="<?= $title29; ?>" />
			</div>
			<div class="field">
				<label for="title-colunas-mob">Título seção colunas mobile</label>
				<input type="text" id="title-colunas-mob" name="title-colunas-mob" value="<?= $title30; ?>" />
			</div>
			<div class="field">
				<label for="link-ver-tudo">Link ver tudo seção colunas</label>
				<input type="text" id="link-ver-tudo" name="link-ver-tudo" value="<?= $title31; ?>" />
			</div>
			<div class="field">
				<label for="texto-ver-mais">Texto ver mais desktop seção colunas</label>
				<input type="text" id="texto-ver-mais" name="texto-ver-mais" value="<?= $title32; ?>" />
			</div>
			<div class="field">
				<label for="texto-ver-mais-mob">Texto ver mais mobile seção colunas</label>
				<input type="text" id="texto-ver-mais-mob" name="texto-ver-mais-mob" value="<?= $title33; ?>" />
			</div>
			<div class="field">
				<label for="texto-ler-mais-colunas">Texto ler mais seção colunas</label>
				<input type="text" id="texto-ler-mais-colunas" name="texto-ler-mais-colunas" value="<?= $title34; ?>" />
			</div>
			<div class="field">
				<label for="categoria-colunas">Slug da categoria seção colunas</label>
				<input type="text" id="categoria-colunas" name="categoria-colunas" value="<?= $title38; ?>" />
			</div>
		</div>
		<!-- end - seção colunas -->

		<!-- start - seção criticas -->
		<?php
			$title35= get_post_meta( 142, 'title-criticas', true);
			$title36= get_post_meta( 143, 'link-ver-mais-criticas', true);
			$title37= get_post_meta( 144, 'texto-ver-mais-mob-criticas', true);
			$title39= get_post_meta( 132, 'categoria-criticas', true);
		?>
		<div class="wrapper-section">
			<div class="field">
				<label for="categoria-criticas">Slug da categoria seção criticas</label>
				<input type="text" id="categoria-criticas" name="categoria-criticas" value="<?= $title39; ?>" />
			</div>
			<div class="field">
				<label for="title-criticas">Título seção críticas</label>
				<input type="text" id="title-criticas" name="title-criticas" value="<?= $title35; ?>" />
			</div>
			<div class="field">
				<label for="link-ver-mais-criticas">Link ver mais seção críticas</label>
				<input type="text" id="link-ver-mais-criticas" name="link-ver-mais-criticas" value="<?= $title36; ?>" />
			</div>
			<div class="field">
				<label for="texto-ver-mais-mob-criticas">Texto ver mais seção críticas</label>
				<input type="text" id="texto-ver-mais-mob-criticas" name="texto-ver-mais-mob-criticas" value="<?= $title37; ?>" />
			</div>
		</div>
		<!-- end - seção criticas -->

		<!-- start - seção diversidade -->
		<?php
			$title43= get_post_meta( 150, 'categoria-diversidade', true);
			$title44= get_post_meta( 154, 'title-diversidade', true);
			$title45= get_post_meta( 146, 'link-ver-tudo-diversidade', true);
			$title46= get_post_meta( 152, 'texto-ver-mais-desk-diversidade', true);
			$title47= get_post_meta( 155, 'texto-ver-mais-mob-diversidade', true);
			$title48= get_post_meta( 156, 'texto-ler-mais-diversidade', true);
		?>
		<div class="wrapper-section">
			<div class="field">
				<label for="categoria-diversidade">Slug da categoria seção diversidade</label>
				<input type="text" id="categoria-diversidade" name="categoria-diversidade" value="<?= $title43; ?>" />
			</div>
			<div class="field">
				<label for="title-diversidade">Título da seção diversidade</label>
				<input type="text" id="title-diversidade" name="title-diversidade" value="<?= $title44; ?>" />
			</div>
			<div class="field">
				<label for="link-ver-tudo-diversidade">Link ver mais seção diversidade</label>
				<input type="text" id="link-ver-tudo-diversidade" name="link-ver-tudo-diversidade" value="<?= $title45; ?>" />
			</div>
			<div class="field">
				<label for="texto-ver-mais-desk-diversidade">Texto ver mais desk da seção diversidade</label>
				<input type="text" id="texto-ver-mais-desk-diversidade" name="texto-ver-mais-desk-diversidade" value="<?= $title46; ?>" />
			</div>
			<div class="field">
				<label for="texto-ver-mais-mob-diversidade">Texto ver mais mob da seção diversidade</label>
				<input type="text" id="texto-ver-mais-mob-diversidade" name="texto-ver-mais-mob-diversidade" value="<?= $title47; ?>" />
			</div>
			<div class="field">
				<label for="texto-ler-mais-diversidade">Texto ler mais da seção diversidade</label>
				<input type="text" id="texto-ler-mais-diversidade" name="texto-ler-mais-diversidade" value="<?= $title48; ?>" />
			</div>
		</div>
		<!-- end - seção diversidade -->

		<!-- start - seção piticast -->
		<?php
			$title_piticast1= get_post_meta( 172, 'title-piticast', true);
			$title_piticast2= get_post_meta( 176, 'link-ver-tudo-piticast', true);
			$title_piticast3= get_post_meta( 174, 'texto-ver-mais-desk-piticast', true);
			$title_piticast4= get_post_meta( 178, 'texto-ver-mais-mob-piticast', true);
		?>
		<div class="wrapper-section">
			<div class="field">
				<label for="title-piticast">Título Seção Piticast(url da imagem) - Home</label>
				<input type="text" name="title-piticast" id="title-piticast" value="<?= $title_piticast1; ?>" />
			</div>
			<div class="field">
				<label for="link-ver-tudo-piticast">Link Ver Mais Piticast - Home</label>
				<input type="text" name="link-ver-tudo-piticast" id="link-ver-tudo-piticast" value="<?= $title_piticast2; ?>" />
			</div>
			<div class="field">
				<label for="texto-ver-mais-desk-piticast">Texto Ver Mais Piticast Desk - Home</label>
				<input type="text" name="texto-ver-mais-desk-piticast" id="texto-ver-mais-desk-piticast" value="<?= $title_piticast3; ?>" />
			</div>
			<div class="field">
				<label for="texto-ver-mais-mob-piticast">Texto Ver Mais Piticast Mobile - Home</label>
				<input type="text" name="texto-ver-mais-mob-piticast" id="texto-ver-mais-mob-piticast" value="<?= $title_piticast4; ?>" />
			</div>
		</div>
		<!-- end - seção piticast -->

		<!-- start - seção pitiplay -->
		<?php
			$title_pitiplay1= get_post_meta( 187, 'title-pitiplay', true);
			$title_pitiplay2= get_post_meta( 181, 'link-ver-tudo-pitiplay', true);
			$title_pitiplay3= get_post_meta( 185, 'texto-ver-mais-desk-pitiplay', true);
			$title_pitiplay4= get_post_meta( 183, 'texto-ver-mais-mob-pitiplay', true);
		?>
		<div class="wrapper-section">
			<div class="field">
				<label for="title-pitiplay">Título Seção Pitiplay(url da imagem) - Home</label>
				<input type="text" name="title-pitiplay" id="title-pitiplay" value="<?= $title_pitiplay1; ?>" />
			</div>
			<div class="field">
				<label for="link-ver-tudo-pitiplay">Link Ver Mais Pitiplay - Home</label>
				<input type="text" name="link-ver-tudo-pitiplay" id="link-ver-tudo-pitiplay" value="<?= $title_pitiplay2; ?>" />
			</div>
			<div class="field">
				<label for="texto-ver-mais-desk-pitiplay">Texto Ver Mais Pitiplay Desk - Home</label>
				<input type="text" name="texto-ver-mais-desk-pitiplay" id="texto-ver-mais-desk-pitiplay" value="<?= $title_pitiplay3; ?>" />
			</div>
			<div class="field">
				<label for="texto-ver-mais-mob-pitiplay">Texto Ver Mais Pitiplay Mobile - Home</label>
				<input type="text" name="texto-ver-mais-mob-pitiplay" id="texto-ver-mais-mob-pitiplay" value="<?= $title_pitiplay4; ?>" />
			</div>
		</div>
		<!-- end - seção pitiplay -->

		<!-- start - seção instagram -->
		<?php
			$title_insta1= get_post_meta( 189, 'title-instagram', true);
			$title_insta2= get_post_meta( 211, 'link-instagram', true);
		?>
		<div class="wrapper-section">
			<div class="field">
				<label for="title-instagram">Título Seção Instagram - Home</label>
				<input type="text" name="title-instagram" id="title-instagram" value="<?= $title_insta1; ?>" />
			</div>
			<div class="field">
				<label for="link-instagram">Link Instagram - Home</label>
				<input type="text" name="link-instagram" id="link-instagram" value="<?= $title_insta2; ?>" />
			</div>
		</div>
		<!-- end - seção instagram -->

		<!-- start - seção Loja Online -->
		<?php
			$titleLoja1= get_post_meta( 230, 'title-loja-online', true);
			$titleLoja2= get_post_meta( 212, 'link-ver-tudo-loja-online', true);
			$titleLoja3= get_post_meta( 281, 'texto-ver-mais-desk-loja-online', true);
			$titleLoja4= get_post_meta( 192, 'texto-ver-mais-mob-loja-online', true);
		?>
		<div class="wrapper-section">
			<div class="field">
				<label for="title-loja-online">Título Seção Loja Online - Home</label>
				<input type="text" name="title-loja-online" id="title-loja-online" value="<?= $titleLoja1; ?>" />
			</div> 
			<div class="field">
				<label for="link-ver-tudo-loja-online">Link ver mais seção Loja Online</label>
				<input type="text" id="link-ver-tudo-loja-online" name="link-ver-tudo-loja-online" value="<?= $titleLoja2; ?>" />
			</div>
			<div class="field">
				<label for="texto-ver-mais-desk-loja-online">Texto ver mais desk da seção Loja Online</label>
				<input type="text" id="texto-ver-mais-desk-loja-online" name="texto-ver-mais-desk-loja-online" value="<?= $titleLoja3; ?>" />
			</div>
			<div class="field">
				<label for="texto-ver-mais-mob-loja-online">Texto ver mais mob da seção Loja Online</label>
				<input type="text" id="texto-ver-mais-mob-loja-online" name="texto-ver-mais-mob-loja-online" value="<?= $titleLoja4; ?>" />
			</div>
		</div>
		<!-- end - seção Loja Online -->
		
	</div>
	
	<?php
}

function pn_funcao_callback_footer(){
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
		.wrapper-section{
			margin-bottom:42px
		}
	</style>

	<div class="box">
		<?php
			$item1= get_post_meta( 260, 'item1-footer', true);
		?>
		<div class="wrapper-section">
			<div class="field">
				<label for="item1-footer">Título Seção 1</label>
				<input type="text" id="item1-footer" name="item1-footer" value="<?= $item1; ?>" />
			</div>	
		</div>

		<?php
			$item5= get_post_meta( 271, 'item5-footer', true);
		?>
		<div class="wrapper-section">
			<div class="field">
				<label for="item5-footer">Título Seção 2</label>
				<input type="text" id="item5-footer" name="item5-footer" value="<?= $item5; ?>" />
			</div>	
		</div>

		<?php
			$item10= get_post_meta( 262, 'item10-footer', true);
		?>
		<div class="wrapper-section">
			<div class="field">
				<label for="item10-footer">Título Seção 3</label>
				<input type="text" id="item10-footer" name="item10-footer" value="<?= $item10; ?>" />
			</div>	
		</div>

		<?php
			$item13= get_post_meta( 272, 'item13-footer', true);
		?>
		<div class="wrapper-section">
			<div class="field">
				<label for="item13-footer">Título Seção 4</label>
				<input type="text" id="item13-footer" name="item13-footer" value="<?= $item13; ?>" />
			</div>	
		</div>

		<?php
			$link_face= get_post_meta( 210, 'link_face', true);
			$link_twitter= get_post_meta( 208, 'link_twitter', true);
			$link_instagram= get_post_meta( 209, 'link_instagram', true);
		?>
		<div class="wrapper-section">
			<div class="field">
				<label for="link_face">Link Facebook</label>
				<input type="text" id="link_face" name="link_face" value="<?= $link_face; ?>" />
			</div>	
			<div class="field">
				<label for="link_twitter">Link Twitter</label>
				<input type="text" id="link_twitter" name="link_twitter" value="<?= $link_twitter; ?>" />
			</div>	
			<div class="field">
				<label for="link_instagram">Link Instagram</label>
				<input type="text" id="link_instagram" name="link_instagram" value="<?= $link_instagram; ?>" />
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

function pn_funcao_callback_box_adsense(){
		$banner1= get_post_meta( 165, 'banner-adsense-home-topo', true);
		$banner2= get_post_meta( 170, 'banner-adsense-home-bottom', true);
		$banner3= get_post_meta( 240, 'banner-adsense-post-topo', true);
		$banner4= get_post_meta( 241, 'banner-adsense-post-lateral', true);
		$banner5= get_post_meta( 242, 'banner-destaque-post-lateral', true);
	?>

	<style>
		.field textarea {
			width: 100%;
			height: 174px;
			margin-top: 5px;
		}

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
			<label for="banner-adsense-home-topo">Banner AdSense - Home topo</label>
			<textarea name="banner-adsense-home-topo" id="banner-adsense-home-topo"><?= $banner1; ?></textarea>
		</div>
		<div class="field">
			<label for="banner-adsense-home-bottom">Banner AdSense - Home inferior</label>
			<textarea name="banner-adsense-home-bottom" id="banner-adsense-home-bottom"><?= $banner2; ?></textarea>
		</div>
		<div class="field">
			<label for="banner-adsense-post-topo">Banner AdSense - Post Topo</label>
			<textarea name="banner-adsense-post-topo" id="banner-adsense-post-topo"><?= $banner3; ?></textarea>
		</div>
		<div class="field">
			<label for="banner-adsense-post-lateral">Banner AdSense - Post Lateral</label>
			<textarea name="banner-adsense-post-lateral" id="banner-adsense-post-lateral"><?= $banner4; ?></textarea>
		</div>
		<div class="field">
			<label for="banner-destaque-post-lateral">Link Banner Destaque(370x500) - Post Lateral</label>
			<input name="banner-destaque-post-lateral" id="banner-destaque-post-lateral" value="<?= $banner5; ?>" />
		</div>
	</div>

	<?php
}

function pn_funcao_callback_piticast(){
		$post = get_post();
		$id_post = $post->ID;

		$field_piticast1= get_post_meta( $id_post, 'link-card-piticast', true);
		$field_piticast2= get_post_meta( $id_post, 'url-audio-piticast', true);
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
		.wrapper-section{
			margin-bottom:42px
		}
	</style>

	<div class="box">
		<div class="field">
			<label for="link-card-piticast">Link Externo Piticast - Home</label>
			<input type="text" name="link-card-piticast" id="link-card-piticast" value="<?= $field_piticast1; ?>" />
		</div>
		<div class="field">
			<label for="url-audio-piticast">Url Áudio Piticast(mp3) - Home</label>
			<input type="text" name="url-audio-piticast" id="url-audio-piticast" value="<?= $field_piticast2; ?>" />
		</div>
	</div>

	<?php
}

function pn_funcao_callback_pitiplay(){
		$post = get_post();
		$id_post = $post->ID;

		$field_pitiplay1= get_post_meta( $id_post, 'link-card-pitiplay', true);
		$field_pitiplay2= get_post_meta( $id_post, 'iframe-pitiplay', true);
	?>

	<style>
		textarea,
		input{
			width: 100%;
			margin-top: 5px;
		}

		textarea{
			height: 170px
		}

		label{
			font-weight: bold;
		}

		.field{
			margin: 12px 0;
		}
		.wrapper-section{
			margin-bottom:42px
		}
	</style>

	<div class="box">
		<div class="field">
			<label for="link-card-pitiplay">Link Externo Pitiplay - Home</label>
			<input type="text" name="link-card-pitiplay" id="link-card-pitiplay" value="<?= $field_pitiplay1; ?>" />
		</div>
		<div class="field">
			<label for="iframe-pitiplay">Iframe Pitiplay - Home</label>
			<textarea name="iframe-pitiplay" id="iframe-pitiplay"><?= $field_pitiplay2; ?></textarea>
		</div>
	</div>

	<?php
}

function pn_funcao_callback_loja_online(){
		$post = get_post();
		$id_post = $post->ID;

		$field_comprar= get_post_meta( $id_post, 'link-comprar-agora', true);
	?>

	<style>
		textarea,
		input{
			width: 100%;
			margin-top: 5px;
		}

		textarea{
			height: 170px
		}

		label{
			font-weight: bold;
		}

		.field{
			margin: 12px 0;
		}
		.wrapper-section{
			margin-bottom:42px
		}
	</style>

	<div class="box">
		<div class="field">
			<label for="link-comprar-agora">Link Comprar Agora - Loja Online</label>
			<input type="text" name="link-comprar-agora" id="link-comprar-agora" value="<?= $field_comprar; ?>" />
		</div>
	</div>
	
	<?php
}



// Metabox
function pitinews_registrando_metabox(){
	

	add_meta_box(
		'pn_footer',
		'Footer',
		'pn_funcao_callback_footer',
		'footer'
	);

	add_meta_box(
		'pn_loja_online',
		'Loja Online',
		'pn_funcao_callback_loja_online',
		'loja_online'
	);

	add_meta_box(
		'pn_pitiplay',
		'Pitiplay',
		'pn_funcao_callback_pitiplay',
		'pitiplay'
	);

	add_meta_box(
		'pn_piticast',
		'Piticast',
		'pn_funcao_callback_piticast',
		'piticast'
	);

	add_meta_box(
		'pn_box_adsense',
		'Box Banners AdSense',
		'pn_funcao_callback_box_adsense',
		'box_adsense'
	);

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

	// start seção footer
	if( isset($_POST['link_face'])){
		update_post_meta( 210, 'link_face', sanitize_text_field($_POST['link_face']) );
	}
	if( isset($_POST['link_twitter'])){
		update_post_meta( 208, 'link_twitter', sanitize_text_field($_POST['link_twitter']) );
	}
	if( isset($_POST['link_instagram'])){
		update_post_meta( 209, 'link_instagram', sanitize_text_field($_POST['link_instagram']) );
	}


	if( isset($_POST['item1-footer'])){
		update_post_meta( 260, 'item1-footer', sanitize_text_field($_POST['item1-footer']) );
	}
	if( isset($_POST['item5-footer'])){
		update_post_meta( 271, 'item5-footer', sanitize_text_field($_POST['item5-footer']) );
	}
	if( isset($_POST['item10-footer'])){
		update_post_meta( 262, 'item10-footer', sanitize_text_field($_POST['item10-footer']) );
	}
	if( isset($_POST['item13-footer'])){
		update_post_meta( 272, 'item13-footer', sanitize_text_field($_POST['item13-footer']) );
	}

	// end seção footer


	// start seção menu mobile Links 
	if( isset($_POST['link_google_play'])){
		update_post_meta( 5, 'link_google_play', sanitize_text_field($_POST['link_google_play']) );
	}
	if( isset($_POST['link_app_store'])){
		update_post_meta( 6, 'link_app_store', sanitize_text_field($_POST['link_app_store']) );
	}
	if( isset($_POST['link_baixe_app'])){
		update_post_meta( 15, 'link_baixe_app', sanitize_text_field($_POST['link_baixe_app']) );
	}
	// end seção menu mobile Links 


	// start seção slide home
	if( isset($_POST['image_slide_mob'])){
		update_post_meta( $id_post, 'image_slide_mob', sanitize_text_field($_POST['image_slide_mob']) );
	}
	// end seção slide home

	// start configuração cores das categorias
	if( isset($_POST['category-color'])){
		update_post_meta( 99, 'category-color', $_POST['category-color']);
	}
	// end configuração cores das categorias


	// start seção ultimas noticias
	if( isset($_POST['title-ultimas-noticias'])){
		update_post_meta( 100, 'title-ultimas-noticias', sanitize_text_field($_POST['title-ultimas-noticias']) );
	}
	if( isset($_POST['title-ultimas-noticias-mob'])){
		update_post_meta( 103, 'title-ultimas-noticias-mob', sanitize_text_field($_POST['title-ultimas-noticias-mob']) );
	}
	if( isset($_POST['link-veja-mais'])){
		update_post_meta( 104, 'link-veja-mais', sanitize_text_field($_POST['link-veja-mais']) );
	}
	if( isset($_POST['link-category'])){
		update_post_meta( $id_post, 'link-category', sanitize_text_field($_POST['link-category']) );
	}
	if( isset($_POST['border-color-category'])){
		update_post_meta( $id_post, 'border-color-category', sanitize_text_field($_POST['border-color-category']) );
	}
	// end seção ultimas noticias


	// start seção categorias
	if( isset($_POST['title-categorias'])){
		update_post_meta( 101, 'title-categorias', sanitize_text_field($_POST['title-categorias']) );
	}
	// end seção categorias


	// start seção 1 posts por categoria 
	if( isset($_POST['icon-default-categoria'])){
		update_post_meta( 245, 'icon-default-categoria', sanitize_text_field($_POST['icon-default-categoria']) );
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
	// end seção 1 posts por categoria 

	// start seção 2 posts por categoria 
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
	// end seção 2 posts por categoria 

	// start seção 3 posts por categoria 
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
	// end seção 4 posts por categoria 

	// start seção 4 posts por categoria 
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
	// end seção 4 posts por categoria 


	// start - seção colunas 
	if( isset($_POST['categoria-colunas'])){
		update_post_meta( 131, 'categoria-colunas', sanitize_text_field($_POST['categoria-colunas']) );
	}
	if( isset($_POST['title-colunas'])){
		update_post_meta( 134, 'title-colunas', sanitize_text_field($_POST['title-colunas']) );
	}
	if( isset($_POST['title-colunas-mob'])){
		update_post_meta( 135, 'title-colunas-mob', sanitize_text_field($_POST['title-colunas-mob']) );
	}
	if( isset($_POST['link-ver-tudo'])){
		update_post_meta( 136, 'link-ver-tudo', sanitize_text_field($_POST['link-ver-tudo']) );
	}
	if( isset($_POST['texto-ver-mais'])){
		update_post_meta( 139, 'texto-ver-mais', sanitize_text_field($_POST['texto-ver-mais']) );
	}
	if( isset($_POST['texto-ver-mais-mob'])){
		update_post_meta( 138, 'texto-ver-mais-mob', sanitize_text_field($_POST['texto-ver-mais-mob']) );
	}
	if( isset($_POST['texto-ler-mais-colunas'])){
		update_post_meta( 141, 'texto-ler-mais-colunas', sanitize_text_field($_POST['texto-ler-mais-colunas']) );
	}
	// end - seção colunas 

	// start - seção criticas 
	if( isset($_POST['categoria-criticas'])){
		update_post_meta( 132, 'categoria-criticas', sanitize_text_field($_POST['categoria-criticas']) );
	}
	if( isset($_POST['title-criticas'])){
		update_post_meta( 142, 'title-criticas', sanitize_text_field($_POST['title-criticas']) );
	}
	if( isset($_POST['link-ver-mais-criticas'])){
		update_post_meta( 143, 'link-ver-mais-criticas', sanitize_text_field($_POST['link-ver-mais-criticas']) );
	}
	if( isset($_POST['texto-ver-mais-mob-criticas'])){
		update_post_meta( 144, 'texto-ver-mais-mob-criticas', sanitize_text_field($_POST['texto-ver-mais-mob-criticas']) );
	}
	// end - seção criticas 

	// start - seção diversidade 
	if( isset($_POST['categoria-diversidade'])){
		update_post_meta( 150, 'categoria-diversidade', sanitize_text_field($_POST['categoria-diversidade']) );
	}
	if( isset($_POST['title-diversidade'])){
		update_post_meta( 154, 'title-diversidade', sanitize_text_field($_POST['title-diversidade']) );
	}
	if( isset($_POST['link-ver-tudo-diversidade'])){
		update_post_meta( 146, 'link-ver-tudo-diversidade', sanitize_text_field($_POST['link-ver-tudo-diversidade']) );
	}
	if( isset($_POST['texto-ver-mais-desk-diversidade'])){
		update_post_meta( 152, 'texto-ver-mais-desk-diversidade', sanitize_text_field($_POST['texto-ver-mais-desk-diversidade']) );
	}
	if( isset($_POST['texto-ver-mais-mob-diversidade'])){
		update_post_meta( 155, 'texto-ver-mais-mob-diversidade', sanitize_text_field($_POST['texto-ver-mais-mob-diversidade']) );
	}
	if( isset($_POST['texto-ler-mais-diversidade'])){
		update_post_meta( 156, 'texto-ler-mais-diversidade', sanitize_text_field($_POST['texto-ler-mais-diversidade']) );
	}
	// end - seção diversidade 

	// start - seção banners adSense
	if( isset($_POST['banner-adsense-home-topo'])){
		update_post_meta( 165, 'banner-adsense-home-topo', $_POST['banner-adsense-home-topo']);
	}
	if( isset($_POST['banner-adsense-home-bottom'])){
		update_post_meta( 170, 'banner-adsense-home-bottom', $_POST['banner-adsense-home-bottom']);
	}
	if( isset($_POST['banner-adsense-post-topo'])){
		update_post_meta( 240, 'banner-adsense-post-topo', $_POST['banner-adsense-post-topo']);
	}
	if( isset($_POST['banner-adsense-post-lateral'])){
		update_post_meta( 241, 'banner-adsense-post-lateral', $_POST['banner-adsense-post-lateral']);
	}
	if( isset($_POST['banner-destaque-post-lateral'])){
		update_post_meta( 242, 'banner-destaque-post-lateral', $_POST['banner-destaque-post-lateral']);
	}
	// end - seção banners adSense

	// start - seção piticast
	if( isset($_POST['title-piticast'])){
		update_post_meta( 172, 'title-piticast', $_POST['title-piticast']);
	}
	if( isset($_POST['link-ver-tudo-piticast'])){
		update_post_meta( 176, 'link-ver-tudo-piticast', $_POST['link-ver-tudo-piticast']);
	}
	if( isset($_POST['texto-ver-mais-desk-piticast'])){
		update_post_meta( 174, 'texto-ver-mais-desk-piticast', $_POST['texto-ver-mais-desk-piticast']);
	}
	if( isset($_POST['texto-ver-mais-mob-piticast'])){
		update_post_meta( 178, 'texto-ver-mais-mob-piticast', $_POST['texto-ver-mais-mob-piticast']);
	}
	if( isset($_POST['link-card-piticast'])){
		update_post_meta( $id_post, 'link-card-piticast', $_POST['link-card-piticast']);
	}
	if( isset($_POST['url-audio-piticast'])){
		update_post_meta( $id_post, 'url-audio-piticast', $_POST['url-audio-piticast']);
	}
	// end - seção piticast
	
	// start - seção pitiplay
	if( isset($_POST['title-pitiplay'])){
		update_post_meta( 187, 'title-pitiplay', $_POST['title-pitiplay']);
	}
	if( isset($_POST['link-ver-tudo-pitiplay'])){
		update_post_meta( 181, 'link-ver-tudo-pitiplay', $_POST['link-ver-tudo-pitiplay']);
	}
	if( isset($_POST['texto-ver-mais-desk-pitiplay'])){
		update_post_meta( 185, 'texto-ver-mais-desk-pitiplay', $_POST['texto-ver-mais-desk-pitiplay']);
	}
	if( isset($_POST['texto-ver-mais-mob-pitiplay'])){
		update_post_meta( 183, 'texto-ver-mais-mob-pitiplay', $_POST['texto-ver-mais-mob-pitiplay']);
	}
	if( isset($_POST['link-card-pitiplay'])){
		update_post_meta( $id_post, 'link-card-pitiplay', $_POST['link-card-pitiplay']);
	}
	if( isset($_POST['iframe-pitiplay'])){
		update_post_meta( $id_post, 'iframe-pitiplay', $_POST['iframe-pitiplay']);
	}
	// end - seção pitiplay

	// start - seção instagram
	if( isset($_POST['title-instagram'])){
		update_post_meta( 189, 'title-instagram', $_POST['title-instagram']);
	}
	if( isset($_POST['link-instagram'])){
		update_post_meta( 211, 'link-instagram', $_POST['link-instagram']);
	}
	// end - seção instagram


	// start - seção Loja Online
	if( isset($_POST['title-loja-online'])){
		update_post_meta( 230, 'title-loja-online', $_POST['title-loja-online']);
	}
	if( isset($_POST['link-ver-tudo-loja-online'])){
		update_post_meta( 212, 'link-ver-tudo-loja-online', $_POST['link-ver-tudo-loja-online']);
	}
	if( isset($_POST['texto-ver-mais-desk-loja-online'])){
		update_post_meta( 281, 'texto-ver-mais-desk-loja-online', $_POST['texto-ver-mais-desk-loja-online']);
	}
	if( isset($_POST['texto-ver-mais-mob-loja-online'])){
		update_post_meta( 192, 'texto-ver-mais-mob-loja-online', $_POST['texto-ver-mais-mob-loja-online']);
	}
	if( isset($_POST['link-comprar-agora'])){
		update_post_meta( $id_post, 'link-comprar-agora', $_POST['link-comprar-agora']);
	}
	// end - seção Loja Online

}
add_action('save_post', 'atualiza_meta_info');

