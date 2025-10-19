<?php
// Incluir arquivo de limites PHP
require_once get_template_directory() . '/php-limits.php';

add_filter('show_admin_bar', '__return_false');

add_theme_support('post-thumbnails');


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
    remove_menu_page('plugins.php'); // Plugins
    remove_menu_page('themes.php'); // Aparência
    remove_menu_page('tools.php'); // Ferramentas
    remove_menu_page('options-general.php'); // Configurações
    remove_menu_page('edit.php?post_type=page'); // Páginas
}
add_action('admin_menu', 'remove_admin_menu_items');

add_action('admin_menu', 'remove_litespeed_cache_menu', 99);

function remove_litespeed_cache_menu() {
    global $submenu;
    // Remove o menu principal
    remove_menu_page('litespeed');
    remove_menu_page('litespeed-cache-options');

    if (isset($submenu['litespeed-cache-options'])) {
        unset($submenu['litespeed-cache-options']);
    }
    // Remove submenus
    if (isset($submenu['litespeed'])) {
        unset($submenu['litespeed']);
    }
}

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
    <textarea id="portfolio_description"
      name="portfolio_description"><?= esc_textarea($portfolio_description); ?></textarea>
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
    <input type="date" placeholder="dd/mm/aaaa" id="blog_date" name="blog_date" value="<?= esc_attr($blog_date); ?>" />
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
            'name' => __('Blog'),
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
    $mainColor = get_post_meta($id_post, 'mainColor', true); 
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
    <label for="itemLogo">Logo: (Tamanho de imagem: 172px92px)</label>
    <input type="hidden" id="itemLogo" name="itemLogo" value="<?php echo esc_attr($itemLogo); ?>" />
    <button type="button" class="button" id="uploadLogoButton">Selecionar Logo</button>

    <div class="logo-preview">
      <?php if ($itemLogo) : ?>
      <img src="<?php echo wp_get_attachment_url($itemLogo); ?>" alt="Logo" />
      <?php endif; ?>
    </div>
  </div>
  <br>
  <div class="field">
    <label for="mainColor">Cor Padrão (hexadecimal):</label>
    <input type="text" id="mainColor" name="mainColor" value="<?= $mainColor ?>" placeholder="#FF0000" />
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
    <?php if($name === 'itemWhatsAppLink'): ?>
    <span>(Ex: https://api.whatsapp.com/send?phone=5511988888888)</span>
    <?php endif; ?>
    <input type="text" id="<?= esc_attr($name); ?>" name="<?= esc_attr($name); ?>" value="<?= esc_attr($value); ?>" />
    <div class="field">
      Desativar <input type="checkbox" id="<?= esc_attr($inactivateName); ?>" name="<?= esc_attr($inactivateName); ?>"
        value="1" <?= checked($inactivateValue, '1', false); ?> />
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

    // Dentro da função save_menu_meta
    if (isset($_POST['mainColor'])) {
        update_post_meta($post_id, 'mainColor', sanitize_text_field($_POST['mainColor']));
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



// start - BANNER TOPO
// Criar o novo post type "Banner Topo"
function create_banner_topo_cpt() {
    $args = array(
        'labels' => array(
            'name' => __('Banners Topo'),
            'singular_name' => __('Banner Topo')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'banners-topo'),
        'supports' => array('title'), // Removido 'thumbnail'
        'menu_icon' => 'dashicons-format-image',
    );
    register_post_type('banner-topo', $args);
}
add_action('init', 'create_banner_topo_cpt');

// Criar campos personalizados para o Banner Topo
function createFieldBannerTopo() {
    global $post;
    $id_post = $post->ID;
    $banner_description = get_post_meta($id_post, 'banner_description', true);
    $banner_image_desktop = get_post_meta($id_post, 'banner_image_desktop', true);
    $banner_image_mobile = get_post_meta($id_post, 'banner_image_mobile', true);
    ?>

<style>
textarea,
input[type="text"],
input[type="hidden"] {
  width: 100%;
  margin-top: 5px;
}

.field {
  margin: 12px 0;
}

.banner-preview img {
  width: 310px !important;
  height: 310px !important;
  object-fit: cover;
  margin-top: 18px;
}

.label {
  position: relative;
  top: 5px;
}
</style>

<div>
  <strong>Imagens (largura x altura):</strong><br><br>
  Tamanho de imagem para computador: 1920x705<br>
  Tamanho de imagem para dispositivo móvel: 564x705
</div>

<div class="field">
  <label for="banner_image_desktop" class="label">Imagem para Computador:</label>
  <input type="hidden" id="banner_image_desktop" name="banner_image_desktop"
    value="<?php echo esc_attr($banner_image_desktop); ?>" />
  <button type="button" class="button" id="uploadDesktopButton">Selecionar Imagem</button>
  <div class="banner-preview">
    <?php if ($banner_image_desktop) : ?>
    <img src="<?php echo wp_get_attachment_url($banner_image_desktop); ?>" alt="Banner Desktop"
      style="max-width: 100%; height: auto;" />
    <?php endif; ?>
  </div>
</div>

<div class="field">
  <label for="banner_image_mobile" class="label">Imagem para Dispositivo Móvel:</label>
  <input type="hidden" id="banner_image_mobile" name="banner_image_mobile"
    value="<?php echo esc_attr($banner_image_mobile); ?>" />
  <button type="button" class="button" id="uploadMobileButton">Selecionar Imagem</button>
  <div class="banner-preview">
    <?php if ($banner_image_mobile) : ?>
    <img src="<?php echo wp_get_attachment_url($banner_image_mobile); ?>" alt="Banner Mobile"
      style="max-width: 100%; height: auto;" />
    <?php endif; ?>
  </div>
</div>

<div class="field">
  <label for="banner_description"><strong>Descrição:</strong></label>
  <textarea rows="4" id="banner_description"
    name="banner_description"><?php echo esc_textarea($banner_description); ?></textarea>
</div>

<script>
jQuery(document).ready(function($) {
  var mediaUploaderDesktop, mediaUploaderMobile;

  $('#uploadDesktopButton').click(function(e) {
    e.preventDefault();
    if (mediaUploaderDesktop) {
      mediaUploaderDesktop.open();
      return;
    }

    mediaUploaderDesktop = wp.media.frames.file_frame = wp.media({
      title: 'Escolher Imagem para Computador',
      button: {
        text: 'Escolher Imagem'
      },
      multiple: false
    });

    mediaUploaderDesktop.on('select', function() {
      var attachment = mediaUploaderDesktop.state().get('selection').first().toJSON();
      $('#banner_image_desktop').val(attachment.id);
      $('.banner-preview').first().html('<img src="' + attachment.url +
        '" alt="Banner Desktop" style="max-width: 100%; height: auto;" />');
    });

    mediaUploaderDesktop.open();
  });

  $('#uploadMobileButton').click(function(e) {
    e.preventDefault();
    if (mediaUploaderMobile) {
      mediaUploaderMobile.open();
      return;
    }

    mediaUploaderMobile = wp.media.frames.file_frame = wp.media({
      title: 'Escolher Imagem para Dispositivo Móvel',
      button: {
        text: 'Escolher Imagem'
      },
      multiple: false
    });

    mediaUploaderMobile.on('select', function() {
      var attachment = mediaUploaderMobile.state().get('selection').first().toJSON();
      $('#banner_image_mobile').val(attachment.id);
      $('.banner-preview').last().html('<img src="' + attachment.url +
        '" alt="Banner Mobile" style="max-width: 100%; height: auto;" />');
    });

    mediaUploaderMobile.open();
  });
});
</script>

<?php
    // Adicionando nonce para segurança
    wp_nonce_field('save_banner_meta', 'banner_nonce');

     if (defined('WP_CACHE') && WP_CACHE) {
        wp_cache_flush();
    }
}

function add_banner_meta_box() {
    add_meta_box(
        'banner_meta_box', // ID
        'Informações do Banner Topo', // Título
        'createFieldBannerTopo', // Callback
        'banner-topo', // Novo CPT
        'normal', // Contexto
        'high' // Prioridade
    );
}
add_action('add_meta_boxes', 'add_banner_meta_box');

// Função para salvar os campos personalizados
function save_banner_meta($post_id) {
    // Verifica o nonce
    if (!isset($_POST['banner_nonce']) || !wp_verify_nonce($_POST['banner_nonce'], 'save_banner_meta')) {
        return;
    }

    // Verifica se o post é do tipo correto
    if (get_post_type($post_id) !== 'banner-topo') {
        return;
    }

    // Salva a descrição do banner
    if (isset($_POST['banner_description'])) {
        update_post_meta($post_id, 'banner_description', sanitize_textarea_field($_POST['banner_description']));
    }

    // Salva as imagens
    if (isset($_POST['banner_image_desktop'])) {
        update_post_meta($post_id, 'banner_image_desktop', sanitize_text_field($_POST['banner_image_desktop']));
    }
    if (isset($_POST['banner_image_mobile'])) {
        update_post_meta($post_id, 'banner_image_mobile', sanitize_text_field($_POST['banner_image_mobile']));
    }

    if (defined('WP_CACHE') && WP_CACHE) {
        wp_cache_flush();
    }
}
add_action('save_post', 'save_banner_meta');
// end - BANNER TOPO



// start - SECTION TOPO
// Criar o novo post type "Section Topo"
function create_section_topo_cpt() {
    $args = array(
        'labels' => array(
            'name' => __('Benefícios'),
            'singular_name' => __('Benefício')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'sections-topo'),
        'supports' => array('title'), // Apenas título
        'menu_icon' => 'dashicons-format-image',
    );
    register_post_type('section-topo', $args);
}
add_action('init', 'create_section_topo_cpt');

// Criar campos personalizados para o Section Topo
function createFieldSectionTopo() {
    global $post;
    $id_post = $post->ID;
    $section_text = get_post_meta($id_post, 'section_text', true);
    $section_image = get_post_meta($id_post, 'section_image', true);
    ?>

<style>
textarea,
input[type="text"],
input[type="hidden"] {
  width: 100%;
  margin-top: 5px;
}

.field {
  margin: 12px 0;
}

.section-preview img {
  width: 68px;
  height: 68px;
  object-fit: cover;
  margin-top: 18px;
}
</style>

<div>
  <strong>Imagens (largura x altura):</strong><br>
  Tamanho de imagem: 68px68px
</div>

<div class="field">
  <label for="section_image">Imagem:</label>
  <input type="hidden" id="section_image" name="section_image" value="<?php echo esc_attr($section_image); ?>" />
  <button type="button" class="button" id="uploadSectionButton">Selecionar Imagem</button>
  <div class="section-preview">
    <?php if ($section_image) : ?>
    <img src="<?php echo wp_get_attachment_url($section_image); ?>" alt="Section Image"
      style="max-width: 100%; height: auto;" />
    <?php endif; ?>
  </div>
</div>

<div class="field">
  <label for="section_text">Texto:</label>
  <textarea rows="4" id="section_text" name="section_text"><?php echo esc_textarea($section_text); ?></textarea>
</div>

<script>
jQuery(document).ready(function($) {
  var mediaUploader;

  $('#uploadSectionButton').click(function(e) {
    e.preventDefault();
    if (mediaUploader) {
      mediaUploader.open();
      return;
    }

    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Escolher Imagem para Section Topo',
      button: {
        text: 'Escolher Imagem'
      },
      multiple: false
    });

    mediaUploader.on('select', function() {
      var attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#section_image').val(attachment.id);
      $('.section-preview').html('<img src="' + attachment.url +
        '" alt="Section Image" style="max-width: 100%; height: auto;" />');
    });

    mediaUploader.open();
  });
});
</script>

<?php
    // Adicionando nonce para segurança
    wp_nonce_field('save_section_meta', 'section_nonce');
}

