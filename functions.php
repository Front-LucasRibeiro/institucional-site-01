<?php
add_filter('show_admin_bar', '__return_false');

add_theme_support('post-thumbnails');

add_filter('wp_cache_disable', '__return_true');

global $wpdb;
$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_%'" );

wp_cache_flush();

define('WP_CACHE', false);

function enqueue_media_uploader() {
    // Verifica se estamos na tela de edição de post
    if (is_admin()) {
        wp_enqueue_media(); // Carrega os scripts de mídia
    }
}
add_action('admin_enqueue_scripts', 'enqueue_media_uploader');

// Ocultar abas do painel do WordPress
function remove_admin_menu_items() {
    remove_menu_page('index.php'); // Painel
    remove_menu_page('edit.php'); // Posts
    remove_menu_page('edit-comments.php'); // Comentários
    remove_menu_page('wpforms-overview'); // WPForms
    // remove_menu_page('plugins.php'); // Plugins
    remove_menu_page('themes.php'); // Aparência
    remove_menu_page('tools.php'); // Ferramentas
}
add_action('admin_menu', 'remove_admin_menu_items');

// start - PORTFOLIO 
// start - criando campos para o novo post type
function createFieldPortfolio() {
    global $post;
    $id_post = $post->ID;
    $portfolio_description = get_post_meta($id_post, 'portfolio_description', true);
    ?>

    <style>
        textarea,
        input {
            width: 100%;
            margin-top: 5px;
        }

        label {
            font-weight: bold;
        }

        .field {
            margin: 12px 0;
        }
    </style>

    <div class="box">
        <div class="field">
            <label for="portfolio_description">Legenda:</label>
            <textarea id="portfolio_description" name="portfolio_description"><?= esc_textarea($portfolio_description); ?></textarea>
        </div>
    </div>

    <?php
    // Adicionando nonce para segurança
    wp_nonce_field('save_portfolio_meta', 'portfolio_nonce');
}

function add_portfolio_meta_box() {
	add_meta_box(
			'portfolio_meta_box', // ID
			'Informações do Portfólio', // Título
			'createFieldPortfolio', // Callback
			'list-portfolio', // Novo CPT
			'normal', // Contexto
			'high' // Prioridade
	);
}
add_action('add_meta_boxes', 'add_portfolio_meta_box');

// end - funções atualizar campos 
function save_portfolio_meta($post_id) {
    // Verifica o nonce
    if (!isset($_POST['portfolio_nonce']) || !wp_verify_nonce($_POST['portfolio_nonce'], 'save_portfolio_meta')) {
        return;
    }

    // Verifica se o post é do tipo correto
    if (get_post_type($post_id) !== 'list-portfolio') {
        return;
    }

    // Faz a atualização dos campos
    if (isset($_POST['portfolio_description'])) {
        update_post_meta($post_id, 'portfolio_description', sanitize_textarea_field($_POST['portfolio_description']));
    }
}
add_action('save_post', 'save_portfolio_meta');

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
// end - PORTFOLIO 




// start - BLOG 
// start - criando campos para o novo post type
function createFieldBlog() {
    global $post;
    $id_post = $post->ID;
    $description = get_post_meta($id_post, 'blog_description', true);
    $blog_date = get_post_meta($id_post, 'blog_date', true);
    ?>

    <style>
        textarea,
        input {
            width: 100%;
            margin-top: 5px;
        }

        label {
            font-weight: bold;
        }

        .field {
            margin: 12px 0;
        }
    </style>

    <div class="box">
        <div class="field">
            <label for="blog_description">Descrição curta:</label>
            <textarea id="blog_description" name="blog_description"><?= esc_textarea($description); ?></textarea>
        </div>
        <div class="field">
            <label for="blog_date">Data:</label>
            <input type="date" id="blog_date" name="blog_date" value="<?= esc_attr($blog_date); ?>" />
        </div>
    </div>

    <?php
    // Adicionando nonce para segurança
    wp_nonce_field('save_blog_meta', 'blog_nonce');
}

function add_blog_meta_box() {
    add_meta_box(
        'blog_meta_box', // ID
        'Informações do Blog', // Título
        'createFieldBlog', // Callback
        'list-blog', // Novo CPT
        'normal', // Contexto
        'high' // Prioridade
    );
}
add_action('add_meta_boxes', 'add_blog_meta_box');

