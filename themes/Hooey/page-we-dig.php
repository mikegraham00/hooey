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

	
	
	<?php /* Start loop */ 
	$args = array('post_type' => 'post', 'category_name' => 'we-dig');

	$items = new WP_Query($args);

	?>

		<div id="ms-container" class="js-masonry" data-masonry-options='{ "itemSelector": ".item" }'>

		<?php while ($items->have_posts()) : $items->the_post(); ?>
		
		  <div class="item dig-item">
		  	<?php echo the_post_thumbnail(); ?>
		  	<div class="item-info">
		  		<h3><?php the_title(); ?></h3>
		  		<p><?php the_content(); ?></p>
		  	</div>
		  </div>
		  

		
		<?php endwhile; wp_reset_query(); // End the loop ?>

		  <div class="item"><img src="http://placehold.it/650x450" /></div>
		  <div class="item"><img src="http://placehold.it/650x400" /></div>
		  <div class="item"><img src="http://placehold.it/650x250" /></div>
		  <div class="item"><img src="http://placehold.it/650x650" /></div>
		  <div class="item"><img src="http://placehold.it/650x400" /></div>
		  <div class="item"><img src="http://placehold.it/650x350" /></div>
		  <div class="item"><img src="http://placehold.it/650x650" /></div>
		  <div class="item"><img src="http://placehold.it/650x450" /></div>
		  <div class="item"><img src="http://placehold.it/650x450" /></div>
		  <div class="item"><img src="http://placehold.it/650x490" /></div>

		</div>

	</div>


<?php get_footer(); ?>