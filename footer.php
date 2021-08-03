<footer>
  <div class="container">
    <div class="box-colunas desk">
      

      <div class="secao-pitinews">
        <h3 class="title"><?= get_post_meta( 260, 'item1-footer', true) ?></h3>

        <?php
          $args = array( 'theme_location' => 'footer-menu-pitinews');
          wp_nav_menu( $args ); 
        ?>
      </div>
      <div class="secao-categorias">
        <h3 class="title"><?= get_post_meta( 271, 'item5-footer', true) ?></h3>

        <?php
          $args = array( 'theme_location' => 'footer-menu-categorias');
          wp_nav_menu( $args ); 
        ?>
      </div>
      <div class="secao-outros-canais">
        <h3 class="title"><?= get_post_meta( 262, 'item10-footer', true) ?></h3>

        <?php
          $args = array( 'theme_location' => 'footer-menu-outros-canais');
          wp_nav_menu( $args ); 
        ?>
      </div>
      <div class="secao-piticas">
        <h3 class="title"><?= get_post_meta( 272, 'item13-footer', true) ?></h3>

        <?php
          $args = array( 'theme_location' => 'footer-menu-piticas');
          wp_nav_menu( $args ); 
        ?>
      </div>
    </div>

    <div class="box-colunas mob">
      <div class="col col-left">
        <div class="secao-pitinews">
          <h3 class="title"><?= get_post_meta( 260, 'item1-footer', true) ?></h3>

          <?php
            $args = array( 'theme_location' => 'footer-menu-pitinews');
            wp_nav_menu( $args ); 
          ?>
        </div>
        <div class="secao-outros-canais">
          <h3 class="title"><?= get_post_meta( 262, 'item10-footer', true) ?></h3>

          <?php
            $args = array( 'theme_location' => 'footer-menu-outros-canais');
            wp_nav_menu( $args ); 
          ?>
        </div>
      </div>

      <div class="col col-right">
        <div class="secao-categorias">
          <h3 class="title"><?= get_post_meta( 271, 'item5-footer', true) ?></h3>

          <?php
            $args = array( 'theme_location' => 'footer-menu-categorias');
            wp_nav_menu( $args ); 
          ?>
        </div>

        <div class="secao-piticas">
          <h3 class="title"><?= get_post_meta( 272, 'item13-footer', true) ?></h3>

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

<script>
  var categoryJSON = <?= get_post_meta( 99, 'category-color', true) ?>
</script>

<!-- start libs  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6636390705016140" crossorigin="anonymous"></script>
<script src="<?= $home; ?>/assets/js/lib/slick.min.js"></script>
<script src="<?= $home; ?>/assets/js/lib/jquery.mask.min.js"></script>
<script src="https://kit.fontawesome.com/76ba51fd1c.js" crossorigin="anonymous"></script>
<script async src="https://cse.google.com/cse.js?cx=9801e0d31782c996e"></script>
<!-- end libs  -->

<!-- start scripts  -->
<script src="<?= $home; ?>/assets/js/geral.js"></script>
<script src="<?= $home; ?>/assets/js/page.js"></script>
<script src="<?= $home; ?>/assets/js/<?= $js_escolhido; ?>.js"></script>
<!-- end scripts  -->

<?php	wp_footer(); ?>
</body>
</html>