function add_section_meta_box() {
    add_meta_box(
        'section_meta_box', // ID
        'Informações da Section Topo', // Título
        'createFieldSectionTopo', // Callback
        'section-topo', // Novo CPT
        'normal', // Contexto
        'high' // Prioridade
    );
}
add_action('add_meta_boxes', 'add_section_meta_box');

// Função para salvar os campos personalizados
function save_section_meta($post_id) {
    // Verifica o nonce
    if (!isset($_POST['section_nonce']) || !wp_verify_nonce($_POST['section_nonce'], 'save_section_meta')) {
        return;
    }

    // Verifica se o post é do tipo correto
    if (get_post_type($post_id) !== 'section-topo') {
        return;
    }

    // Salva a imagem da seção
    if (isset($_POST['section_image'])) {
        update_post_meta($post_id, 'section_image', sanitize_text_field($_POST['section_image']));
    }

    // Salva o texto da seção
    if (isset($_POST['section_text'])) {
        update_post_meta($post_id, 'section_text', sanitize_textarea_field($_POST['section_text']));
    }
}
add_action('save_post', 'save_section_meta');
// end - SECTION TOPO


// start - CONFIGURAÇÕES DE SEÇÕES
// Criar o novo post type "Configurações de Seções"
function create_config_secoes_cpt() {
    $args = array(
        'labels' => array(
            'name' => __('Configurações de Seções'),
            'singular_name' => __('Configuração de Seção')
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'config-secoes'),
        'supports' => array('title'), // Apenas título
        'menu_icon' => 'dashicons-admin-generic',
    );
    register_post_type('config_secoes', $args);
}
add_action('init', 'create_config_secoes_cpt');

