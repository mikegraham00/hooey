</section><!-- Container End -->

<div class="row full-width">
	<?php dynamic_sidebar("Footer"); ?>
</div>

<footer class="row full-width" role="contentinfo">
	<div class="small-12 large-4 columns">
		<p>&copy; <?php echo date('Y'); ?> Hooey Brands. </p>
	</div>
	
	<div class="small-12 large-8 columns">
		<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'inline-list right')); ?>
	</div>
</footer>

<?php wp_footer(); ?>


<script>
	(function($) {

		$(document).foundation();


	}) (jQuery);


</script>


<script>
if (!Modernizr.touch) {
	jQuery('document').ready(function($) {
		$(".fancybox-media").fancybox({
			openEffect  : 'none',
			closeEffect : 'none',
			helpers : {
				media : {}
			}
		});
	});
};

</script>

<?php if ($post->post_name == 'we-dig' ) : ?>
<script>
if (!Modernizr.touch) {
	jQuery(document).ready(function($) {
	  $('#ms-container').masonry({
	   columnWidth: 320,
	   itemSelector: '.item'
	  }).imagesLoaded(function() {
	   $('#ms-container').masonry('reload');
	  });
	});
}
</script>
<?php endif; ?>
	
</body>
</html>