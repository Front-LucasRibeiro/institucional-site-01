<?php
add_filter('show_admin_bar', '__return_false');

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
add_image_size('banner-slide-principal-mobile-480x600', 480, 600, true);
add_image_size('banner-slide-principal-1170x500', 1170, 500, true);



/* Registrando menu de navegação */
function registrar_menu_navegacao() {
	register_nav_menu('header-menu', 'Menu Header');
	register_nav_menu('footer-menu-pitinews', 'Menu Footer Pitinews');
	register_nav_menu('footer-menu-categorias', 'Menu Footer Categorias');
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



// start - POST TYPES 
function create_portfolio_cpt() {
    $args = array(
        'labels' => array(
            'name' => __('Portfólios'),
            'singular_name' => __('list-portfolio')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'list-portfolio'),
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-portfolio',
    );
    register_post_type('list-portfolio', $args);
}
add_action('init', 'create_portfolio_cpt');
// end - POST TYPES 


// start - criando campos 
function createFieldPortfolio(){
		global $post;
		$post = get_post();
		$id_post = $post->ID;
		$textLegendPortfolio= get_post_meta( $id_post, 'textLegendPortfolio', true);
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
			<label for="textLegendPortfolio">Legenda para imagem:</label>
			<input type="text" id="textLegendPortfolio" name="textLegendPortfolio" value="<?= $textLegendPortfolio; ?>" />
		</div>
	</div>

	
	<?php
}

function add_portfolio_meta_box() {
    add_meta_box(
			'portfolio_meta_box', // ID
			'Informações do Portfólio', // Título
			'createFieldPortfolio', // Callback
			'list-portfolio', // CPT
			'normal', // Contexto
			'high' // Prioridade
    );
}
add_action('add_meta_boxes', 'add_portfolio_meta_box');
// end - criando campos 


// start - funções atualizar campos 
function save_portfolio_meta($post_id) {
    if (!isset($_POST['textLegendPortfolio_nonce']) || !wp_verify_nonce($_POST['textLegendPortfolio_nonce'], 'save_portfolio_meta')) {
        return;
    }

    if (isset($_POST['textLegendPortfolio'])) {
        update_post_meta($post_id, 'textLegendPortfolio', sanitize_text_field($_POST['textLegendPortfolio']));
    }
}
// end - funções atualizar campos
