jQuery(document).ready(function(){jQuery("#zoomer").submit(function(){if(jQuery("#address").val()==""){jQuery("#mailinglist #message").text("Please enter an address or zip code.");return!1}var e=jQuery("#address").val(),t={action:"zoom_map",address:e};jQuery.post("<?php echo admin_url('admin-ajax.php'); ?>",t,function(e){alert(e)});return!1})});