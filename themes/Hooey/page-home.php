<?php
/*
Template Name: Homepage Template
*/
get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			<hr>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			
		</article>
	<?php endwhile; // End the loop ?>

	<h2>On the Road</h2>

	<?php instafeed('hooey'); ?>

	</div>

	<?php get_sidebar('social-feeds'); ?>
		
<?php get_footer(); ?>