<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'widgeon'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {


	$options = array();

	
	// Basic settings.
	
	$options[] = array(
		'name' => __('Basic Settings', 'widgeon'),
		'type' => 'heading'
		);

		
	$options[] = array(
		'name' => __('Branding', 'widgeon'),
		'desc' => __('These settings determine the display of your website&#039;s branding.', 'widgeon'),
		'type' => 'info'
		);		
		

	// logo in headerbar.
	$options[] = array(
		'name' => __('Your Logo', 'widgeon'),
		'desc' => __('Add your logo to the theme headerbar.', 'widgeon'),
		'id' => 'widgeon_logo',
		'type' => 'upload'
		);	
	
	
	// custom text in headerbar.
	$options[] = array(
		'name' => __('Slogan Text', 'widgeon'),
		'desc' => __('Your phone number, company slogan, or call to action. Leave blank to default to your blog&#039;s tagline.', 'widgeon'),
		'id' => 'widgeon_slogan',
		'std' => '',
		'type' => 'text'
		);
		
	
	// selectable color scheme.
	$colors_array = array(
		'blue' => __('Blue', 'widgeon'),
		'green' => __('Green', 'widgeon'),
		'maroon' => __('Maroon', 'widgeon'),
		'grey' => __('Grey', 'widgeon'),
		'white' => __('White', 'widgeon')
	);	
	
	$options[] = array(
		'name' => __('Primary Color', 'widgeon'),
		'desc' => __('What color should be emphasized most prominently in your website&#039;s design?', 'widgeon'),
		'id' => 'widgeon_colors',
		'std' => 'grey',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $colors_array
		);		
	
	
	// Advanced settings.
	
	$options[] = array(
		'name' => __('Advanced Settings', 'widgeon'),
		'type' => 'heading');	
	
	
	$options[] = array(
		'name' => __('Site Layout', 'widgeon'),
		'desc' => __('These settings determine the overall layout and styling of your website.', 'widgeon'),
		'type' => 'info'
		);	
	
	
	// select sidebar options.
	$sidebar_array = array(
		'left' => __('Left sidebar', 'widgeon'),
		'right' => __('Right sidebar', 'widgeon'),
		'both' => __('Both sidebars', 'widgeon'),
		'neither' => __('No sidebars ever', 'widgeon')
	);	
	
	$options[] = array(
		'name' => __('Sidebar Options', 'widgeon'),
		'desc' => __('Which sidebars would you like to display by default on most pages and posts? (Does not apply to homepage or full-width pages.)', 'widgeon'),
		'id' => 'widgeon_sidebars',
		'std' => 'right',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $sidebar_array
		);	
	
	
	// set max container width.
	$options[] = array(
		'name' => __('Max container width', 'widgeon'),
		'desc' => __('The maximum width of your site&#039;s container element (in pixels).', 'widgeon'),
		'id' => 'widgeon_max_width',
		'std' => '1024',
		'class' => 'mini',
		'type' => 'text'
		);	
	
	// Slideshow Settings
	
	$options[] = array(
		'name' => __('Slideshow Settings', 'widgeon'),
		'type' => 'heading'
		);	
	
	
	$options[] = array(
		'name' => __('Use Slideshows', 'widgeon'),
		'desc' => __('These settings allow you to create and manage up to 3 slideshows within your theme.', 'widgeon'),
		'type' => 'info'
		);		
	
	// this is a bit cumbersome but it's good enough for now.
	// Someday I'll write a more elegant system.


	
	// Slideshow 1
	
	$options[] = array(
		'name' => __('Display Slideshow 1', 'widgeon'),
		'desc' => __('Create and use Slideshow 1.', 'widgeon'),
		'id' => 'widgeon_slideshow1_showhidden',
		'type' => 'checkbox'
		);

	$options[] = array(
		'name' => __('Slideshow 1', 'widgeon'),
		'desc' => __('Select the images that you want displayed in the Slideshow 1.  If you use the "Front page displays: your latest posts" option from Settings > Reading, then Slideshow 1 will display automatically on your site&#039;s homepage.  To use this slideshow in any other page or post, visit that page in the WordPress editor and select "Display Slideshow 1" from the "Slideshow Options" menu.', 'widgeon'),
		'class' => 'hidden widgeon-slideshow-1',
		'type' => 'info'
		);


	// slideshow 1 slide 1
	$options[] = array(
		'name' => __('Slide 1', 'widgeon'),
		'desc' => __('Select an image.', 'widgeon'),
		'id' => 'slideshow_1_slide_1',
		'class' => 'hidden widgeon-slideshow-1',		
		'type' => 'upload'
		);

	// slideshow 1 slide 2
	$options[] = array(
		'name' => __('Slide 2', 'widgeon'),
		'desc' => __('Select an image.', 'widgeon'),
		'id' => 'slideshow_1_slide_2',
		'class' => 'hidden widgeon-slideshow-1',		
		'type' => 'upload'
		);

	// slideshow 1 slide 3
	$options[] = array(
		'name' => __('Slide 3', 'widgeon'),
		'desc' => __('Select an image.', 'widgeon'),
		'id' => 'slideshow_1_slide_3',
		'class' => 'hidden widgeon-slideshow-1',		
		'type' => 'upload'
		);		
		
	// slideshow 1 slide 4
	$options[] = array(
		'name' => __('Slide 4', 'widgeon'),
		'desc' => __('Select an image.', 'widgeon'),
		'id' => 'slideshow_1_slide_4',
		'class' => 'hidden widgeon-slideshow-1',		
		'type' => 'upload'
		);		
		
		
	// slideshow 1 slide 5
	$options[] = array(
		'name' => __('Slide 5', 'widgeon'),
		'desc' => __('Select an image.', 'widgeon'),
		'id' => 'slideshow_1_slide_5',
		'class' => 'hidden widgeon-slideshow-1',		
		'type' => 'upload'
		);		
		
		
		
	
	// Slideshow 2
	
	$options[] = array(
		'name' => __('Display Slideshow 2', 'widgeon'),
		'desc' => __('Create and use Slideshow 2.', 'widgeon'),
		'id' => 'widgeon_slideshow2_showhidden',
		'type' => 'checkbox'
		);

	$options[] = array(
		'name' => __('Slideshow 2', 'widgeon'),
		'desc' => __('Select the images that you want displayed in the Slideshow 2. To use this slideshow in any page or post, visit that page in the WordPress editor and select "Display Slideshow 2" from the "Slideshow Options" menu at the bottom.', 'widgeon'),
		'class' => 'hidden widgeon-slideshow-2',
		'type' => 'info'
		);


	// slideshow 2 slide 1
	$options[] = array(
		'name' => __('Slide 1', 'widgeon'),
		'desc' => __('Select an image.', 'widgeon'),
		'id' => 'slideshow_2_slide_1',
		'class' => 'hidden widgeon-slideshow-2',		
		'type' => 'upload'
		);

	// slideshow 2 slide 2
	$options[] = array(
		'name' => __('Slide 2', 'widgeon'),
		'desc' => __('Select an image.', 'widgeon'),
		'id' => 'slideshow_2_slide_2',
		'class' => 'hidden widgeon-slideshow-2',		
		'type' => 'upload'
		);

	// slideshow 2 slide 3
	$options[] = array(
		'name' => __('Slide 3', 'widgeon'),
		'desc' => __('Select an image.', 'widgeon'),
		'id' => 'slideshow_2_slide_3',
		'class' => 'hidden widgeon-slideshow-2',		
		'type' => 'upload'
		);		
		
	// slideshow 2 slide 4
	$options[] = array(
		'name' => __('Slide 4', 'widgeon'),
		'desc' => __('Select an image.', 'widgeon'),
		'id' => 'slideshow_2_slide_4',
		'class' => 'hidden widgeon-slideshow-2',		
		'type' => 'upload'
		);		
		
		
	// slideshow 2 slide 5
	$options[] = array(
		'name' => __('Slide 5', 'widgeon'),
		'desc' => __('Select an image.', 'widgeon'),
		'id' => 'slideshow_2_slide_5',
		'class' => 'hidden widgeon-slideshow-2',		
		'type' => 'upload'
		);		
		

	
	// Slideshow 3
	
	$options[] = array(
		'name' => __('Display Slideshow 3', 'widgeon'),
		'desc' => __('Create and use Slideshow 3.', 'widgeon'),
		'id' => 'widgeon_slideshow3_showhidden',
		'type' => 'checkbox'
		);

	$options[] = array(
		'name' => __('Slideshow 3', 'widgeon'),
		'desc' => __('Select the images that you want displayed in the Slideshow 3.  To use this slideshow in any page or post, visit that page in the WordPress editor and select "Display Slideshow 3" from the "Slideshow Options" menu at the bottom.', 'widgeon'),
		'class' => 'hidden widgeon-slideshow-3',
		'type' => 'info'
		);


	// slideshow 1 slide 1
	$options[] = array(
		'name' => __('Slide 1', 'widgeon'),
		'desc' => __('Select an image.', 'widgeon'),
		'id' => 'slideshow_3_slide_1',
		'class' => 'hidden widgeon-slideshow-3',		
		'type' => 'upload'
		);

	// slideshow 1 slide 2
	$options[] = array(
		'name' => __('Slide 2', 'widgeon'),
		'desc' => __('Select an image.', 'widgeon'),
		'id' => 'slideshow_3_slide_2',
		'class' => 'hidden widgeon-slideshow-3',		
		'type' => 'upload'
		);

	// slideshow 1 slide 3
	$options[] = array(
		'name' => __('Slide 3', 'widgeon'),
		'desc' => __('Select an image.', 'widgeon'),
		'id' => 'slideshow_3_slide_3',
		'class' => 'hidden widgeon-slideshow-3',		
		'type' => 'upload'
		);		
		
	// slideshow 1 slide 4
	$options[] = array(
		'name' => __('Slide 4', 'widgeon'),
		'desc' => __('Select an image.', 'widgeon'),
		'id' => 'slideshow_3_slide_4',
		'class' => 'hidden widgeon-slideshow-3',		
		'type' => 'upload'
		);		
		
		
	// slideshow 1 slide 5
	$options[] = array(
		'name' => __('Slide 5', 'widgeon'),
		'desc' => __('Select an image.', 'widgeon'),
		'id' => 'slideshow_3_slide_5',
		'class' => 'hidden widgeon-slideshow-3',		
		'type' => 'upload'
		);		
				
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
/*




	// Test data
	$test_array = array(
		'one' => __('One', 'widgeon'),
		'two' => __('Two', 'widgeon'),
		'three' => __('Three', 'widgeon'),
		'four' => __('Four', 'widgeon'),
		'five' => __('Five', 'widgeon')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'widgeon'),
		'two' => __('Pancake', 'widgeon'),
		'three' => __('Omelette', 'widgeon'),
		'four' => __('Crepe', 'widgeon'),
		'five' => __('Waffle', 'widgeon')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';
	




	$options[] = array(
		'name' => __('Input Text Mini', 'widgeon'),
		'desc' => __('A mini text input field.', 'widgeon'),
		'id' => 'example_text_mini',
		'std' => 'Default',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Input Text', 'widgeon'),
		'desc' => __('A text input field.', 'widgeon'),
		'id' => 'example_text',
		'std' => 'Default Value',
		'type' => 'text');

	$options[] = array(
		'name' => __('Textarea', 'widgeon'),
		'desc' => __('Textarea description.', 'widgeon'),
		'id' => 'example_textarea',
		'std' => 'Default Text',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Input Select Small', 'widgeon'),
		'desc' => __('Small Select Box.', 'widgeon'),
		'id' => 'example_select',
		'std' => 'three',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('Input Select Wide', 'widgeon'),
		'desc' => __('A wider select box.', 'widgeon'),
		'id' => 'example_select_wide',
		'std' => 'two',
		'type' => 'select',
		'options' => $test_array);

	if ( $options_categories ) {
	$options[] = array(
		'name' => __('Select a Category', 'widgeon'),
		'desc' => __('Passed an array of categories with cat_ID and cat_name', 'widgeon'),
		'id' => 'example_select_categories',
		'type' => 'select',
		'options' => $options_categories);
	}

	if ( $options_tags ) {
	$options[] = array(
		'name' => __('Select a Tag', 'options_check'),
		'desc' => __('Passed an array of tags with term_id and term_name', 'options_check'),
		'id' => 'example_select_tags',
		'type' => 'select',
		'options' => $options_tags);
	}

	$options[] = array(
		'name' => __('Select a Page', 'widgeon'),
		'desc' => __('Passed an pages with ID and post_title', 'widgeon'),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages);

	$options[] = array(
		'name' => __('Input Radio (one)', 'widgeon'),
		'desc' => __('Radio select with default options "one".', 'widgeon'),
		'id' => 'example_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $test_array);

	$options[] = array(
		'name' => __('Example Info', 'widgeon'),
		'desc' => __('This is just some example information you can put in the panel.', 'widgeon'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Input Checkbox', 'widgeon'),
		'desc' => __('Example checkbox, defaults to true.', 'widgeon'),
		'id' => 'example_checkbox',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Advanced Settings', 'widgeon'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Check to Show a Hidden Text Input', 'widgeon'),
		'desc' => __('Click here and see what happens.', 'widgeon'),
		'id' => 'example_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Hidden Text Input', 'widgeon'),
		'desc' => __('This option is hidden unless activated by a checkbox click.', 'widgeon'),
		'id' => 'example_text_hidden',
		'std' => 'Hello',
		'class' => 'hidden',
		'type' => 'text');

	$options[] = array(
		'name' => __('Uploader Test', 'widgeon'),
		'desc' => __('This creates a full size uploader that previews the image.', 'widgeon'),
		'id' => 'example_uploader',
		'type' => 'upload');

	$options[] = array(
		'name' => "Example Image Selector",
		'desc' => "Images for layout.",
		'id' => "example_images",
		'std' => "2c-l-fixed",
		'type' => "images",
		'options' => array(
			'1col-fixed' => $imagepath . '1col.png',
			'2c-l-fixed' => $imagepath . '2cl.png',
			'2c-r-fixed' => $imagepath . '2cr.png')
	);

	$options[] = array(
		'name' =>  __('Example Background', 'widgeon'),
		'desc' => __('Change the background CSS.', 'widgeon'),
		'id' => 'example_background',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __('Multicheck', 'widgeon'),
		'desc' => __('Multicheck description.', 'widgeon'),
		'id' => 'example_multicheck',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array);

	$options[] = array(
		'name' => __('Colorpicker', 'widgeon'),
		'desc' => __('No color selected by default.', 'widgeon'),
		'id' => 'example_colorpicker',
		'std' => '',
		'type' => 'color' );

	$options[] = array( 'name' => __('Typography', 'widgeon'),
		'desc' => __('Example typography.', 'widgeon'),
		'id' => "example_typography",
		'std' => $typography_defaults,
		'type' => 'typography' );

	$options[] = array(
		'name' => __('Custom Typography', 'widgeon'),
		'desc' => __('Custom typography options.', 'widgeon'),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options );

	/*
	
	$options[] = array(
		'name' => __('Text Editor', 'widgeon'),
		'type' => 'heading' );

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	 
	 /*
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	$options[] = array(
		'name' => __('Default Text Editor', 'widgeon'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'widgeon' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	*/	
		
	return $options;
}