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

		<?php if(get_the_title() == 'Home'){ ?>
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
		<?php } ?>

		<section class="footer-nav-section">
			<div class="container footer-nav-container">
				<div class="footer-nav-details">
					<div class="left-section">
						<img class="footer-logo" src="<?= $fields['site_logo']['url']; ?>" alt="<?= $fields['site_logo']['alt']; ?>">
						<span class="footer-motto"><?= $fields['footer_tagline']; ?></span>
					</div>

					<div class="center-one-section">
						<h3 class="footer-links-title"><?= $fields['navigation_title']; ?></h3>
						<ul class="footer-navigation">
							<?php foreach($footer_nav as $item) { ?>
								<li class="navigation-item">
									<a href="<?= $item->url; ?>"><?= $item->title; ?></a>
								</li>
							<?php } ?>
						</ul>
					</div>

					<div class="center-two-section">
						<h3 class="footer-contact-title"><?= $fields['contact_section']['title']; ?></h3>
						<div class="button orange-button">
							<a href="<?= $fields['contact_section']['button']['button_link']; ?>">
								<?= $fields['contact_section']['button']['button_text']; ?>
							</a>
						</div>
					</div>

					
					<div class="right-section">
						<h3 class="social-title"><?= $fields['social_section']['title']; ?></h3>
						<div class="social-links">
							<?php foreach($fields['social_section']['social'] as $link){ ?>
								<div class="link">
									<a href="<?= $link['link']; ?>" target="_blank">
										<img class="link-icon" src="<?= $link['icon']['url']; ?>" alt="<?= $link['icon']['alt']; ?>">
										<span class="link-title"><?= $link['title']; ?></span>
									</a>
								</div>
							<?php } ?>
						</div>
					</div>

					<div class="bottom-section">
						<span class="rights">&#169; <?= date("Y"); ?> All rights reserved</span>
					</div>
				</div>
			</div>
		</section>
	</footer><!-- #colophon -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
	<script src="/andrewcauchi/wp-content/themes/andrew/js/app.js"></script>
</div><!-- #page -->

</body>
</html>
