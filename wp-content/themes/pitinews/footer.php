
<?php $home = get_template_directory_uri(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script data-ad-client="ca-pub-6636390705016140" async src=https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js></script>
<script>
  var categoryJSON = <?= get_post_meta( 99, 'category-color', true) ?>
</script>

<script src="<?= $home; ?>/assets/js/lib/slick.min.js"></script>
<script src="<?= $home; ?>/assets/js/geral.js"></script>
<script src="<?= $home; ?>/assets/js/<?= $js_escolhido; ?>.js"></script>

<?php	wp_footer(); ?>
</body>
</html>