// end - funções atualizar campos 
function save_blog_meta($post_id) {
    // Verifica o nonce
    if (!isset($_POST['blog_nonce']) || !wp_verify_nonce($_POST['blog_nonce'], 'save_blog_meta')) {
        return;
    }

    // Verifica se o post é do tipo correto
    if (get_post_type($post_id) !== 'list-menu') {
        return;
    }

    // Faz a atualização dos campos
    if (isset($_POST['blog_description'])) {
        update_post_meta($post_id, 'blog_description', sanitize_textarea_field($_POST['blog_description']));
    }
    if (isset($_POST['blog_date'])) {
        update_post_meta($post_id, 'blog_date', sanitize_text_field($_POST['blog_date']));
    }
}
add_action('save_post', 'save_blog_meta');

// Criar o novo post type "Blog"
function create_blog_cpt() {
    $args = array(
        'labels' => array(
            'name' => __('Blogs'),
            'singular_name' => __('Blog')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'list-blog'),
        'supports' => array('title', 'editor', 'thumbnail'), // 'editor' para o conteúdo
        'menu_icon' => 'dashicons-admin-post',
    );
    register_post_type('list-blog', $args);
}
add_action('init', 'create_blog_cpt');
// end - BLOG 


// start - MENU 
// start - criando campos para o novo post type
function createFieldMenu() {
    global $post;
    $id_post = $post->ID;
    $itemServicesInativar = get_post_meta($id_post, 'itemServicesInativar', true);
    $LinkInativaritemFacebookLink = get_post_meta($id_post, 'LinkInativaritemFacebookLink', true);
    $itemPortfolioInativar = get_post_meta($id_post, 'itemPortfolioInativar', true);
    $itemEmpresaInativar = get_post_meta($id_post, 'itemEmpresaInativar', true);
    $itemBlogInativar = get_post_meta($id_post, 'itemBlogInativar', true);
    $itemContatoInativar = get_post_meta($id_post, 'itemContatoInativar', true);
    $itemLogo = get_post_meta($id_post, 'itemLogo', true); 
    ?>

<style>
    textarea,
    input[type="text"],
    input[type="hidden"] {
        width: 100%;
        margin-top: 5px;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    input[type="checkbox"] {
        position: relative;
        top: 2px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .field {
        margin: 12px 0;
        border-bottom: 1px solid #ddd;
        padding-bottom: 15px;
    }

    .field button {
        margin-top: 5px;
    }

    .logo-preview {
        margin-top: 10px;
    }

    .logo-preview img {
        max-width: 100px;
        height: auto;
        display: block;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 4px;
    }

    .social-field {
        margin-bottom: 20px;
    }
</style>

<div class="box">
    <!-- Campo de Upload de Logo -->
    <div class="field">
        <label for="itemLogo">Logo:</label>
        <input type="hidden" id="itemLogo" name="itemLogo" value="<?php echo esc_attr($itemLogo); ?>" />
        <button type="button" class="button" id="uploadLogoButton">Selecionar Logo</button>

        <div class="logo-preview">
            <?php if ($itemLogo) : ?>
                <img src="<?php echo wp_get_attachment_url($itemLogo); ?>" alt="Logo" />
            <?php endif; ?>
        </div>
    </div>
    <br>
                 
    <script>
        jQuery(document).ready(function($) {
            var mediaUploader;

            $('#uploadLogoButton').click(function(e) {
                e.preventDefault();
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }

                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Escolher Logo',
                    button: {
                        text: 'Escolher Logo'
                    },
                    multiple: false
                });

                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#itemLogo').val(attachment.id);
                    $('.logo-preview').html('<img src="' + attachment.url + '" alt="Logo" />');
                });

                mediaUploader.open();
            });
        });
    </script>

    <!-- Campos de Inativar -->
    <?php
    $fields = [
        'Serviços' => 'itemServicesInativar',
        'Portfólio' => 'itemPortfolioInativar',
        'Empresa' => 'itemEmpresaInativar',
        'Blog' => 'itemBlogInativar',
        'Contato' => 'itemContatoInativar',
    ];

    foreach ($fields as $label => $name) {
        $value = get_post_meta($post->ID, $name, true);
        echo '<div class="field">';
        echo '<label for="' . esc_attr($name) . '">' . esc_html($label) . ':</label>';
        echo 'Desativar: <input type="checkbox" id="' . esc_attr($name) . '" name="' . esc_attr($name) . '" value="1" ' . checked($value, '1', false) . ' />';
        echo '</div>';
    }
    ?>
    <br><br>

    <!-- Redes Sociais -->
    <?php
    $socialFields = [
        'Facebook' => 'itemFacebookLink',
        'Instagram' => 'itemInstagramLink',
        'LinkedIn' => 'itemLinkedInLink',
        'WhatsApp' => 'itemWhatsAppLink',
    ];

    foreach ($socialFields as $label => $name) {
        $value = get_post_meta($post->ID, $name, true);
        $inactivateName = str_replace('Link', 'Inativar', $name);
        $inactivateValue = get_post_meta($post->ID, $inactivateName, true);
        ?>
        <div class="social-field">
            <label for="<?= esc_attr($name); ?>"><?= esc_html($label); ?>:</label>
            <input type="text" id="<?= esc_attr($name); ?>" name="<?= esc_attr($name); ?>" value="<?= esc_attr($value); ?>" />
            <div class="field">
                Desativar <input type="checkbox" id="<?= esc_attr($inactivateName); ?>" name="<?= esc_attr($inactivateName); ?>" value="1" <?= checked($inactivateValue, '1', false); ?> />
            </div>
        </div>
        <?php
    }
    ?>
