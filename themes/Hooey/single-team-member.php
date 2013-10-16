<?php get_header(); ?>

<header role="banner">
<div class="small-12 columns">
	<h1 class="page-title">Meet the Team</h1>
	<hr />
</div>
</header>

<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php $teamName = get_team_slug($post->ID); ?>
		<?php $imgArr = get_field('photo'); $photo = $imgArr['sizes']['team-thumbnail']; ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title <?php echo $teamName; ?>"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<img src="<?php echo $photo; ?>" class="alignleft"><?php the_field('full_bio'); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
				
			</footer>
			
		</article>
	<?php endwhile; // End the loop ?>

	</div>
		
<?php get_footer(); ?>