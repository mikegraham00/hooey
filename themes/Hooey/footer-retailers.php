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

		$(".search-toggle").click(function(){
			$("#searchFormWrap").slideToggle('slow', function() {
	            if ($(this).is(":visible")) {
	                 $(".toggler").text('HIDE');                
	            } else {
	                 $(".toggler").text('FIND A RETAILER');                
	            }        
        	});
		});

	}) (jQuery);


</script>

<script>
jQuery(document).ready(function(){
	jQuery("#zoomer").submit(function()	{
			var address = jQuery('#address').val();
				jQuery.ajax({
					url: "<?php echo admin_url('admin-ajax.php'); ?>", 
					type: 'POST',
					data: {
							action: 'map_zoom',
							address: address
					},
					success: function(response) {
						var ll = response.split(', ', ll);
						lat = ll[0];
						lon = ll[1];
						//console.log(lat);
						//console.log(lon);
						mapp0.setCenter(lat, lon);
						mapp0.setZoom(10);
					}

				});
	return false;
		
	}); 
		
});
</script>
	
</body>
</html>