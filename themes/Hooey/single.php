<?php get_header(); ?>
<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
<header class="" role="banner">
	<div class="small-12 columns">
		<h1 class="page-title"><?php the_title(); ?></h1>
		<?php reverie_entry_meta(); ?>
	</div>
</header>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">
	
	
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php //comments_template(); ?>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>