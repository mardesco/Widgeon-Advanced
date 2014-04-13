<?php
// slideshows.php

// requires metaboxes.php

/**
@filename slideshows.php
@dependency metaboxes.php

@package Widgeon Advanced Framework

@author Mardesco
@author Jesse Smith
@copyright 2014
@license GPLv2

@description Retrieves data stored by the theme options, correlated with data stored in the post_meta, to display a slideshow.

@implements The slideshow feature currently uses the "Cycle2" jQuery plugin by M. Alsup: http://jquery.malsup.com/cycle2/  Please consider sending him a donation via PayPal to thank him for his great work!


*/

			
		function widgeon_get_slideshow_id(){
		
			// see https://codex.wordpress.org/Conditional_Tags
			if(is_front_page() && is_home()){
				return 1;
			}
		
			global $post;
			
			/* Get the current post ID. */ 
			$post_id = $post->ID;  
			$key = 'widgeon_slideshow';
			$slideshow = get_post_meta( $post_id, $key, true );  
			if($slideshow && $slideshow != '' && $slideshow != 'none'){
			
						
				$trim = strlen('uses_slideshow_');
				
								
							
				$id = substr($slideshow, $trim, 1 );
				
								
								
				return (int) esc_attr($id);
			
				}else{
					return false;
					}
			
			}			
			
function widgeon_display_slideshow(){
	$id = widgeon_get_slideshow_id();// this function is defined in metaboxes.php
	
	
	if(!$id || $id == ''){
		return '';
	}
	
	// retrieve slide data from db.

	
	// options for data-cycle-fx: scrollHorz, fade, fadeout are defaults
	// but the one you want is tileSlide, which requires the plugin jquery.cycle2.tile.js
	
	
	// see http://jquery.malsup.com/cycle2/api/
	// for information about adding captions etc.
	// basically it's this:
	
	/*
caption		jQuery selector	'> .cycle-caption'	A selector which identifies the element that should be used for the slideshow caption. By default, Cycle2 looks for an element with the class .cycle-caption that exists within the slideshow container.
caption-template	•	string	'{{slideNum}} / {{slideCount}}'	A template string which defines how the slideshow caption should be formatted. The template can reference real-time state information from the slideshow, such as the current slide index, etc.
Cycle2 uses simple Mustache-style templates by default.	
*/


// TODO: triggers via prev and next. Use the glyphicons to implement:
// data-cycle-next=".next, .cycle-slideshow" data-cycle-prev=".prev"
// but will require adding prev and next elements to the slider
	
	$string =  '<div id="widgeon_slideshow" class="slider cycle-slideshow" data-cycle-slides="div" data-cycle-speed="600" data-cycle-timeout="3500" data-cycle-fx="tileSlide" data-cycle-tile-vertical="false" data-cycle-tile-count="12" data-cycle-swipe="true" data-cycle-pause-on-hover="true">';
	
	for($i = 1; $i <= 5; $i++){
		$slide = of_get_option('slideshow_'.$id.'_slide_'.$i);
		if($slide){
		/*
			if($i == 1){
				$slideclass = '';
			}else{
				$slideclass = 'hidden';
			}
			*/
			
			$string .= sprintf('<div class="slide"><img src="%s" alt="slide" /></div>', esc_url($slide) );// %s   , $slideclass
			
		}
	}
	
	$string .= '</div>';
	
	return $string;
	
}

// this is the function you actually call, to display a slideshow on the page.
function widgeon_slideshow(){
	  $slider = widgeon_display_slideshow();
	  
	  if($slider && $slider != ''){
		printf('<div id="widgeon_slideshow_container">%s</div>', $slider);
		$cycle_path = get_template_directory_uri() . '/js/jquery.cycle2.min.js';
		wp_enqueue_script('cycle2', $cycle_path, array(), '2.1.4',true);
		
		// provide "swipe" functionality to slideshow for mobile/touchscreen users
		$swipe_path = get_template_directory_uri() . '/js/jquery.cycle2.swipe.min.js';
		wp_enqueue_script('cycleswipe', $swipe_path, array('cycle2'), 'v20140128', true);
		
		// TODO: implement slideshow options, let the user select the animation type.
		// then only enqueue this next script if they're using the "tile" animation effect.
		$tile_path = get_template_directory_uri() . '/js/jquery.cycle2.tile.min.js';
		wp_enqueue_script('cycletile', $tile_path, array('cycle2'), '20140128', true);
	  }
	}	

?>	