<?php
/*
Template Name: Fale Conosco
*/
define( 'WP_USE_THEMES', false );
get_header(); 
global $sa_options;
$sa_settings = get_option( 'sa_options', $sa_options );
?>

<!-- Content -->
<div class="institucional fale-conosco">
  <div class="box-top">
      <span class="bg-icons"></span>

      <div class="content-wrapper">
        <div class="box-title">
          <?php the_title(); ?>
        </div>
        <span class="image"></span>
      </div>
  </div>
  
  <div class="container">
      
      <?php the_content(); ?>
  </div>
</div>

<?php get_footer(); ?>