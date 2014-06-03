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
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {


	$options = array();

	
	// Basic settings.
	
	$options[] = array(
		'name' => __('Basic Settings', 'options_framework_theme'),
		'type' => 'heading'
		);

		
	$options[] = array(
		'name' => __('Branding', 'options_framework_theme'),
		'desc' => __('These settings determine the display of your website&#039;s branding.', 'options_framework_theme'),
		'type' => 'info'
		);		
		

	// logo in headerbar.
	$options[] = array(
		'name' => __('Your Logo', 'options_framework_theme'),
		'desc' => __('Add your logo to the theme headerbar.', 'options_framework_theme'),
		'id' => 'widgeon_logo',
		'type' => 'upload'
		);	
	
	
	// custom text in headerbar.
	$options[] = array(
		'name' => __('Slogan Text', 'options_framework_theme'),
		'desc' => __('Your phone number, company slogan, or call to action. Leave blank to default to your blog&#039;s tagline.', 'options_framework_theme'),
		'id' => 'widgeon_slogan',
		'std' => '',
		'type' => 'text'
		);
		
	
	// selectable color scheme.
	$colors_array = array(
		'blue' => __('Blue', 'options_framework_theme'),
		'green' => __('Green', 'options_framework_theme'),
		'maroon' => __('Maroon', 'options_framework_theme'),
		'grey' => __('Grey', 'options_framework_theme'),
		'white' => __('White', 'options_framework_theme')
	);	
	
	$options[] = array(
		'name' => __('Primary Color', 'options_framework_theme'),
		'desc' => __('What color should be emphasized most prominently in your website&#039;s design?', 'options_framework_theme'),
		'id' => 'widgeon_colors',
		'std' => 'grey',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $colors_array
		);		
	
	
	// Advanced settings.
	
	$options[] = array(
		'name' => __('Advanced Settings', 'options_framework_theme'),
		'type' => 'heading');	
	
	
	$options[] = array(
		'name' => __('Site Layout', 'options_framework_theme'),
		'desc' => __('These settings determine the overall layout and styling of your website.', 'options_framework_theme'),
		'type' => 'info'
		);	
	
	
	// select sidebar options.
	$sidebar_array = array(
		'left' => __('Left sidebar', 'options_framework_theme'),
		'right' => __('Right sidebar', 'options_framework_theme'),
		'both' => __('Both sidebars', 'options_framework_theme'),
		'neither' => __('No sidebars ever', 'options_framework_theme')
	);	
	
	$options[] = array(
		'name' => __('Sidebar Options', 'options_framework_theme'),
		'desc' => __('Which sidebars would you like to display by default on most pages and posts? (Does not apply to homepage or full-width pages.)', 'options_framework_theme'),
		'id' => 'widgeon_sidebars',
		'std' => 'right',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $sidebar_array
		);	
	
	
	// set max container width.
	$options[] = array(
		'name' => __('Max container width', 'options_framework_theme'),
		'desc' => __('The maximum width of your site&#039;s container element (in pixels).', 'options_framework_theme'),
		'id' => 'widgeon_max_width',
		'std' => '1024',
		'class' => 'mini',
		'type' => 'text'
		);	
	
	// Slideshow Settings
	
	$options[] = array(
		'name' => __('Slideshow Settings', 'options_framework_theme'),
		'type' => 'heading'
		);	
	
	
	$options[] = array(
		'name' => __('Use Slideshows', 'options_framework_theme'),
		'desc' => __('These settings allow you to create and manage up to 3 slideshows within your theme.', 'options_framework_theme'),
		'type' => 'info'
		);		
	
	// this is a bit cumbersome but it's good enough for now.
	// Someday I'll write a more elegant system.


	
	// Slideshow 1
	
	$options[] = array(
		'name' => __('Display Slideshow 1', 'options_framework_theme'),
		'desc' => __('Create and use Slideshow 1.', 'options_framework_theme'),
		'id' => 'widgeon_slideshow1_showhidden',
		'type' => 'checkbox'
		);

	$options[] = array(
		'name' => __('Slideshow 1', 'options_framework_theme'),
		'desc' => __('Select the images that you want displayed in the Slideshow 1.  If you use the "Front page displays: your latest posts" option from Settings > Reading, then Slideshow 1 will display automatically on your site&#039;s homepage.  To use this slideshow in any other page or post, visit that page in the WordPress editor and select "Display Slideshow 1" from the "Slideshow Options" menu.', 'options_framework_theme'),
		'class' => 'hidden widgeon-slideshow-1',
		'type' => 'info'
		);


	// slideshow 1 slide 1
	$options[] = array(
		'name' => __('Slide 1', 'options_framework_theme'),
		'desc' => __('Select an image.', 'options_framework_theme'),
		'id' => 'slideshow_1_slide_1',
		'class' => 'hidden widgeon-slideshow-1',		
		'type' => 'upload'
		);

	// slideshow 1 slide 2
	$options[] = array(
		'name' => __('Slide 2', 'options_framework_theme'),
		'desc' => __('Select an image.', 'options_framework_theme'),
		'id' => 'slideshow_1_slide_2',
		'class' => 'hidden widgeon-slideshow-1',		
		'type' => 'upload'
		);

	// slideshow 1 slide 3
	$options[] = array(
		'name' => __('Slide 3', 'options_framework_theme'),
		'desc' => __('Select an image.', 'options_framework_theme'),
		'id' => 'slideshow_1_slide_3',
		'class' => 'hidden widgeon-slideshow-1',		
		'type' => 'upload'
		);		
		
	// slideshow 1 slide 4
	$options[] = array(
		'name' => __('Slide 4', 'options_framework_theme'),
		'desc' => __('Select an image.', 'options_framework_theme'),
		'id' => 'slideshow_1_slide_4',
		'class' => 'hidden widgeon-slideshow-1',		
		'type' => 'upload'
		);		
		
		
	// slideshow 1 slide 5
	$options[] = array(
		'name' => __('Slide 5', 'options_framework_theme'),
		'desc' => __('Select an image.', 'options_framework_theme'),
		'id' => 'slideshow_1_slide_5',
		'class' => 'hidden widgeon-slideshow-1',		
		'type' => 'upload'
		);		
		
		
		
	
	// Slideshow 2
	
	$options[] = array(
		'name' => __('Display Slideshow 2', 'options_framework_theme'),
		'desc' => __('Create and use Slideshow 2.', 'options_framework_theme'),
		'id' => 'widgeon_slideshow2_showhidden',
		'type' => 'checkbox'
		);

	$options[] = array(
		'name' => __('Slideshow 2', 'options_framework_theme'),
		'desc' => __('Select the images that you want displayed in the Slideshow 2. To use this slideshow in any page or post, visit that page in the WordPress editor and select "Display Slideshow 2" from the "Slideshow Options" menu at the bottom.', 'options_framework_theme'),
		'class' => 'hidden widgeon-slideshow-2',
		'type' => 'info'
		);


	// slideshow 2 slide 1
	$options[] = array(
		'name' => __('Slide 1', 'options_framework_theme'),
		'desc' => __('Select an image.', 'options_framework_theme'),
		'id' => 'slideshow_2_slide_1',
		'class' => 'hidden widgeon-slideshow-2',		
		'type' => 'upload'
		);

	// slideshow 2 slide 2
	$options[] = array(
		'name' => __('Slide 2', 'options_framework_theme'),
		'desc' => __('Select an image.', 'options_framework_theme'),
		'id' => 'slideshow_2_slide_2',
		'class' => 'hidden widgeon-slideshow-2',		
		'type' => 'upload'
		);

	// slideshow 2 slide 3
	$options[] = array(
		'name' => __('Slide 3', 'options_framework_theme'),
		'desc' => __('Select an image.', 'options_framework_theme'),
		'id' => 'slideshow_2_slide_3',
		'class' => 'hidden widgeon-slideshow-2',		
		'type' => 'upload'
		);		
		
	// slideshow 2 slide 4
	$options[] = array(
		'name' => __('Slide 4', 'options_framework_theme'),
		'desc' => __('Select an image.', 'options_framework_theme'),
		'id' => 'slideshow_2_slide_4',
		'class' => 'hidden widgeon-slideshow-2',		
		'type' => 'upload'
		);		
		
		
	// slideshow 2 slide 5
	$options[] = array(
		'name' => __('Slide 5', 'options_framework_theme'),
		'desc' => __('Select an image.', 'options_framework_theme'),
		'id' => 'slideshow_2_slide_5',
		'class' => 'hidden widgeon-slideshow-2',		
		'type' => 'upload'
		);		
		

	
	// Slideshow 3
	
	$options[] = array(
		'name' => __('Display Slideshow 3', 'options_framework_theme'),
		'desc' => __('Create and use Slideshow 3.', 'options_framework_theme'),
		'id' => 'widgeon_slideshow3_showhidden',
		'type' => 'checkbox'
		);

	$options[] = array(
		'name' => __('Slideshow 3', 'options_framework_theme'),
		'desc' => __('Select the images that you want displayed in the Slideshow 3.  To use this slideshow in any page or post, visit that page in the WordPress editor and select "Display Slideshow 3" from the "Slideshow Options" menu at the bottom.', 'options_framework_theme'),
		'class' => 'hidden widgeon-slideshow-3',
		'type' => 'info'
		);


	// slideshow 1 slide 1
	$options[] = array(
		'name' => __('Slide 1', 'options_framework_theme'),
		'desc' => __('Select an image.', 'options_framework_theme'),
		'id' => 'slideshow_3_slide_1',
		'class' => 'hidden widgeon-slideshow-3',		
		'type' => 'upload'
		);

	// slideshow 1 slide 2
	$options[] = array(
		'name' => __('Slide 2', 'options_framework_theme'),
		'desc' => __('Select an image.', 'options_framework_theme'),
		'id' => 'slideshow_3_slide_2',
		'class' => 'hidden widgeon-slideshow-3',		
		'type' => 'upload'
		);

	// slideshow 1 slide 3
	$options[] = array(
		'name' => __('Slide 3', 'options_framework_theme'),
		'desc' => __('Select an image.', 'options_framework_theme'),
		'id' => 'slideshow_3_slide_3',
		'class' => 'hidden widgeon-slideshow-3',		
		'type' => 'upload'
		);		
		
	// slideshow 1 slide 4
	$options[] = array(
		'name' => __('Slide 4', 'options_framework_theme'),
		'desc' => __('Select an image.', 'options_framework_theme'),
		'id' => 'slideshow_3_slide_4',
		'class' => 'hidden widgeon-slideshow-3',		
		'type' => 'upload'
		);		
		
		
	// slideshow 1 slide 5
	$options[] = array(
		'name' => __('Slide 5', 'options_framework_theme'),
		'desc' => __('Select an image.', 'options_framework_theme'),
		'id' => 'slideshow_3_slide_5',
		'class' => 'hidden widgeon-slideshow-3',		
		'type' => 'upload'
		);		
				
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
/*




	// Test data
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_framework_theme'),
		'two' => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four' => __('Crepe', 'options_framework_theme'),
		'five' => __('Waffle', 'options_framework_theme')
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
		'name' => __('Input Text Mini', 'options_framework_theme'),
		'desc' => __('A mini text input field.', 'options_framework_theme'),
		'id' => 'example_text_mini',
		'std' => 'Default',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Input Text', 'options_framework_theme'),
		'desc' => __('A text input field.', 'options_framework_theme'),
		'id' => 'example_text',
		'std' => 'Default Value',
		'type' => 'text');

	$options[] = array(
		'name' => __('Textarea', 'options_framework_theme'),
		'desc' => __('Textarea description.', 'options_framework_theme'),
		'id' => 'example_textarea',
		'std' => 'Default Text',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Input Select Small', 'options_framework_theme'),
		'desc' => __('Small Select Box.', 'options_framework_theme'),
		'id' => 'example_select',
		'std' => 'three',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('Input Select Wide', 'options_framework_theme'),
		'desc' => __('A wider select box.', 'options_framework_theme'),
		'id' => 'example_select_wide',
		'std' => 'two',
		'type' => 'select',
		'options' => $test_array);

	if ( $options_categories ) {
	$options[] = array(
		'name' => __('Select a Category', 'options_framework_theme'),
		'desc' => __('Passed an array of categories with cat_ID and cat_name', 'options_framework_theme'),
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
		'name' => __('Select a Page', 'options_framework_theme'),
		'desc' => __('Passed an pages with ID and post_title', 'options_framework_theme'),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages);

	$options[] = array(
		'name' => __('Input Radio (one)', 'options_framework_theme'),
		'desc' => __('Radio select with default options "one".', 'options_framework_theme'),
		'id' => 'example_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $test_array);

	$options[] = array(
		'name' => __('Example Info', 'options_framework_theme'),
		'desc' => __('This is just some example information you can put in the panel.', 'options_framework_theme'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Input Checkbox', 'options_framework_theme'),
		'desc' => __('Example checkbox, defaults to true.', 'options_framework_theme'),
		'id' => 'example_checkbox',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Advanced Settings', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Check to Show a Hidden Text Input', 'options_framework_theme'),
		'desc' => __('Click here and see what happens.', 'options_framework_theme'),
		'id' => 'example_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Hidden Text Input', 'options_framework_theme'),
		'desc' => __('This option is hidden unless activated by a checkbox click.', 'options_framework_theme'),
		'id' => 'example_text_hidden',
		'std' => 'Hello',
		'class' => 'hidden',
		'type' => 'text');

	$options[] = array(
		'name' => __('Uploader Test', 'options_framework_theme'),
		'desc' => __('This creates a full size uploader that previews the image.', 'options_framework_theme'),
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
		'name' =>  __('Example Background', 'options_framework_theme'),
		'desc' => __('Change the background CSS.', 'options_framework_theme'),
		'id' => 'example_background',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __('Multicheck', 'options_framework_theme'),
		'desc' => __('Multicheck description.', 'options_framework_theme'),
		'id' => 'example_multicheck',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array);

	$options[] = array(
		'name' => __('Colorpicker', 'options_framework_theme'),
		'desc' => __('No color selected by default.', 'options_framework_theme'),
		'id' => 'example_colorpicker',
		'std' => '',
		'type' => 'color' );

	$options[] = array( 'name' => __('Typography', 'options_framework_theme'),
		'desc' => __('Example typography.', 'options_framework_theme'),
		'id' => "example_typography",
		'std' => $typography_defaults,
		'type' => 'typography' );

	$options[] = array(
		'name' => __('Custom Typography', 'options_framework_theme'),
		'desc' => __('Custom typography options.', 'options_framework_theme'),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options );

	/*
	
	$options[] = array(
		'name' => __('Text Editor', 'options_framework_theme'),
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
		'name' => __('Default Text Editor', 'options_framework_theme'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'options_framework_theme' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	*/	
		
	return $options;
}