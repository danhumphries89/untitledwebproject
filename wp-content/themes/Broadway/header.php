<!DOCTYPE html>
<html charset="utf-8">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/base.css" rel="stylesheet" type="text/css" screen="all" />
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts.css" rel="stylesheet" type="text/css" screen="all" />

	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/scripts.js"></script>
</head>
<body>
	<header class="sidebar-header">
		<div class="logo"></div>

		<div class="menu-header-wrapper">
			<?php 
				wp_nav_menu( array(
					'menu' => 'Mainmenu',
					'container' => false
				)); 
			?>
		</div>
		
		<div class="widgets"></div>
	</header>