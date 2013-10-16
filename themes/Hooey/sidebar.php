<?php 
$args = array('post_type' => 'post', 'posts_per_page' => 5);
$latest = new WP_Query($args);
?>

<aside id="sidebar" class="small-12 large-4 columns">
	<h3>The Latest</h3>
	<ul>
		<?php while ($latest->have_posts()) : $latest->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
				<span class="date"><?php echo get_the_date(); ?></span>
			</li>
		<?php endwhile; ?>
	</ul>


</aside><!-- /#sidebar -->