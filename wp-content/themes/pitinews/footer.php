<footer>
  <div class="container">
    <div class="box-colunas desk">
      

      <div class="secao-pitinews">
        <h3 class="title"><?= get_post_meta( 195, 'item1-footer', true) ?></h3>

        <?php
          $args = array( 'theme_location' => 'footer-menu-pitinews');
          wp_nav_menu( $args ); 
        ?>
      </div>
      <div class="secao-categorias">
        <h3 class="title"><?= get_post_meta( 199, 'item5-footer', true) ?></h3>

        <?php
          $args = array( 'theme_location' => 'footer-menu-categorias');
          wp_nav_menu( $args ); 
        ?>
      </div>
      <div class="secao-outros-canais">
        <h3 class="title"><?= get_post_meta( 204, 'item10-footer', true) ?></h3>

        <?php
          $args = array( 'theme_location' => 'footer-menu-outros-canais');
          wp_nav_menu( $args ); 
        ?>
      </div>
      <div class="secao-piticas">
        <h3 class="title"><?= get_post_meta( 207, 'item13-footer', true) ?></h3>

        <?php
          $args = array( 'theme_location' => 'footer-menu-piticas');
          wp_nav_menu( $args ); 
        ?>
      </div>
    </div>

    <div class="box-colunas mob">
      <div class="col col-left">
        <div class="secao-pitinews">
          <h3 class="title"><?= get_post_meta( 195, 'item1-footer', true) ?></h3>

          <?php
            $args = array( 'theme_location' => 'footer-menu-pitinews');
            wp_nav_menu( $args ); 
          ?>
        </div>
        <div class="secao-outros-canais">
          <h3 class="title"><?= get_post_meta( 204, 'item10-footer', true) ?></h3>

          <?php
            $args = array( 'theme_location' => 'footer-menu-outros-canais');
            wp_nav_menu( $args ); 
          ?>
        </div>
      </div>

      <div class="col col-right">
        <div class="secao-categorias">
          <h3 class="title"><?= get_post_meta( 199, 'item5-footer', true) ?></h3>

          <?php
            $args = array( 'theme_location' => 'footer-menu-categorias');
            wp_nav_menu( $args ); 
          ?>
        </div>

        <div class="secao-piticas">
          <h3 class="title"><?= get_post_meta( 207, 'item13-footer', true) ?></h3>

          <?php
            $args = array( 'theme_location' => 'footer-menu-piticas');
            wp_nav_menu( $args ); 
          ?>
        </div>
      </div>
    </div>


    <div class="box-bottom">
      <div class="copy">&copy; 2021 PitiNews</div>

      <div class="redes-socias">
        <ul>
          <li class="facebook"><a href="<?= get_post_meta( 210, 'link_face', true) ?>" target="_blank"></a></li>
          <li class="twitter"><a href="<?= get_post_meta( 208, 'link_twitter', true) ?>" target="_blank"></a></li>
          <li class="instagram"><a href="<?= get_post_meta( 209, 'link_instagram', true) ?>" target="_blank"></a></li>
        </ul>
      </div>

      <div class="developed">
        <span class="text">Desenvolvimento</span>
        <a href="https://seriedesign.com.br/" target="_blank">
          <span class="logo-serie"></span>
        </a>
      </div>
      
    </div>
  </div>
</footer>




<?php $home = get_template_directory_uri(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script data-ad-client="ca-pub-6636390705016140" async src=https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js></script>
<script>
  var categoryJSON = <?= get_post_meta( 99, 'category-color', true) ?>
</script>

<script src="<?= $home; ?>/assets/js/lib/slick.min.js"></script>
<script src="<?= $home; ?>/assets/js/lib/jquery.mask.min.js"></script>
<script src="<?= $home; ?>/assets/js/geral.js"></script>
<script src="<?= $home; ?>/assets/js/page.js"></script>
<script src="<?= $home; ?>/assets/js/<?= $js_escolhido; ?>.js"></script>

<?php	wp_footer(); ?>
</body>
</html>
