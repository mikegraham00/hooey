<?php
/*
Template Name: News Template
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
	<div class="small-12 large-8 columns" role="main">
			
			<?php 
			$args = array('post_type' => 'post', 'category_name' => 'news', 'posts_per_page' => 3, 'paged' => $paged);
			$news = new WP_Query($args);

			if($news->have_posts()) : while($news->have_posts()) : $news->the_post(); 
			?>
			<div class="news-post-wrap">
				<div class="small-2 columns date-wrap">
					<div class="date-month">
						<?php the_time('M'); ?>
					</div>
					<div class="date-day">
						<?php the_time('d'); ?>
					</div>
				</div>
				<div class="small-10 columns">
					<header>
						<h2><a href="<?php the_permalink(); ?>" alt="Read: <?php the_title(); ?>" ><?php the_title(); ?></a></h2>
					</header>
					<div class="entry-content">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</div>
				
				<?php //comments_template(); ?>

		<?php endwhile; ?>
		<?php endif; ?>
		<footer class="">
			<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php kriesi_pagination($news->max_num_pages); ?>
		</footer>
		
	<?php endwhile; // End the loop ?>

	</div>
	<?php get_sidebar('social-feeds'); ?>
		
<?php get_footer(); ?>