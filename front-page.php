<?php if ('posts' == get_option('show_on_front')) : ?>
	<?php include(get_home_template()); ?>
<?php else : ?>

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

<!-- <div class="landing">
	<h1><?php bloginfo('name'); ?></h1>
</div> -->

<?php $hero = get_field('hero_image') ?>
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

		<div class="blue-bar"></div>

		<div class="hero-image">
			<img src="<?php echo $hero['url']; ?>" alt="<?php echo $hero['alt']; ?>">
		</div>

		<div class="front-page-post">
				<?php // Start the loop ?>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<p><?php the_content(); ?></p>

				<?php endwhile; // end the loop?>
		</div>
	</div>
</header><!--/.header-->
<?php $featuredQuery = new WP_Query(
	array (
		'category_name' => 'feature',
		'posts_per_page' => 1
	));
?>
<?php if ( $featuredQuery->have_posts() ) : ?>
	<?php while ( $featuredQuery->have_posts() ) : $featuredQuery->the_post(); ?>
		<section class="featured">
			<?php if(has_post_thumbnail()): ?>
				<div class="featured-photo">
					<?php
						$thumb_id = get_post_thumbnail_id($post->id);
						$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
					?>
					<img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php echo $alt; ?>">
				</div>
			<?php endif; ?>
			<div class="featured-post">
				<h2><?php the_title(); ?></h2>
				<p><?php the_excerpt(); ?></p>
			</div>
			<div class="yellow-box"></div>
		</section>
	<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php else : ?>
<?php endif; ?>
<section class="recent-posts">
	<div class="recent-title">
		<h1>Recent Articles</h1>
	</div>
	<?php $recentPostsQuery = new WP_Query(
		array (
			'orderby' => 'date',
			'order' =>	'DESC',
			'posts_per_page' => 2
		));
	?>
	<?php if ( $recentPostsQuery->have_posts() ) : ?>
		<?php while ( $recentPostsQuery->have_posts() ) : $recentPostsQuery->the_post(); ?>
			<article class="recent-post">
				<div class="recent-post-text">
					<h2><?php the_title(); ?></h2>
					<p><?php the_excerpt(); ?></p>
				</div>
			</article>
		<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	<?php else : ?>
		<div class="recent-post">
			<div class="recent-post-text">
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			</div>
		</div>
	<?php endif; ?>
	<div class="blog-link">
		<a href="/Project7/blog">
			<h2>more posts</h2>
		</a>
	</div>

</section>
<?php get_footer(); ?>

<?php endif; ?>