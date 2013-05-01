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

function comments_callback($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>
<li class="comment" id="comment-<?php comment_ID(); ?>">

	<header class="comment-header">
		<h3><?php comment_author(); ?></h3>
		<p class="comment-meta">
			<span class="date"><?php comment_date(); ?></span>
			<span class="time"><?php comment_time(); ?></span>
			<span class="reply">
				<?php  
					comment_reply_link( array_merge($args, array(
						'add_below' => 'comment',
						'depth' => $depth,
						'max-depth' => $args['max_depth']
					))); 
				?>
			</span>
		</p>
	</header>

	<section class="comment-content"> <?php echo $comment->comment_content; ?> </section>
</li>
<?php 
}




?>