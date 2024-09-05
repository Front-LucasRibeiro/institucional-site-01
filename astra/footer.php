<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

		if ( ! defined( 'ABSPATH' ) ) {
			exit; // Exit if accessed directly.
		}
		?>
		</div> <!-- ast-container -->
		</div><!-- #content -->

		</div><!-- #page -->

		<footer>
			meu footer
		</footer>

		<?php $home = get_template_directory_uri(); ?>
		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<script type="text/javascript" src="<?= $home; ?>/src/build/js/scripts.js?v=10"></script>
	</body>
</html>