// Criar campos personalizados para desativar seções
function createFieldConfigSecoes() {
    global $post;
    $disable_banners = get_post_meta($post->ID, 'disable_banners', true);
    $disable_sections = get_post_meta($post->ID, 'disable_sections', true);
    $disable_services = get_post_meta($post->ID, 'disable_services', true);
    $disable_portfolio = get_post_meta($post->ID, 'disable_portfolio', true);
    $disable_empresa = get_post_meta($post->ID, 'disable_empresa', true);
    $disable_equipe = get_post_meta($post->ID, 'disable_equipe', true);
    $disable_clientes = get_post_meta($post->ID, 'disable_clientes', true);
    $disable_blog = get_post_meta($post->ID, 'disable_blog', true);
    $disable_contato = get_post_meta($post->ID, 'disable_contato', true);
    $disable_mapa = get_post_meta($post->ID, 'disable_mapa', true);
    ?>

<div class="field">
  <label for="disable_banners">
    <input type="checkbox" id="disable_banners" name="disable_banners" value="1"
      <?php checked($disable_banners, '1'); ?>>
    Desativar Banners Topo
  </label>
</div>

<div class="field">
  <label for="disable_sections">
    <input type="checkbox" id="disable_sections" name="disable_sections" value="1"
      <?php checked($disable_sections, '1'); ?>>
    Desativar Seção Benefícios
  </label>
</div>

<div class="field">
  <label for="disable_services">
    <input type="checkbox" id="disable_services" name="disable_services" value="1"
      <?php checked($disable_services, '1'); ?>>
    Desativar Seção Serviços
  </label>
</div>

<div class="field">
  <label for="disable_portfolio">
    <input type="checkbox" id="disable_portfolio" name="disable_portfolio" value="1"
      <?php checked($disable_portfolio, '1'); ?>>
    Desativar Seção Portfólios
  </label>
</div>

<div class="field">
  <label for="disable_empresa">
    <input type="checkbox" id="disable_empresa" name="disable_empresa" value="1"
      <?php checked($disable_empresa, '1'); ?>>
    Desativar Seção Empresa
  </label>
</div>

<div class="field">
  <label for="disable_equipe">
    <input type="checkbox" id="disable_equipe" name="disable_equipe" value="1" <?php checked($disable_equipe, '1'); ?>>
    Desativar Seção Equipe
  </label>
</div>

<div class="field">
  <label for="disable_clientes">
    <input type="checkbox" id="disable_clientes" name="disable_clientes" value="1"
      <?php checked($disable_clientes, '1'); ?>>
    Desativar Seção Clientes
  </label>
</div>

<div class="field">
  <label for="disable_blog">
    <input type="checkbox" id="disable_blog" name="disable_blog" value="1" <?php checked($disable_blog, '1'); ?>>
    Desativar Seção Blog
  </label>
</div>

<div class="field">
  <label for="disable_contato">
    <input type="checkbox" id="disable_contato" name="disable_contato" value="1"
      <?php checked($disable_contato, '1'); ?>>
    Desativar Seção Contato
  </label>
</div>

<div class="field">
  <label for="disable_mapa">
    <input type="checkbox" id="disable_mapa" name="disable_mapa" value="1" <?php checked($disable_mapa, '1'); ?>>
    Desativar Seção Mapa
  </label>
</div>

<?php
    // Adicionando nonce para segurança
    wp_nonce_field('save_config_meta', 'config_nonce');
}

