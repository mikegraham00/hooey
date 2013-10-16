<?php
/*
Template Name: Retailers Page
*/
get_header('retailers'); 

?>
<div class="contain-to-grid" id="searchFormContainer">
	<div class="row" id="searchFormWrap">

		<form id="zoomer" class="large-12 columns" style="margin-top: 24px;">
			<div class="row collapse">
				<div class="small-10 large-10 columns">
					<input type="text" id="address" name="address" />
				</div>
				<div class="small-2 large-2 columns">
					<button type="submit" id="mapZoom" class="button" value="Search" ><i class="foundicon-search"></i><span>Search</span></button>
				</div>
			</div>
		</form>
		<h4 class="large-12 columns">Enter an address, ZIP code, or city to find a HOOey retailer near you.</h4>
	</div>
	<div class="search-toggle"><i class="foundicon-search"></i><span class="toggler">HIDE</span></div>
</div>

<div class="contain-to-grid mapcontainer">
	<?php echo do_shortcode('[mashup query="post_type=retailers&posts_per_page=-1" width="100%" height="500px" adaptive="true" zoom="3"]'); ?>
</div>



<!-- Start the main container -->
<section class="container row" role="document">
	<?php //get_page_header($post->ID); ?>

<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			
			
			<div class="entry-content" class="row">
				
				
				
				<?php //the_content(); ?>
			</div>
			
		</article>
	<?php endwhile; // End the loop ?>

	</div>


		

<?php get_footer('retailers'); ?>