<?php
/*
Template Name: Piticast
*/
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

<script type='text/javascript' charset='utf-8' src='https://www.buzzsprout.com/1757249.js?container_id=buzzsprout-large-player-1757249&player=large'></script>

<?php get_footer(); ?>