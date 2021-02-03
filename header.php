<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package andrew
 */
global $post;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, minimum-scale=1">
	<title>Andrew Cauchi</title>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="/andrewcauchi/wp-content/themes/andrew/style.css">
</head>
<body id="<?= $post->post_name?>-wp-page">
<div id="page" class="site">
	<div class="cursor-dot-outline"></div>
	<div class="cursor-dot"></div>

	<header id="masthead" class="site-header">
		<div class="container header-container">
			<?php 
				$menu_id = 2;
				$header_nav = wp_get_nav_menu_items($menu_id);
				$menu = wp_get_nav_menu_object($menu_id);
				$fields = get_fields($menu);
			?>

			<div class="site-logo">
				<a href="/" class="back-to-top">
					<img src="<?= $fields['site_logo']['url']; ?>" alt="<?=$fields['site_logo']['alt']; ?>">
				</a>
			</div>

			<div class="mobile-navigation">
				<div class="open-close-menu" id="nav-icon">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>

			<div class="desktop-navigation">
				<ul class="d-menu">
					<?php foreach($header_nav as $item) { ?>
						<li class="<?= $item->classes[0]?>">
							<a href="<?= $item->url; ?>"><?= $item->title; ?></a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</header><!-- #masthead -->
	
	<div class="mobile-menu">
		<ul>
			<?php foreach($header_nav as $item) { ?>
				<li class="<?= $item->classes[0]; ?>">
					<a href="<?= $item->url; ?>"><?= $item->title; ?></a>
				</li>
			<?php } ?>
		</ul>
	</div>
