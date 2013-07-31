jQuery(document).ready(function(){
	jQuery("#zoomer").submit(function()	{
		if(jQuery("#address").val()=="") {
			jQuery("#mailinglist #message").text("Please enter an address or zip code.");
			return false;
		} else {
			var address = jQuery('#address').val();
			
				var data = {
					action: 'zoom_map',
					address: address
				};
				
				//jQuery(".ajaxsave").show();
				jQuery.post("<?php echo admin_url('admin-ajax.php'); ?>", data,
				function(response){
					alert(response);
					//jQuery(mapp0.setCenter(response));
					//jQuery(mapp0.setZoom(9));
				});		
				return false;
			}
	}); 
		
});


