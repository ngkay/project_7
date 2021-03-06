<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php  wp_title('|', true, 'right'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!-- stylesheets should be enqueued in functions.php -->
	<link rel="stylesheet" id="style-css" href="<?php bloginfo('template_url') ?>/style.css?ver=4.5.2" type="text/css" media="all" data-skrollr-stylesheet />
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header>
	<div class="nav-container">
		<nav>
			<div class="nav-logo">
				<h1>
					<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</h1>
			</div>

			<?php wp_nav_menu( array(
				'container' => false,
				'theme_location' => 'primary'
			)); ?>
		</nav>
	</div> <!-- /.container -->
</header><!--/.header-->

