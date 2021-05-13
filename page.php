<?php
$css_escolhido = 'page';
$has_reset_css = false;
require_once('header.php');
?>

<div class="institucional page">  
  <div class="container">
    <?php the_content(); ?>
  </div>
</div>

<?php 
	$js_escolhido = 'page';
	require_once('footer.php');
?>