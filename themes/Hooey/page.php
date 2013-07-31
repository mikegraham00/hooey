<?php get_header(); ?>
<?php get_page_header($post->ID); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">
		<div id="map-canvas"></div>
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			
		</article>
	<?php endwhile; // End the loop ?>
	

	</div>
	<?php get_sidebar('social-feeds'); ?>
		
<?php get_footer(); ?>