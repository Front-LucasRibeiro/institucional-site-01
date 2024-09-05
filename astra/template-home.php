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

<section class="section-topo">
  <ul class="carousel-top container">
    <li>
      <img src="<?= $home; ?>/src/images/Ativo-1.png" alt="Item 1">
      <span class="text">Item 1</span>
    </li>
    <li>
      <img src="<?= $home; ?>/src/images/Ativo-4.png" alt="Item 3">
      <span class="text">Item 3</span>
    </li>
    <li>
      <img src="<?= $home; ?>/src/images/Ativo-1.png" alt="Item 1">
      <span class="text">Item 1</span>
    </li>
    <li>
      <img src="<?= $home; ?>/src/images/Ativo-4.png" alt="Item 3">
      <span class="text">Item 3</span>
    </li>
  </ul>
</section>

<section class="servicos"></section>
<section class="portfolio"></section>
<section class="empresa"></section>
<section class="equipe"></section>
<section class="clientes"></section>
<section class="blog"></section>
<section class="contato"></section>
<section class="mapa-endereco"></section>

<?php get_footer(); ?>