</div>



    <?php
    // Adicionando nonce para segurança
    wp_nonce_field('save_menu_meta', 'menu_nonce');

     if (defined('WP_CACHE') && WP_CACHE) {
        wp_cache_flush();
    }
}

function add_menu_meta_box() {
    add_meta_box(
        'menu_meta_box', // ID
        'Informações do Menu', // Título
        'createFieldMenu', // Callback
        'list-menu', // Novo CPT
        'normal', // Contexto
        'high' // Prioridade
    );
}
add_action('add_meta_boxes', 'add_menu_meta_box');

// end - funções atualizar campos 
function save_menu_meta($post_id) {
    // Verifica o nonce
    if (!isset($_POST['menu_nonce']) || !wp_verify_nonce($_POST['menu_nonce'], 'save_menu_meta')) {
        return;
    }

    // Verifica se o post é do tipo correto
    if (get_post_type($post_id) !== 'list-menu') {
        return;
    }

    // Salva o logo
    if (isset($_POST['itemLogo'])) {
        update_post_meta($post_id, 'itemLogo', sanitize_text_field($_POST['itemLogo']));
    }

    // Atualiza os campos de inativar
    $fields = [
        'itemServicesInativar',
        'itemPortfolioInativar',
        'itemEmpresaInativar',
        'itemBlogInativar',
        'itemContatoInativar'
    ];

    foreach ($fields as $field) {
        update_post_meta($post_id, $field, isset($_POST[$field]) ? '1' : '0');
    }

    // Salva os campos de redes sociais
    $socialFields = [
        'itemFacebookLink',
        'itemInstagramLink',
        'itemLinkedInLink',
        'itemWhatsAppLink'
    ];

    foreach ($socialFields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }

    // Atualiza os campos de inativar redes sociais
    foreach ($socialFields as $field) {
        $inactivateField = str_replace('Link', 'Inativar', $field);
        update_post_meta($post_id, $inactivateField, isset($_POST[$inactivateField]) ? '1' : '0');
    }

     if (defined('WP_CACHE') && WP_CACHE) {
        wp_cache_flush();
    }
}
add_action('save_post', 'save_menu_meta');


// Criar o novo post type "Blog"
function create_menu_cpt() {
    $args = array(
        'labels' => array(
            'name' => __('Menu'),
            'singular_name' => __('Menu')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'list-menu'),
        'supports' => array('title'),
        'menu_icon' => 'dashicons-admin-post',
    );
    register_post_type('list-menu', $args);
}
add_action('init', 'create_menu_cpt');
// end - MENU 