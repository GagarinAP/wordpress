<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<title><?php bloginfo('name'); ?></title>	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="container">
		<header class="site-header">
			<div class="hd-search">
				<?php get_search_form(); ?>
			</div>
			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<h5><?php bloginfo('description'); ?><?php if(is_page('portfolio')) {?>
				- PORTFOLIOOOO
			<?php } ?></h5>

			<nav class="site-nav">
				<?php $args = array('theme_location' => 'primary'); ?>
				<?php wp_nav_menu($args); ?>
			</nav>
		</header>