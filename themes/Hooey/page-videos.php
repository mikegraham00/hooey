<?php
/*
Template Name: Videos Page Template
*/ 
get_header(); ?>

<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>

<header class="" role="banner">

	<div class="small-12 columns">
		<h1 class="page-title"><?php the_title(); ?></h1>
		
		<hr/>
	</div>
</header>

<!-- Row for main content area -->
	<div class="large-12 columns" role="main">
		<ul class="large-block-grid-3 video-block">
			
			<?php 
			$args = array('post_type' => 'videos', 'posts_per_page' => 12, 'paged' => $paged);
			$vids = new WP_Query($args);

			if($vids->have_posts()) : while($vids->have_posts()) : $vids->the_post(); 
				$img_array = get_field('poster_image');
				$img = $img_array['sizes']['medium'];
			?>
				<li class="video-wrap ">

					<img src="<?php echo $img; ?>">
					<div class="play-button">Play</div>
					<p><a href="<?php the_permalink(); ?>" alt="Read: <?php the_title(); ?>" ><?php the_field('video_title'); ?></a></p>
				</li>
				
				
				<?php //comments_template(); ?>

			<?php endwhile; ?>
			<?php endif; ?>
		</ul>
		<footer>
			<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php kriesi_pagination($news->max_num_pages); ?>
		</footer>
		
	<?php endwhile; // End the loop ?>

	</div>
	<?php //get_sidebar('social-feeds'); ?>
		
<?php get_footer(); ?>