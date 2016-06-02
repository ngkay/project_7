<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php  wp_title('|', true, 'right'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!-- stylesheets should be enqueued in functions.php -->
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header class="front-page-header">
	<div class="front-page-splash">
		<nav>
			<div class="front-page-logo">
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
		<div class="front-page-featured">
				<div class="front-page-featured-content">
					<?php $featured = get_field('featured_post') ?>
					<!-- <pre> <?php print_r($featured); ?></pre> -->
					<h2><?php echo $featured->post_title; ?></h2>
					<p><?php echo wp_trim_words($featured->post_content, 100); ?></p>
				</div>
				<div class="front-page-featured-image">
					<?php $featuredImage = get_the_post_thumbnail($featured, 'full'); ?>
					<?php echo $featuredImage ?>
				</div>
			</div>
	</div> <!-- /.container -->
</header><!--/.header-->

<div class="main">
	<div class="container">

		<div class="content">
			<?php // Start the loop ?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>

			<?php endwhile; // end the loop?>
		</div> <!-- /,content -->

		<?php get_sidebar(); ?>

	</div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>