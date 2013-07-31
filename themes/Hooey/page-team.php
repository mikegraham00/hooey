<?php
/*
Template Name: Team Page
*/
get_header(); 
//get_page_header($post->ID);

$args = array(
			'post_type' => 'hooey-team',
			'posts_per_page' => -1
		);
$team = new WP_Query($args);

//print_r($team);

?>

<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">
	
	<?php if ($team -> have_posts()) : //Start Loop ?>

		<ul class="team-block large-block-grid-3 small-block-grid-2">

		<?php while ($team -> have_posts()) : $team -> the_post(); ?>
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
					<a href="<?php the_permalink(); ?>" title="HOOey Team - <?php the_field('name'); ?>"> 
						<img src="<?php echo $img; ?>">
					</a>
					<p>
						<a href="<?php the_permalink(); ?>" title="HOOey Team - <?php the_field('name'); ?>"><?php the_field('name'); ?></a>
						<span class="team-logo <?php echo $team_name; ?>"><?php echo $team_name; ?></span>
					</p>
				</li>
			
		<?php endwhile; // End the loop ?>

		</ul>

	<?php else: echo "no posts"; endif; ?>

	</div>
		
<?php get_footer(); ?>