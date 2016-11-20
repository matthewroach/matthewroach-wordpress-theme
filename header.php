<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package matthewroach
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header h-card" role="banner">
		<div class="site-branding">
			<h1 class="site-title">
				<img class="u-photo hide" src="http://images.matthewroach.me/blog/20161120211539/2016-05-31-18.11.35.jpg" al="Image of Matthew Roach" />
				<p class="p-note hide">
					Web Developer, loves to tinker on side projects, loves a cup of tea, married to
					@pamelaroach, Father to @toddroach1 and Alice. Welsh living in Scotland.
				</p>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="me" class="u-url" title="Matthew Roach">
					<?php bloginfo( 'name' ); ?>
				</a>
			</h1>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav>
	</header>

	<div id="content" class="site-content">
