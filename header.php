<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bbginnovate
 */


global $templateName;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>

<!-- Basic Page Needs
================================================== -->

	<meta charset="utf-8">
	<!-- <meta charset="<?php bloginfo( 'charset' ); ?>">  -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">


<!-- Mobile Specific Metas
================================================== -->

	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


<!-- Title, meta description and CSS
================================================== -->

<?php wp_head(); ?>




<!-- IE <9 patch
================================================== -->

	<!--[if lt IE 9]>
	  <script src="<?php echo get_template_directory_uri() ?>/js/vendor/html5shiv.js"></script>
	  <script src="<?php echo get_template_directory_uri() ?>/js/vendor/respond.js"></script>
	  <script src="<?php echo get_template_directory_uri() ?>/js/vendor/selectivizr-min.js"></script>
	<![endif]-->



<!-- Favicons
================================================== -->
	<!-- 128x128 -->
	<link rel="shortcut icon" type="image/ico" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon.ico" />
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon.png" />

	<!-- 192x192, as recommended for Android
	http://updates.html5rocks.com/2014/11/Support-for-theme-color-in-Chrome-39-for-Android
	-->
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon-192.png" />

	<!-- 57x57 (precomposed) for iPhone 3GS, pre-2011 iPod Touch and older Android devices -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon-57.png">
	<!-- 72x72 (precomposed) for 1st generation iPad, iPad 2 and iPad mini -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon-72.png">
	<!-- 114x114 (precomposed) for iPhone 4, 4S, 5 and post-2011 iPod Touch -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon-114.png">
	<!-- 144x144 (precomposed) for iPad 3rd and 4th generation -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon-144.png">

</head>


<body <?php body_class(); ?>>
<div id="page" class="site main-content" role="main">
	<a class="skipnav skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bbginnovate' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="usa-disclaimer">
			<div class="usa-grid">
				<span class="usa-disclaimer-official">
					<img class="usa-flag_icon" alt="U.S. flag signifying that this is a United States federal government website" src="<?php echo get_template_directory_uri() ?>/img/us_flag_small.png">
					An official website of the United States government
				</span>
				<span class="usa-disclaimer-stage">This site is currently in alpha. <a href="https://18f.gsa.gov/dashboard/stages/#alpha">Learn more.</a></span>
			</div>
		</div>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'bbginnovate' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->


		<?php 
			/* exclude default site-branding on the custom home page */
			if ($templateName!="customHome"){
		?>

		<div class="usa-bbg-site-branding">
			<div id="header" class="usa-grid">

				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="usa-heading usa-heading-site-title site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="bbg-site-logo"></span><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<h1 class="usa-heading usa-heading-site-title site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="bbg-site-logo"></span><?php echo bbginnovate_site_name_html(); ?></a></h1>
				<?php endif;
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<!--<h3 class="usa-heading usa-heading-site-description site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>-->
				<?php endif; ?>
			</div>

		</div><!-- .site-branding -->

		<?php 
			}
		?>


	</header><!-- #masthead -->

	<div id="content" class="site-content">
