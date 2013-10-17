<?php
/*
Template Name: We Dig
*/
get_header(); ?>

<header role="banner">
<div class="small-12 columns">
	<h1 class="page-title"><?php the_title(); ?></h1>
	<hr />
</div>
</header>

<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">

	
	
	<?php /* Start loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<div id="ms-container" class="js-masonry" data-masonry-options='{ "itemSelector": ".item" }'>
		<?php if ( get_field('we_dig_items') ) : ?>
		<?php while ( has_sub_field('we_dig_items')) : ?>
			<?php $imgarr = get_sub_field('item_image'); $img = $imgarr['sizes']['medium']; ?>
		  <div class="item dig-item">
		  	<img src="<?php echo $img; ?>" />
		  	<div class="item-info">
		  		<h3><?php the_sub_field('item_title'); ?></h3>
		  		<p><?php the_sub_field('item_content'); ?></p>
		  	</div>
		  </div>
		  
		
		<?php endwhile; ?>
		<?php endif; ?>

		</div>

	<?php endwhile; ?>

	</div>


<?php get_footer(); ?>