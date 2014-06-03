<?php
//header.php


//using the wordpress language_attributes function instead of hard-coding lang="en" for i18n...
?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php 
	//there are a lot of ways you can do this.  many themes perform a conditional check, is this the home page?  is it a search page?  
	//whatever.  I like to keep things simple.
	
	//for easy integration with Yoast SEO plugin, simply use:
	
	//wp_title('');
	
	//if you have NOT set up the Yoast SEO plugin, you might prefer something like this:
	wp_title( ' : ', true, 'right' );
	_e( esc_attr( get_bloginfo('name').' : '.get_bloginfo('description') ) ) ;
	
	?></title>
	<meta name="author" content="Mardesco">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr-2.6.1.min.js"></script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

	
	<?php
	$width = (int) esc_attr(of_get_option('widgeon_max_width', '1024'));
	if($width && is_int($width) && $width != 0){
	$breakpoint = $width -1;
	
	printf('
		<style type="text/css">
			#container{width:%dpx;}
			@media screen and (max-width:%dpx){
				#container{width:100%%;}
			}
		</style>', $width, $breakpoint);
	}
	?>
	
	
    
    <!-- begin wp_head -->
    <?php
	//if you're using the Yoast SEO plugin then you don't need to hard-code a meta description tag.
	//instead, just call:
	
	wp_head();
	
	//and it will do the work for you.
	
	//find that the wp_head function outputs a load of garbage you don't need?  start eliminating plugins.
	?>
    <!-- end wp_head -->

</head>
<body <?php 
//wordpress likes to tag the body element with css classes.  
//Add your own as a space-separated string or php array within this function call.
body_class(); 
?>>
<a href="#contentLink" class="visuallyhidden">Skip navigation</a>
<div id="container">
	<header class="site-header clearfix">
    	<hgroup>
            <h1 class="logo">
                <a href="<?php 
                    echo home_url('/');//appends a trailing slash
                    ?>" title="<?php printf( '%s : %s', esc_attr( get_bloginfo( 'name' ) ), esc_attr( get_bloginfo('description') ) ); ?>">
                <?php 
				
				$display_name = esc_attr(get_bloginfo('name'));
				
                // logo to display here, if you have one.  
				if(of_get_option('widgeon_logo')){
				
					printf('<img src="%s" alt="%s" />', esc_url(of_get_option( 'widgeon_logo' )), $display_name);
				
					?>

			<?php 
				}else{
					//otherwise:				
					printf('<span class="logotext">%s</span>', $display_name);
				}
                ?>
                </a>
            </h1>
            <!-- optional tagline display. -->
			<?php
			if(of_get_option('widgeon_slogan')){
				$site_slogan = esc_html(of_get_option('widgeon_slogan'));
			}else{
				$site_slogan = esc_html(get_bloginfo('description'));
			}
			
			printf('
            <h2 class="site-slogan">
				%s
            </h2>', $site_slogan);
            ?>			

        </hgroup>
        
        <?php
		get_search_form();//you can move this to the sidebar, but you'd have to modify the CSS to prevent it from overflowing.
		?>
        
<!-- primary navigation menu. -->
<?php

//quote from the documentation:
//"The Theme's main navigation should support a custom menu with wp_nav_menu()"
//http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29

wp_nav_menu(array(
	'theme_location' => 'header-nav',
	'container' => 'nav',
	'container_id' => 'headerNav'
	));
	
	//alternatively, you might like to simply use wp_page_menu();
?>

	</header>
	
	<?php
	  // display the slideshow, if one has been attached to the current page.
	  widgeon_slideshow();
	?>		

<div id="wrapper">

    <!-- optionally remove nav-specific classes as you see fit.  -->    	
    <div id="main" role="main">
	
<?php 
	// deleted breadcrumbs as of version 1.4.4: Plugin Territory
	// If you decide to install a breadcrumb plugin, you might place its main function here.
	
	
	
	// EXCEPTION: turns out there was still a breadcrumb call on single.php
	// I have now re-instituted breadcrumbs...
	
	// you could put them here or on individual pages.
?>	
		
		<a id="contentLink" class="visuallyhidden">&nbsp;</a>
		
	
		