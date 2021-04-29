<?php
$css_escolhido = 'page';
require_once('header.php');
?>

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

<div class="institucional autor">
  autor
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

<?php 
	$js_escolhido = 'page';
	require_once('footer.php');
?>