function add_config_meta_box() {
    add_meta_box(
        'config_meta_box', // ID
        'Configurações de Seções', // Título
        'createFieldConfigSecoes', // Callback
        'config_secoes', // Novo CPT
        'normal', // Contexto
        'high' // Prioridade
    );
}
add_action('add_meta_boxes', 'add_config_meta_box');

// Função para salvar os campos personalizados
function save_config_meta($post_id) {
    // Verifica o nonce
    if (!isset($_POST['config_nonce']) || !wp_verify_nonce($_POST['config_nonce'], 'save_config_meta')) {
        return;
    }

    // Verifica se o post é do tipo correto
    if (get_post_type($post_id) !== 'config_secoes') {
        return;
    }

    // Salva as configurações
    $disable_banners = isset($_POST['disable_banners']) ? '1' : '0';
    update_post_meta($post_id, 'disable_banners', $disable_banners);

    $disable_sections = isset($_POST['disable_sections']) ? '1' : '0';
    update_post_meta($post_id, 'disable_sections', $disable_sections);

    $disable_services = isset($_POST['disable_services']) ? '1' : '0';
    update_post_meta($post_id, 'disable_services', $disable_services);

    $disable_portfolio = isset($_POST['disable_portfolio']) ? '1' : '0';
    update_post_meta($post_id, 'disable_portfolio', $disable_portfolio);

    $disable_empresa = isset($_POST['disable_empresa']) ? '1' : '0';
    update_post_meta($post_id, 'disable_empresa', $disable_empresa);

    $disable_equipe = isset($_POST['disable_equipe']) ? '1' : '0';
    update_post_meta($post_id, 'disable_equipe', $disable_equipe);

    $disable_clientes = isset($_POST['disable_clientes']) ? '1' : '0';
    update_post_meta($post_id, 'disable_clientes', $disable_clientes);

    $disable_blog = isset($_POST['disable_blog']) ? '1' : '0';
    update_post_meta($post_id, 'disable_blog', $disable_blog);

    $disable_contato = isset($_POST['disable_contato']) ? '1' : '0';
    update_post_meta($post_id, 'disable_contato', $disable_contato);

    $disable_mapa = isset($_POST['disable_mapa']) ? '1' : '0';
    update_post_meta($post_id, 'disable_mapa', $disable_mapa);
}
add_action('save_post', 'save_config_meta');
// end - CONFIGURAÇÕES DE SEÇÕES


// start - CONFIGURAÇÕES DE SERVIÇOS
// Criar o novo post type "Serviços"
function create_servicos_cpt() {
    $args = array(
        'labels' => array(
            'name' => __('Serviços'),
            'singular_name' => __('Serviço')
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'servicos'),
        'supports' => array('title'),
        'menu_icon' => 'dashicons-hammer', // Ícone do menu
    );
    register_post_type('servicos', $args);
}
add_action('init', 'create_servicos_cpt');

// Criar campos personalizados para serviços
function createFieldServicos() {
    global $post;
    $servicos = get_post_meta($post->ID, 'servicos', true) ?: array();
    $servico_subtitle = get_post_meta($post->ID, 'servico_subtitle', true);
    $servico_paragraph = get_post_meta($post->ID, 'servico_paragraph', true);
    ?>

<style>
textarea,
input[type="text"],
input[type="hidden"] {
  width: 100%;
  margin-top: 5px;
}

.field {
  margin: 12px 0;
}

.section-preview img {
  width: 68px;
  height: 68px;
  object-fit: cover;
  margin-top: 18px;
}

.servico-item {
  margin-top: 22px;
}

#add-servico {
  width: 100%;
  max-width: 310px;
  margin: 42px auto 22px;
  display: block;
}


.upload-image-button,
#add-servico,
.remove-servico {
  background: rgb(21, 101, 192);
  color: #fff;
  border: 1px solid;
  padding: 10px 12px;
  border-radius: 4px;
  margin-top: 14px;
  min-width: 180px;
  cursor: pointer;
}

.upload-image-button {
  padding: 6px 12px;
}

.image-preview {
  margin-top: 10px;
}
</style>

<div class="field">
  <label for="servico_subtitle">
    Subtítulo:
    <input type="text" id="servico_subtitle" name="servico_subtitle" value="<?php echo esc_attr($servico_subtitle); ?>">
  </label>
</div>

<div class="field">
  <label for="servico_paragraph">
    Parágrafo Descritivo:
    <textarea id="servico_paragraph" name="servico_paragraph"
      rows="8"><?php echo esc_textarea($servico_paragraph); ?></textarea>
  </label>
</div>

<div class="field">
  <h4>Serviços</h4>
  <p><strong>Total de serviços: <span id="servicos-count"><?php echo count($servicos); ?></span></strong></p>
  <div id="servicos-container">
    <?php foreach ($servicos as $index => $servico): ?>
    <div class="servico-item" data-index="<?php echo $index; ?>">
      <h5>Serviço #<?php echo $index + 1; ?></h5>
      <label>
        Nome do Serviço:
        <input type="text" name="servicos[<?php echo $index; ?>][name]"
          value="<?php echo esc_attr($servico['name']); ?>">
      </label>
      <label>
        Imagem do Serviço:
        <input type="hidden" name="servicos[<?php echo $index; ?>][image]" class="image-url"
          value="<?php echo esc_attr($servico['image']); ?>">
        <button type="button" class="upload-image-button">Upload Imagem</button>
        <div class="image-preview">
          <?php if (!empty($servico['image'])): ?>
          <img src="<?php echo esc_url($servico['image']); ?>" style="max-width: 100%; height: auto;">
          <?php endif; ?>
        </div>
      </label>
      <button type="button" class="remove-servico">Remover</button>
    </div>
    <?php endforeach; ?>
  </div>
  <button type="button" id="add-servico">Adicionar Serviço</button>
