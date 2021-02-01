<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package andrew
 */

?>

	<footer id="colophon" class="site-footer">
		<?php 
			$menu_id = 3;
			$footer_nav = wp_get_nav_menu_items($menu_id);
			$menu = wp_get_nav_menu_object($menu_id);
			$fields = get_fields($menu);
		?>

		<section class="footer-contact-section">
			<div class="container footer-contact-container">
				<div class="footer-contact-details">
					<h2 class="footer-contact-title"><?= $fields['contact_footer']['title']; ?></h2>
					<div class="footer-contact-description">
						<p><?= $fields['contact_footer']['tagline']; ?></p>
					</div>
					<div class="footer-contact-link">
						<a href="<?= $fields['contact_footer']['button']['button_link']; ?>">
							<?= $fields['contact_footer']['button']['button_text']; ?>
						</a>
					</div>
				</div>
			</div>
		</section>

		<section class="footer-nav-section">
			<div class="container footer-nav-container">
				<h1>FOOTER</h1>
			</div>
		</section>
	</footer><!-- #colophon -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
	<script src="/andrewcauchi/wp-content/themes/andrew/js/app.js"></script>
</div><!-- #page -->

</body>
</html>
