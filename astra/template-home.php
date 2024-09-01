<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
<?php $home = get_template_directory_uri(); ?>

<section class="banner-top">
  <div class="container-banner">
    <div>
      <img src="<?= $home; ?>/src/images/BANNER-HOME.png" alt="">
      <div class="info-text">
        <div class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum possimus aliquam assumenda fugit quaerat, praesentium quas dolores libero ratione commodi vero impedit optio blanditiis obcaecati hic adipisci cum odio illum.</div>
      </div>
    </div>
    <div>
      <img src="<?= $home; ?>/src/images/construction-cranes-and-concrete-structure-at-suns-PBLEVC8.jpg" alt="">
      <div class="info-text">
        <div class="text">
          Texto Informativo 2
        </div>  
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