</div>

<script>
function updateServicosCount() {
  const container = document.getElementById('servicos-container');
  const count = container.children.length;
  document.getElementById('servicos-count').textContent = count;

  // Reindexar todos os serviços
  Array.from(container.children).forEach((item, index) => {
    item.setAttribute('data-index', index);
    item.querySelector('h5').textContent = `Serviço #${index + 1}`;

    // Atualizar os nomes dos inputs
    const nameInput = item.querySelector('input[type="text"]');
    const imageInput = item.querySelector('input[type="hidden"]');

    nameInput.name = `servicos[${index}][name]`;
    imageInput.name = `servicos[${index}][image]`;
  });
}

document.getElementById('add-servico').addEventListener('click', function() {
  const container = document.getElementById('servicos-container');
  const index = container.children.length;

  console.log(`Adicionando serviço #${index + 1}`);

  const newServico = `
            <div class="servico-item" data-index="${index}">
                <h5>Serviço #${index + 1}</h5>
                <label>
                    Nome do Serviço:
                    <input type="text" name="servicos[${index}][name]" value="">
                </label>
                <label>
                    Imagem do Serviço:
                    <input type="hidden" name="servicos[${index}][image]" class="image-url" value="">
                    <button type="button" class="upload-image-button">Upload Imagem</button>
                    <div class="image-preview"></div>
                </label>
                <button type="button" class="remove-servico">Remover</button>
            </div>
        `;
  container.insertAdjacentHTML('beforeend', newServico);
  updateServicosCount();
});

document.addEventListener('click', function(event) {
  if (event.target.classList.contains('remove-servico')) {
    event.target.parentElement.remove();
    updateServicosCount();
  }

  if (event.target.classList.contains('upload-image-button')) {
    const imageInput = event.target.previousElementSibling;
    const previewContainer = event.target.nextElementSibling;

    // Open the media uploader
    const frame = wp.media({
      title: 'Escolher Imagem',
      button: {
        text: 'Usar esta imagem'
      },
      multiple: false
    });

    frame.on('select', function() {
      const attachment = frame.state().get('selection').first().toJSON();
      imageInput.value = attachment.url;
      previewContainer.innerHTML = '<img src="' + attachment.url + '" style="max-width: 100%; height: auto;">';
    });

    frame.open();
  }
});

// Inicializar contador
updateServicosCount();
</script>

<?php
    // Adicionando nonce para segurança
    wp_nonce_field('save_servico_meta', 'servico_nonce');
}

function add_servico_meta_box() {
    add_meta_box(
        'servico_meta_box', // ID
        'Configurações de Serviço', // Título
        'createFieldServicos', // Callback
        'servicos', // Novo CPT
        'normal', // Contexto
        'high' // Prioridade
    );
}
add_action('add_meta_boxes', 'add_servico_meta_box');

// Função para salvar os campos personalizados
function save_servico_meta($post_id) {
    // Verifica o nonce
    if (!isset($_POST['servico_nonce']) || !wp_verify_nonce($_POST['servico_nonce'], 'save_servico_meta')) {
        return;
    }

    // Verifica se o post é do tipo correto
    if (get_post_type($post_id) !== 'servicos') {
        return;
    }

    // Debug: Verifica quantos serviços estão sendo enviados
    error_log('Total de variáveis POST: ' . count($_POST, COUNT_RECURSIVE));
    error_log('Limite max_input_vars: ' . ini_get('max_input_vars'));
    
    if (isset($_POST['servicos'])) {
        error_log('Número de serviços recebidos: ' . count($_POST['servicos']));
    }

    // Salva as configurações
    $servicos = isset($_POST['servicos']) ? $_POST['servicos'] : array();
    
    // Filtra apenas serviços com dados válidos
    $servicos = array_filter($servicos, function($servico) {
        return !empty($servico['name']);
    });
    
    $servicos = array_map(function($servico) {
        return array(
            'name' => sanitize_text_field($servico['name']),
            'image' => sanitize_text_field($servico['image'] ?? ''),
        );
    }, $servicos);

    $servico_subtitle = isset($_POST['servico_subtitle']) ? sanitize_text_field($_POST['servico_subtitle']) : '';
    $servico_paragraph = isset($_POST['servico_paragraph']) ? sanitize_textarea_field($_POST['servico_paragraph']) : '';

    update_post_meta($post_id, 'servicos', $servicos);
    update_post_meta($post_id, 'servico_subtitle', $servico_subtitle);
    update_post_meta($post_id, 'servico_paragraph', $servico_paragraph);
    
    // Log do resultado final
    error_log('Serviços salvos: ' . count($servicos));
}
add_action('save_post', 'save_servico_meta');
// end - CONFIGURAÇÕES DE SERVIÇOS



// start - CONFIGURAÇÕES DE EMPRESA
// Criar o novo post type "Empresa"
function create_empresa_cpt() {
    $args = array(
        'labels' => array(
            'name' => __('Empresa'),
            'singular_name' => __('Empresa')
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'empresa'),
        'supports' => array('title'),
        'menu_icon' => 'dashicons-building', // Ícone do menu
    );
    register_post_type('empresa', $args);
}
add_action('init', 'create_empresa_cpt');

