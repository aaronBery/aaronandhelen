<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Boho
 * @since Boho
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="/wp-content/themes/boho/style.css" />
<script src="<?php echo get_template_directory_uri(); ?>/js/require.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="mobile">
	<!-- <h1 class="mobile-header">...use your desktop</h1> -->
	<h1>We didn't build this site for mobiles....sorry xx</h1>
	<img src="/wp-content/themes/boho/images/computer.png" />
	<p>If you seriously don't have access to a laptop or desktop let us know and i'll get coding.... :-)</p>
</div>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<img src="/wp-content/themes/boho/images/bee.png" id="fairy">
		<!-- <img src="/wp-content/themes/boho/images/bear.png" id="bear"> -->
		<!-- <img src="/wp-content/themes/boho/images/flowers30.png" class="flowers flowers--left flowers--top">
		<img src="/wp-content/themes/boho/images/flowers30.png" class="flowers flowers--left flowers--bottom">
		<img src="/wp-content/themes/boho/images/flowers30.png" class="flowers flowers--right flowers--top">
		<img src="/wp-content/themes/boho/images/flowers30.png" class="flowers flowers--right flowers--bottom"> -->
		<script>
		require(['app/animation']);
		//require(['app/flowers']);
		</script>
		<script>
		//require(['app/animation']);
		</script>
		<div class="logo-line logo-line--leftline"></div>
		<div class="site-header site-header--date">20.06.2015</div>
		<hgroup>
			<img src="<?php echo get_template_directory_uri(); ?>/images/frame.png" class="header-frame">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">Aaron & Helen<?php //bloginfo( 'name' ); ?></a></h1>
			<!-- <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2> -->
		</hgroup>
		<div class="site-header site-header--location">Bignor Park</div>
		<div class="logo-line logo-line--rightline"></div>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<!--<button class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></button>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			-->
			<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			<?php wp_nav_menu(); ?>
		</nav><!-- #site-navigation -->

		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->
	<div id="main" class="wrapper">