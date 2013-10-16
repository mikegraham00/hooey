<?php get_header(); ?>
<header class="" role="banner">

	<div class="small-12 columns">
		<h1 class="page-title">Meet the Team</h1>
		
		<hr/>
	</div>
</header>

<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">
	
	<?php if ( have_posts() ) : ?>
	
		<?php /* Start the Loop */ ?>

		<ul class="team-block large-block-grid-3 small-block-grid-2">

		<?php while ( have_posts() ) : the_post(); ?>
			<?php 
				$imgarr = get_field('photo'); //get photo
				$img = $imgarr['sizes']['team-thumbnail']; //get correct size image

				//get this member's team name
				$terms = get_the_terms($post->ID, 'teams'); 
				//print_r($terms);
				foreach ($terms as $term) :
					$team_name = $term->slug; //assign the team name to a variable
				endforeach;
			?>
			
				<li>
					<div class="team-member-wrap">
						<a href="<?php the_permalink(); ?>" title="HOOey Team - <?php the_field('name'); ?>"> 
							<img src="<?php echo $img; ?>">
						</a>
						<p>
							<a href="<?php the_permalink(); ?>" title="HOOey Team - <?php the_field('name'); ?>" style="background-image: url(<?php echo bloginfo('template_url'); ?>/img/logo-orange.png;">
								<?php the_field('name'); ?>
							</a>
							
						</p>
					</div>
				</li>

		<?php endwhile; ?>
		
		</ul>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif; // end have_posts() check ?>
	
	

	</div>
	
		
<?php get_footer(); ?>