// Criar campos personalizados para empresa
function createFieldEmpresa() {
    global $post;
    $missao = get_post_meta($post->ID, 'missao', true);
    $visao = get_post_meta($post->ID, 'visao', true);
    $valores = get_post_meta($post->ID, 'valores', true);
    ?>

<style>
textarea,
input[type="text"] {
  width: 100%;
  margin-top: 5px;
}

.field {
  margin: 12px 0;
}
</style>

<div class="field">
  <label for="missao">
    Missão:
    <textarea id="missao" name="missao" rows="4"><?php echo esc_textarea($missao); ?></textarea>
  </label>
</div>

<div class="field">
  <label for="visao">
    Visão:
    <textarea id="visao" name="visao" rows="4"><?php echo esc_textarea($visao); ?></textarea>
  </label>
</div>

<div class="field">
  <label for="valores">
    Valores:
    <textarea id="valores" name="valores" rows="4"><?php echo esc_textarea($valores); ?></textarea>
  </label>
</div>

<?php
    // Adicionando nonce para segurança
    wp_nonce_field('save_empresa_meta', 'empresa_nonce');
}

function add_empresa_meta_box() {
    add_meta_box(
        'empresa_meta_box', // ID
        'Configurações de Empresa', // Título
        'createFieldEmpresa', // Callback
        'empresa', // Novo CPT
        'normal', // Contexto
        'high' // Prioridade
    );
}
add_action('add_meta_boxes', 'add_empresa_meta_box');

// Função para salvar os campos personalizados
function save_empresa_meta($post_id) {
    // Verifica o nonce
    if (!isset($_POST['empresa_nonce']) || !wp_verify_nonce($_POST['empresa_nonce'], 'save_empresa_meta')) {
        return;
    }

    // Verifica se o post é do tipo correto
    if (get_post_type($post_id) !== 'empresa') {
        return;
    }

    // Faz a atualização dos campos
    $missao = sanitize_textarea_field($_POST['missao']);
    $visao = sanitize_textarea_field($_POST['visao']);
    $valores = sanitize_textarea_field($_POST['valores']);

    update_post_meta($post_id, 'missao', $missao);
    update_post_meta($post_id, 'visao', $visao);
    update_post_meta($post_id, 'valores', $valores);
}
add_action('save_post', 'save_empresa_meta');
// end - CONFIGURAÇÕES DE EMPRESA


// start - CONFIGURAÇÕES DE EQUIPE
// Criar o novo post type "Equipe"
function create_equipe_cpt() {
    $args = array(
        'labels' => array(
            'name' => __('Equipe'),
            'singular_name' => __('Membro da Equipe')
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'equipe'),
        'supports' => array('title'),
        'menu_icon' => 'dashicons-groups', // Ícone do menu
    );
    register_post_type('equipe', $args);
}
add_action('init', 'create_equipe_cpt');

// Criar campos personalizados para equipe
function createFieldEquipe() {
    global $post;
    $foto = get_post_meta($post->ID, 'foto', true);
    $cargo = get_post_meta($post->ID, 'cargo', true);
    $descricao = get_post_meta($post->ID, 'descricao', true);
    ?>

<style>
textarea,
input[type="text"],
input[type="hidden"] {
  width: 100%;
  margin-top: 5px;
}

.field {
  margin: 12px 0;
}

.image-preview img {
  max-width: 150px;
  height: auto;
  object-fit: cover;
  margin-top: 10px;
}

.upload-image-button {
  background: rgb(21, 101, 192);
  color: #fff;
  border: 1px solid;
  padding: 10px 12px;
  border-radius: 4px;
  margin-top: 14px;
  cursor: pointer;
  min-width: 180px;
}
</style>

<div class="field">
  <label for="foto">
    Foto:
    <input type="hidden" id="foto" name="foto" value="<?php echo esc_attr($foto); ?>" />
    <button type="button" class="upload-image-button">Upload Imagem</button>
    <div class="image-preview">
      <?php if ($foto): ?>
      <img src="<?php echo esc_url($foto); ?>" alt="Prévia da foto" />
      <?php endif; ?>
    </div>
  </label>
</div>

<div class="field">
  <label for="cargo">
    Cargo:
    <input type="text" id="cargo" name="cargo" value="<?php echo esc_attr($cargo); ?>" />
  </label>
</div>

<div class="field">
  <label for="descricao">
    Descrição:
    <textarea id="descricao" name="descricao" rows="4"><?php echo esc_textarea($descricao); ?></textarea>
  </label>
</div>

<script>
document.querySelector('.upload-image-button').addEventListener('click', function(event) {
  const input = document.getElementById('foto');
  const preview = document.querySelector('.image-preview');
  const frame = wp.media({
    title: 'Escolher Imagem',
    button: {
      text: 'Usar esta imagem'
    },
    multiple: false
  });

  frame.on('select', function() {
    const attachment = frame.state().get('selection').first().toJSON();
    input.value = attachment.url;
    preview.innerHTML = '<img src="' + attachment.url + '" alt="Prévia da foto" />';
  });

  frame.open();
});
</script>

<?php
    // Adicionando nonce para segurança
    wp_nonce_field('save_equipe_meta', 'equipe_nonce');
}

function add_equipe_meta_box() {
    add_meta_box(
        'equipe_meta_box', // ID
        'Configurações de Membro da Equipe', // Título
        'createFieldEquipe', // Callback
        'equipe', // Novo CPT
        'normal', // Contexto
        'high' // Prioridade
    );
}
add_action('add_meta_boxes', 'add_equipe_meta_box');

// Função para salvar os campos personalizados
function save_equipe_meta($post_id) {
    // Verifica o nonce
    if (!isset($_POST['equipe_nonce']) || !wp_verify_nonce($_POST['equipe_nonce'], 'save_equipe_meta')) {
        return;
    }

    // Verifica se o post é do tipo correto
    if (get_post_type($post_id) !== 'equipe') {
        return;
    }

    // Faz a atualização dos campos
    $foto = sanitize_text_field($_POST['foto']);
    $cargo = sanitize_text_field($_POST['cargo']);
    $descricao = sanitize_textarea_field($_POST['descricao']);

    update_post_meta($post_id, 'foto', $foto);
    update_post_meta($post_id, 'cargo', $cargo);
    update_post_meta($post_id, 'descricao', $descricao);
}
add_action('save_post', 'save_equipe_meta');
// end - CONFIGURAÇÕES DE EQUIPE



