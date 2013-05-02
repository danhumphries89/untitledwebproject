<?php 

 function add_my_sidebars(){
	register_sidebar( array(
		'name' => 'Main Sidebar',
		'id' => 'main-sidebar',
		'before_widget' => '<div class="widget recent">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
} add_action('widgets_init', 'add_my_sidebars');

add_theme_support( 'post-thumbnails' ); 

?>