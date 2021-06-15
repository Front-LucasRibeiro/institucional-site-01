<?php
/*
Template Name: Pitiplay
*/
define( 'WP_USE_THEMES', false );
get_header(); 
global $sa_options;
$sa_settings = get_option( 'sa_options', $sa_options );
?>

<!-- Content -->
<div class="institucional page pitiplay">  
  <div class="container"> 
    <div class="hide banner-top-pitiplay">
      <?php the_post_thumbnail(); ?>
    </div>   

    <?php the_content(); ?>
  </div>
</div>

<?php get_footer(); ?>