// start - CONFIGURAÇÕES DE CLIENTES
// Criar o novo post type "Clientes"
function create_clientes_cpt() {
    $args = array(
        'labels' => array(
            'name' => __('Clientes'),
            'singular_name' => __('Cliente')
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'clientes'),
        'supports' => array('title'),
        'menu_icon' => 'dashicons-businessman', // Ícone do menu
    );
    register_post_type('clientes', $args);
}
add_action('init', 'create_clientes_cpt');

// Criar campos personalizados para clientes
function createFieldClientes() {
    global $post;
    $logo = get_post_meta($post->ID, 'logo', true);
    ?>

<style>
.field {
  margin: 12px 0;
}

.image-preview img {
  max-width: 150px;
  height: auto;
  object-fit: cover;
  margin-top: 10px;
}

.upload-image-button {
  background: rgb(21, 101, 192);
  color: #fff;
  border: 1px solid;
  padding: 10px 12px;
  border-radius: 4px;
  margin-top: 14px;
  cursor: pointer;
  min-width: 180px;
}
</style>

<div class="field">
  <label for="logo">
    Logo:
    <input type="hidden" id="logo" name="logo" value="<?php echo esc_attr($logo); ?>" />
    <button type="button" class="upload-image-button">Upload Imagem</button>
    <div class="image-preview">
      <?php if ($logo): ?>
      <img src="<?php echo esc_url($logo); ?>" alt="Prévia do logo" />
      <?php endif; ?>
    </div>
  </label>
</div>

<script>
document.querySelector('.upload-image-button').addEventListener('click', function(event) {
  const input = document.getElementById('logo');
  const preview = document.querySelector('.image-preview');
  const frame = wp.media({
    title: 'Escolher Imagem',
    button: {
      text: 'Usar esta imagem'
    },
    multiple: false
  });

  frame.on('select', function() {
    const attachment = frame.state().get('selection').first().toJSON();
    input.value = attachment.url;
    preview.innerHTML = '<img src="' + attachment.url + '" alt="Prévia do logo" />';
  });

  frame.open();
});
</script>

<?php
    // Adicionando nonce para segurança
    wp_nonce_field('save_clientes_meta', 'clientes_nonce');
}

function add_clientes_meta_box() {
    add_meta_box(
        'clientes_meta_box', // ID
        'Configurações de Cliente', // Título
        'createFieldClientes', // Callback
        'clientes', // Novo CPT
        'normal', // Contexto
        'high' // Prioridade
    );
}
add_action('add_meta_boxes', 'add_clientes_meta_box');

// Função para salvar os campos personalizados
function save_clientes_meta($post_id) {
    // Verifica o nonce
    if (!isset($_POST['clientes_nonce']) || !wp_verify_nonce($_POST['clientes_nonce'], 'save_clientes_meta')) {
        return;
    }

    // Verifica se o post é do tipo correto
    if (get_post_type($post_id) !== 'clientes') {
        return;
    }

    // Faz a atualização dos campos
    $logo = sanitize_text_field($_POST['logo']);
    update_post_meta($post_id, 'logo', $logo);
}
add_action('save_post', 'save_clientes_meta');
// end - CONFIGURAÇÕES DE CLIENTES



// start - CONTATO
// Criar o novo post type "Configurações de Contato"
function create_contato_cpt() {
    $args = array(
        'labels' => array(
            'name' => __('Contato'),
            'singular_name' => __('Contato')
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'config-contato'),
        'supports' => array('title'),
        'menu_icon' => 'dashicons-email-alt', // Ícone do menu
    );
    register_post_type('config_contato', $args);
}
add_action('init', 'create_contato_cpt');

// Criar campos personalizados para contato
function createFieldContato() {
    global $post;
    $localizacao = get_post_meta($post->ID, 'contato_localizacao', true);
    $telefone = get_post_meta($post->ID, 'contato_telefone', true);
    $email = get_post_meta($post->ID, 'contato_email', true);
    ?>

<style>
.field {
  margin: 12px 0;
  display: flex;
  flex-direction: column;
}
</style>

<div class="field">
  <label for="contato_localizacao">Localização:</label>
  <textarea id="contato_localizacao" name="contato_localizacao"><?php echo esc_textarea($localizacao); ?></textarea>
</div>
<div class="field">
  <label for="contato_telefone">Telefone:</label>
  <input type="text" id="contato_telefone" name="contato_telefone" value="<?php echo esc_attr($telefone); ?>" />
</div>
<div class="field">
  <label for="contato_email">E-mail:</label>
  <input type="email" id="contato_email" name="contato_email" value="<?php echo esc_attr($email); ?>" />
</div>

<?php
    // Adicionando nonce para segurança
    wp_nonce_field('save_contato_meta', 'contato_nonce');
}

// Adiciona o meta box ao post type
function add_contato_meta_box() {
    add_meta_box(
        'contato_meta_box', // ID
        'Contato', // Título
        'createFieldContato', // Callback
        'config_contato', // Novo CPT
        'normal', // Contexto
        'high' // Prioridade
    );
}
add_action('add_meta_boxes', 'add_contato_meta_box');

