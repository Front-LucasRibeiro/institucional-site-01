<?php
add_filter('show_admin_bar', '__return_false');

add_theme_support('post-thumbnails');

// Ocultar abas do painel do WordPress
function remove_admin_menu_items() {
    remove_menu_page('index.php'); // Painel
    remove_menu_page('edit.php'); // Posts
    remove_menu_page('edit-comments.php'); // Comentários
    remove_menu_page('wpforms-overview'); // WPForms
    remove_menu_page('plugins.php'); // Plugins
    remove_menu_page('themes.php'); // Aparência
    remove_menu_page('tools.php'); // Ferramentas
}
add_action('admin_menu', 'remove_admin_menu_items');

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

// start - criando campos para o novo post type
function createFieldBlog() {
    global $post;
    $id_post = $post->ID;
    $description = get_post_meta($id_post, 'blog_description', true);
    $read_more = get_post_meta($id_post, 'blog_read_more', true);
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
            <label for="blog_description">Descrição:</label>
            <textarea id="blog_description" name="blog_description"><?= esc_textarea($description); ?></textarea>
        </div>
        <div class="field">
            <label for="blog_read_more">Leia Mais:</label>
            <input type="text" id="blog_read_more" name="blog_read_more" value="<?= esc_attr($read_more); ?>" />
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
    if (get_post_type($post_id) !== 'list-blog') {
        return;
    }

    // Faz a atualização dos campos
    if (isset($_POST['blog_description'])) {
        update_post_meta($post_id, 'blog_description', sanitize_textarea_field($_POST['blog_description']));
    }
    if (isset($_POST['blog_read_more'])) {
        update_post_meta($post_id, 'blog_read_more', sanitize_text_field($_POST['blog_read_more']));
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