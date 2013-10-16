<?php
/*
Author: Zhen Huang
URL: http://themefortress.com/

This place is much cleaner. Put your theme specific codes here,
anything else you may wan to use plugins to keep things tidy.

*/

/*
1. lib/clean.php
    - head cleanup
	- post and images related cleaning
*/
require_once('lib/clean.php'); // do all the cleaning and enqueue here
/*
2. lib/enqueue-sass.php or enqueue-css.php
    - enqueueing scripts & styles for Sass OR CSS
    - please use either Sass OR CSS, having two enabled will ruin your weekend
*/
require_once('lib/enqueue-sass.php'); // do all the cleaning and enqueue if you Sass to customize Reverie
//require_once('lib/enqueue-css.php'); // to use CSS for customization, uncomment this line and comment the above Sass line
/*
3. lib/foundation.php
	- add pagination
	- custom walker for top-bar and related
*/
require_once('lib/foundation.php'); // load Foundation specific functions like top-bar
/*
4. lib/presstrends.php
    - add PressTrends, tracks how many people are using Reverie
*/
//require_once('lib/presstrends.php'); // load PressTrends to track the usage of Reverie across the web, comment this line if you don't want to be tracked

/**********************
Add theme supports
**********************/
function reverie_theme_support() {
	// Add language supports. Please note that Reverie does not include language files, not yet
	load_theme_textdomain('reverie', get_template_directory() . '/lang');
	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	// set_post_thumbnail_size(150, 150, false);
	
	// rss thingy
	add_theme_support('automatic-feed-links');
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary' => __('Primary Navigation', 'reverie'),
		'utility' => __('Utility Navigation', 'reverie')
	));
	
	// Add custom background support
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',  // background image default
	    'default-color' => '', // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);
}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}

// return entry meta information for posts, used by multiple loops.
function reverie_entry_meta() {
	echo '<p><time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s', 'reverie'), get_the_time('l, F jS, Y'), get_the_time()) .'</time></p>';
	//echo '<p class="byline author">'. __('By', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
}

// get team name from custom taxonomy
function get_team_slug($id) {
			$terms = get_the_terms($id, 'teams');
			//print_r($team_data);

			foreach ($terms as $term) :
				$team_name = $term->slug;
			endforeach;

			//echo '<br />'.$team_name;

			return $team_name;
}

function get_page_header($id) { //REVISED PAGE HEADER
	echo'
	<header class="" role="banner">

	<div class="small-12 columns">
		<h1 class="page-title">';
		echo get_the_title($id);
	echo '</h1>
		
		<hr/>
	</div>
	</header>';

}

//AJAX FUNCTION TO GEOCODE A RETAILER MAP SEARCH ENTRY. RETURNS FORMATTED LAT, LONG FOR MAP ZOOM AND CENTER.

add_action('wp_ajax_map_zoom', 'map_zoom_callback');
add_action('wp_ajax_nopriv_map_zoom', 'map_zoom_callback');

function map_zoom_callback() {
	$address = $_POST['address'];
	if(!empty($address)) {
		$mypoi = new Mappress_Poi(array("address" => $address));
		$mypoi->geocode();

		$lat = $mypoi->point['lat'];
		$lng = $mypoi->point['lng'];

		$latLng = $lat.", ".$lng;

		echo $latLng;
	}
	die();
}



function instafeed($tag) { //GRABS AND FORMATS THE INSTAGRAM RSS FEED FOR ANY HASHTAG

	$rss = file_get_contents( "http://instagr.am/tags/$tag/feed/recent.rss" );

	$xml = new SimpleXMLElement( $rss );

	if( $count = count( $xml->channel->item ) ): 

	        echo '<ul class="instagram-feed small-block-grid-4" data-tag="'.$tag.'>" data-qty="'.$count.'">';

	    			$i = 1;

	                foreach( $xml->channel->item as $item ): 

	                	
	                        echo '<li data-guid="'.$item->guid.'" data-pubdate="'.$item->pubDate.'"><img src="'.$item->link.'" alt="'.$item->title.'" /></li>';
	           			if (++$i == 5) break;
	                    
	                endforeach; 

	        echo '</ul>';

	else: 

	        echo '<!-- No results found for feed <em>'.$tag.'</em> at <em>'.$url.'</em> -->';

	endif; 
}

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> [...read more]</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function kriesi_pagination($pages = '', $range = 2) {  //SUPER KILLER PAGINATION FOR POST ARCHIVES
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

function hooey_update_all() {
	$args = array(
    'posts_per_page' => -1,
    'post_type' => 'retailers'
    );
$retailers = new WP_Query( $args );

if ( $retailers->have_posts() ) { 
    while ( $retailers->have_posts() ) {
        $retailers->the_post();
        $id = get_the_ID();
        wp_update_post(array('ID' => $id));
    }
}
}

?>