<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width" />

	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">




<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>

<div class="contain-to-grid">
	
	<nav class="top">
		<div class="mini-logo show-for-small">
			<a href="/">HOOey</a>
		</div>
	    <ul class="icons-area hide-for-small">
	        <li class="brand-icon">
	        	<a href="/hooey" class="hooey" title="HOOey" >HOOey</a>
	        </li>
	        <li class="brand-icon">
	        	<a href="/roughy" class="roughy" title="Roughy" >Roughy</a>
	        </li>
	        <li class="brand-icon">
	        	<a href="/cloverleaf" class="cloverleaf" title="Cloverleaf" >Cloverleaf</a>
	        </li>
	        <li class="brand-icon">
	        	<a href="/punchy" class="punchy" title="Punchy" rel="home">Punchy</a>
	        </li>
	        <li class="brand-icon">
	        	<a href="/hooey-oil-gear" class="hog" title="HOOey Oil Gear">HOG</a>
	        </li>
			
	    </ul>
	    <section class="static-links right">
	    <a href="/contact">Contact Us</a>
	    <a href="/we-dig">We Dig</a>
	    
	    </section>
	</nav>
	
</div>

<?php 

	if( is_front_page() ) : //this is the homepage. include the homepage slideshow
		
 ?>

	 <div class="slideshow-wrap">

	 	<div class="row preloader">
	 	
	 	<ul data-orbit data-options="bullets: false">
	 	<?php //slideshow images
	 		if ( get_field ('slides') ) : 
	 			$s = 1;
	 			while ( has_sub_field ('slides') ) : 
	 				$img_arr = get_sub_field('slide_image');
	 				$img = $img_arr['sizes']['slideshow-size']; 
	 				
	 				?>

			 		<li data-orbit-slide="slide-<?php echo $s; ?>">
			 			<a href="<?php the_sub_field('links_to'); ?>" ><img src="<?php echo $img; ?>"> </a>
			 		</li>

			 		<?php $s++; ?>

	 			<?php endwhile; ?>
	 		<?php endif; ?>
	 	
	 	</ul>
	 	</div>
	 	
	 </div>

<?php endif; //end homepage slideshow check ?>

<div class="contain-to-grid main-nav">
	<nav class="top-bar">
	<ul class="title-area">
			<li class="name home-link hide-for-small">
				<a href="/">HOOey</a>
			</li>
		<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	</ul>
	<section class="top-bar-section">
	<?php
	        wp_nav_menu( array(
	            'theme_location' => 'primary',
	            'container' => false,
	            'depth' => 0,
	            'items_wrap' => '<ul class="left site-nav">%3$s</ul>',
	            'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
	            'walker' => new reverie_walker( array(
	                'in_top_bar' => true,
	                'item_type' => 'li'
	            ) ),
	        ) );
	    ?>
	    
		    <ul class="right social-nav">
		    	<li><a href="facebook" class="facebook">Facebook</a></li>
		    	<li><a href="twitter" class="twitter">Twitter</a></li>
		    </ul>
	    </section>
	    
	 </nav>
</div>


<!-- Start the main container -->
<section class="container row" role="document">