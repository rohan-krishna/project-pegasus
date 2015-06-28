<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Project Pegasus
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/inc/owl.carousel.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/inc/bootstrap.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>

<script src="//code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/owl.carousel.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'project-pegasus' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-content">

		<div class="site-logo">
			
		</div><!-- .site-logo !-->
		
		<div class="site-branding">
			<a href="<?php echo bloginfo('home'); ?>">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/newLogo.png" draggable="false" alt="<?php bloginfo('name'); ?>" style="float:left;"/>
			</a>
			<h1 class="site-title">Dr.MGR<br/>
			<span class="thin-font">Educational & Research Institute</span><br/>
			<span class="medium-font">University</span></h1>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/typo.png" draggable="false" alt="<?php bloginfo('name'); ?>" style="float:right;margin-top: 3%;" />
		</div><!-- .site-branding -->

		

		</div><!-- .header-content -->


	</header><!-- #masthead -->

	<div class="nav-wrapper">

		<nav id="site-navigation" class="main-navigation" role="navigation">			
			<!-- Primary Menu -->
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','container_class' => 'container' ) ); ?>
		</nav><!-- #site-navigation -->
		
	</div><!-- nav-wrapper -->
	<div class="hidden-nav">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-4">
						<h3>About Univerity</h3>
						<?php wp_nav_menu(array( 'theme_location' => 'secondary', 'menu_id' => 'secondary' )); ?>
					</div>
					<div class="col-md-2">
						<h3>Academics</h3>
						<?php wp_nav_menu(array( 'theme_location' => 'academics', 'menu_id' => 'academics' )); ?>
					</div>
					<div class="col-md-3">
						<h3>Admissions</h3>
						<?php wp_nav_menu(array( 'theme_location' => 'research', 'menu_id' => 'research' )); ?>
					</div>
					<div class="col-md-3">
						<h3>Research</h3>
						<?php wp_nav_menu(array( 'theme_location' => 'admissions', 'menu_id' => 'admissions' )); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php if ( is_page() ) { ?>

	<div class="page-title">
		<div class="container">
			<h1><?php the_title(); ?>
		</div>
	</div>	

	<?php } ?>

	<div id="content" class="site-content">


		
