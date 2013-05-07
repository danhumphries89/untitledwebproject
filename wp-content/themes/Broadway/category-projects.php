<section class="project_items">
<?php 
	if( have_posts() ) : while( have_posts() ) : the_post(); 
		
		//load the categories for each post
		$categories = get_the_category();

		//get the custom fields from the current post
		$custom_fields = get_post_custom( get_the_ID() );
?>
	<article class="project-item <?php echo $categories[0]->slug; ?>" id="<?php echo get_the_ID(); ?>">
		<header class="project-header">
			<h2 class="project-title">
				<a href="<?php the_permalink(); ?>" rel="ajax_return"><?php the_title(); ?></a>
			</h2>
		</header>
		<section class="project-details">
			<span class="project-date"><?php echo $custom_fields['project_date'][0]; ?></span>
			<p class="website_description"><?php the_excerpt(); ?></p>
			<a href="<?php echo $custom_fields['website_address'][0]; ?>" class="website_preview_link">Visit Website</a>
	</article>
	<?php endwhile; endif; ?>
</section>