Projects Category Page

<?php 
	if( have_posts() ) : while( have_posts() ) : the_post(); 
		
		//load the categories for each post
		$categories = get_the_category();
?>
<article class="project-item <?php echo $categories[0]->slug; ?>" id="<?php the_ID(); ?>">
	<header class="project-header">
		<h2 class="project-title"><?php the_title(); ?></h2>
	</header>
	<section class="project-content">
		<?php the_content(); ?>
	</section>
</article>
<?php endwhile; endif; ?>