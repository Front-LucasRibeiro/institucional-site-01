<?php
// Obtendo os dados do post mais recente do tipo "list-menu"
$menu_args = array(
  'post_type' => 'list-menu',
  'posts_per_page' => 1,
);
$menu_query = new WP_Query($menu_args);

$whatsapp_link = ''; // Inicializa a variável do WhatsApp
$logo_url = ''; // Inicializa a variável do logo

if ($menu_query->have_posts()) {
  while ($menu_query->have_posts()) : $menu_query->the_post();
    $whatsapp_link = get_post_meta(get_the_ID(), 'itemWhatsAppLink', true); // Obtém o link do WhatsApp
    $logo_url = wp_get_attachment_url(get_post_meta(get_the_ID(), 'itemLogo', true)); // Obtém a URL do logo
  endwhile;
  wp_reset_postdata();
}
?>

<div class="whats-flutuante">
  <?php if ($whatsapp_link): ?>
  <a href="<?= esc_url($whatsapp_link); ?>" target="_blank" title="WhatsApp">
    <span class="icon"></span>
  </a>
  <?php endif; ?>
</div>

<div id="scroll-top" title="voltar ao topo">
  <svg class="ast-arrow-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
    x="0px" y="0px" width="26px" height="16.043px" viewBox="57 35.171 26 16.043"
    enable-background="new 57 35.171 26 16.043" xml:space="preserve">
    <path d="M57.5,38.193l12.5,12.5l12.5-12.5l-2.5-2.5l-10,10l-10-10L57.5,38.193z"></path>
  </svg>
</div>

<footer>
  <div class="logo">
    <?php if ($logo_url): ?>
    <img src="<?= esc_url($logo_url); ?>" alt="Logo">
    <?php endif; ?>
  </div>
  <p>&copy; 2024 <?php echo esc_html(get_bloginfo('name')); ?> - Todos os direitos reservados - <a
      href="https://www.sistemasflex.com.br" target="_blank" class="link-development">Sistemas Flex</a></p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/src/build/js/scripts.js?v=10"></script>

<script>
// Script para scroll suave para seção de contato após envio do formulário
document.addEventListener('DOMContentLoaded', function() {

  // Função para scroll suave para o contato
  function scrollSuaveParaContato() {
    const contatoSection = document.getElementById('contato');
    if (contatoSection) {
      // Adiciona classe para animação
      contatoSection.classList.add('focus-contato');

      // Scroll suave
      contatoSection.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });

      // Remove a classe após a animação
      setTimeout(function() {
        contatoSection.classList.remove('focus-contato');
      }, 2000);
    }
  }

  // Detecta mudanças no DOM para capturar mensagens de confirmação
  const observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      if (mutation.type === 'childList') {
        mutation.addedNodes.forEach(function(node) {
          // Verifica se é um elemento HTML
          if (node.nodeType === 1) {
            // Procura por mensagens de confirmação do WPForms
            const confirmacao = node.querySelector ?
              node.querySelector('.wpforms-confirmation-container-full, .wpforms-confirmation-scroll') :
              (node.classList && node.classList.contains('wpforms-confirmation-container-full') ? node :
                null);

            if (confirmacao || (node.classList && (node.classList.contains(
                'wpforms-confirmation-container-full') || node.classList.contains(
                'wpforms-confirmation-scroll')))) {
              setTimeout(function() {
                scrollSuaveParaContato();
              }, 300);
            }
          }
        });
      }
    });
  });

  // Observa mudanças na seção de contato e no documento
  const contatoSection = document.getElementById('contato');
  if (contatoSection) {
    observer.observe(contatoSection, {
      childList: true,
      subtree: true
    });
  }

  // Também observa o documento inteiro para capturar confirmações
  observer.observe(document.body, {
    childList: true,
    subtree: true
  });

  // Intercepta o envio do formulário WPForms
  document.addEventListener('wpformsFormSubmitSuccess', function(e) {
    setTimeout(function() {
      scrollSuaveParaContato();
    }, 500);
  });

  // Fallback para formulários que recarregam a página
  window.addEventListener('load', function() {
    // Verifica se há mensagem de confirmação já presente
    const confirmacao = document.querySelector(
      '.wpforms-confirmation-container-full, .wpforms-confirmation-scroll');
    if (confirmacao) {
      setTimeout(function() {
        scrollSuaveParaContato();
      }, 500);
    }

    // Verifica se há hash na URL para contato
    if (window.location.hash === '#contato') {
      setTimeout(function() {
        scrollSuaveParaContato();
      }, 1000);
    }
  });

  // Intercepta cliques em links para #contato
  document.addEventListener('click', function(e) {
    const target = e.target;
    if (target.matches('a[href="#contato"], a[href*="#contato"]') ||
      target.closest('a[href="#contato"], a[href*="#contato"]')) {
      e.preventDefault();
      scrollSuaveParaContato();

      // Atualiza a URL sem recarregar a página
      if (history.pushState) {
        history.pushState(null, null, '#contato');
      } else {
        window.location.hash = '#contato';
      }
    }
  });

  // Detecta quando há parâmetros na URL que indicam envio de formulário
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.get('wpforms') || urlParams.get('success') === '1') {
    setTimeout(function() {
      scrollSuaveParaContato();
    }, 1000);
  }
});
</script>

<?php
// aqui precisa ser setado o id do post type manualmente
$main_color = get_post_meta(66, 'mainColor', true);

// Verifica se está vazio e define um valor padrão
$main_color = $main_color ?: '#E8521C'; // Cor padrão

echo "<style>
            :root {
                --main-color: {$main_color};
            }
        </style>";
?>
</body>

</html>