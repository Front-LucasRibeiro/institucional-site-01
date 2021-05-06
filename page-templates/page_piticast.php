<?php
/*
Template Name: Piticast
*/
define( 'WP_USE_THEMES', false );
get_header(); 
global $sa_options;
$sa_settings = get_option( 'sa_options', $sa_options );
?>

<!-- Content -->
<div class="institucional page piticast">  
  <div class="container">
    <div id='buzzsprout-large-player-1757249'></div>
    <?php the_content(); ?>
  </div>
</div>

<?php get_footer(); ?>