// Função para salvar os campos personalizados
function save_contato_meta($post_id) {
    // Verifica o nonce
    if (!isset($_POST['contato_nonce']) || !wp_verify_nonce($_POST['contato_nonce'], 'save_contato_meta')) {
        return;
    }

    // Verifica se o post é do tipo correto
    if (get_post_type($post_id) !== 'config_contato') {
        return;
    }

    // Faz a atualização dos campos
    if (isset($_POST['contato_localizacao'])) {
        update_post_meta($post_id, 'contato_localizacao', sanitize_textarea_field($_POST['contato_localizacao']));
    }
    if (isset($_POST['contato_telefone'])) {
        update_post_meta($post_id, 'contato_telefone', sanitize_text_field($_POST['contato_telefone']));
    }
    if (isset($_POST['contato_email'])) {
        update_post_meta($post_id, 'contato_email', sanitize_email($_POST['contato_email']));
    }
}
add_action('save_post', 'save_contato_meta');
// end CONTATO



// start - MAPA
// Criar o post type "Configurações de Mapa"
function create_mapa_cpt() {
    $args = array(
        'labels' => array(
            'name' => __('Mapa'),
            'singular_name' => __('Mapa')
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'config-mapa'),
        'supports' => array('title'),
        'menu_icon' => 'dashicons-location-alt', // Ícone do menu
    );
    register_post_type('config_mapa', $args);
}
add_action('init', 'create_mapa_cpt');

// Criar campos personalizados para o mapa
function createFieldMapa() {
    global $post;
    $map_iframe = get_post_meta($post->ID, 'map_iframe', true);
    ?>

<div class="field">
  <label for="map_iframe">Código do Mapa (Iframe):</label>
  <textarea id="map_iframe" name="map_iframe" rows="5" style="width: 100%;"><?= $map_iframe ?></textarea>
</div>

<?php
}

// Adiciona o meta box ao post type
function add_mapa_meta_box() {
    add_meta_box(
        'mapa_meta_box', // ID
        'Configurações de Mapa', // Título
        'createFieldMapa', // Callback
        'config_mapa', // Novo CPT
        'normal', // Contexto
        'high' // Prioridade
    );
}
add_action('add_meta_boxes', 'add_mapa_meta_box');

// Função para salvar os campos personalizados
function save_mapa_meta($post_id) {
    // Verifica se o post é do tipo correto
    if (get_post_type($post_id) !== 'config_mapa') {
        return;
    }

    if (isset($_POST['map_iframe'])) {
        update_post_meta($post_id, 'map_iframe', $_POST['map_iframe']);
    }
}
add_action('save_post', 'save_mapa_meta');
// end - MAPA



// start - OCULTANDO BOTÔES DENTRO DOS POST TYPES
function hide_add_new_button() {
    global $pagenow;
    if ($pagenow === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'servicos' || $_GET['post'] === '92' ) {
        echo '<style type="text/css">.page-title-action { display: none!important; }</style>';
        echo '<style type="text/css">.submitdelete.deletion, .submitdelete, .trash { display: none!important; }</style>';
    }

    // ocutando botão deletar post menu
    if ($pagenow === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'list-menu' || $_GET['post'] === '66' ) {
        echo '<style type="text/css">.page-title-action { display: none!important; }</style>';
        echo '<style type="text/css">.submitdelete.deletion, .submitdelete, .trash { display: none!important; }</style>';
    }

    // ocutando botão deletar
    if ($pagenow === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'config_secoes' || $_GET['post'] === '84' ) {
        echo '<style type="text/css">.page-title-action { display: none!important; }</style>';
        echo '<style type="text/css">.submitdelete.deletion, .submitdelete, .trash { display: none!important; }</style>';
    }

    if ($pagenow === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'empresa' || $_GET['post'] === '120' ) {
        echo '<style type="text/css">.page-title-action { display: none!important; }</style>';
        echo '<style type="text/css">.submitdelete.deletion, .submitdelete, .trash { display: none!important; }</style>';
    }

    if ($pagenow === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'config_contato' || $_GET['post'] === '144' ) {
        echo '<style type="text/css">.page-title-action { display: none!important; }</style>';
        echo '<style type="text/css">.submitdelete.deletion, .submitdelete, .trash { display: none!important; }</style>';
    }

    if ($pagenow === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'config_mapa' || $_GET['post'] === '150' ) {
        echo '<style type="text/css">.page-title-action { display: none!important; }</style>';
        echo '<style type="text/css">.submitdelete.deletion, .submitdelete, .trash { display: none!important; }</style>';
    }
}
add_action('admin_head', 'hide_add_new_button');

// Remover submenus
function remove_menu_items() {
    global $submenu;
    if (isset($submenu['edit.php?post_type=servicos'])) {
        unset($submenu['edit.php?post_type=servicos'][10]); // Remove o "Adicionar Novo"
    }

    if (isset($submenu['edit.php?post_type=list-menu'])) {
        unset($submenu['edit.php?post_type=list-menu'][10]); // Remove o "Adicionar Novo"
    }

    if (isset($submenu['edit.php?post_type=config_secoes'])) {
        unset($submenu['edit.php?post_type=config_secoes'][10]); // Remove o "Adicionar Novo"
    }

    if (isset($submenu['edit.php?post_type=empresa'])) {
        unset($submenu['edit.php?post_type=empresa'][10]); // Remove o "Adicionar Novo"
    }

    if (isset($submenu['edit.php?post_type=config_contato'])) {
        unset($submenu['edit.php?post_type=config_contato'][10]); // Remove o "Adicionar Novo"
    }

    if (isset($submenu['edit.php?post_type=config_mapa'])) {
        unset($submenu['edit.php?post_type=config_mapa'][10]); // Remove o "Adicionar Novo"
    }
}
add_action('admin_menu', 'remove_menu_items');
// end - OCULTANDO BOTÔES DENTRO DOS POST TYPES