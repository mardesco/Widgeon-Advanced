=== Widgeon Advanced ===
Author: Jesse Smith for Mardesco
Author URI: http://www.mardesco.com
Donate link: http://www.mardesco.com/payments/
Theme URI: https://github.com/mardesco/Widgeon-Advanced
Tags: responsive,responsive-layout,mobile,options,theme-options,custom-header,custom-background,custom-logo,custom-width,slideshow,slider,cycle2
Requires at least: 3.7
Tested up to: 3.9.1
Stable tag: trunk
License: GPLv2

An advanced framework for WordPress theme development. Implements the Options Framework by Devin Price, and the Cycle2 jQuery slideshow animation by M. Alsup.

== Description == 

An advanced framework for WordPress theme development.

* Flexible and simple. Appropriate for beginners and advanced users alike.
* Theme option to easily add your company's logo to the header bar
* Integrated slideshows with theme options: no additional plugin required
* Mobile-friendly design responds to screen size of viewing device
* Theme option for setting maximum container width
* Theme option for setting background color

== Disclaimer ==

These files are provided "as-is" with the express understanding that they are not fit for any use or purpose, much less merchantability.  Use them at your own risk.    
Unfortunately, I am unable to provide free technical support for this theme.  However, your constructive feedback and suggestions are welcome.  

== License ==

= Widgeon Advanced theme license =

The theme design and original source code are copyright 2014 by Jesse Smith, and dual licensed under the MIT and GPLv2 licenses.  Select the one that is most appropriate for your project.

= CSS Normalize / Reset = 

The CSS reset portion of the theme's stylesheet is based on the HTML5 Boilerplate's CSS reset, which is licensed under the MIT license as follows:

Copyright (c) HTML5 Boilerplate

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

= Options Framework License =

The Options Framework is copyright 2013 by Devin Price, and licensed under the GPLv2.

= Cycle2 License =

The Cycle2 slideshow animation is copyright 2014 by M. Alsup, and dual licensed under the MIT and GPL licenses.

== Installation ==

1. Download the theme files from the repository at `https://github.com/mardesco/Widgeon-Advanced`

2. Unzip the compressed folder

3. Copy the "Widgeon-Advanced-master" folder to your WordPress installation's themes folder,
	usually located at `/wp-content/themes/`
	
4. Activate the theme from your installation's Admin interface, Appearance > Themes

= Removal =

1. Deactivate and uninstall the theme from your installation's Admin interface, Appearance > Themes

== Frequently Asked Questions ==

= Adding your logo image to the header =

1. From your site's wp-admin interface, select Appearance > Theme Options
2. Select the "Basic Settings" tab if it is not already selected
3. Under Branding > Your Logo, upload your logo or select it from your media library.
4. Click "Save Options"
5. Your logo now displays in the headerbar of your public-facing site. 

= Creating a slideshow =

1. From your site's wp-admin interface, select Appearance > Theme Options
2. Select that "Slideshow Settings" tab
3. Check the select box that says, "Create and Use Slideshow 1"
4. Upload images for your slideshow, or use images from your media library. 
	NOTE: the theme does not presently crop or resize the selected images.  
	It is recommended that you select images of a uniform size.
5. Click "Save Options"
6. Within your site's wp-admin, navigate to edit the page where you want the slideshow to appear
	(Pages > All pages > selected page > Edit)
7. Locate the form field marked, "Your custom inputs" below the text editor.   
	Next to "Slideshow options" is a dropdown menu.  
8. Select "Use Slideshow 1" from the dropdown menu.
9. Click "Update"
10. Your selected page now displays your slideshow with a fancy animation.	

= Changing the background color =

1. From your site's wp-admin interface, select Appearance > Theme Options
2. Select the "Basic Settings" tab if it is not already selected
3. From the "Primary Color" section, select your desired background color from the dropdown menu.
4. Click "Save Options."
5. Your website now displays the background color of your choice.
	
= Managing the sidebars to suit your layout =

By default, the Widgeon Advanced theme displays a sidebar on the right-hand side of most pages and posts.
However, you can optionally display a left-hand sidebar in addition to or instead of the right-hand sidebar;
and you can optionally remove both sidebars for a clean single-column layout.  
To change the sidebar display:

1. From your site's wp-admin interface, select Appearance > Theme Options
2. Select the "Advanced Settings" tab if it is not already selected
3. Under the "Sidebar Options" dropdown menu, select the sidebar option that best suits your website.
4. Click "Save Options."
5. Your website now displays the desired sidebars. 
	(Please note: the theme's homepage and "full-width" template pages do not display sidebars, regardless of the above setting.)
	
= Changing the maximum container width =

The default maximum container width is 1040 pixels for screens larger than 1040 pixels.  
You can increase this value to better utilize the display area available on large screens.
Alternatively, you can eliminate the container width setting, for a layout that fills 100% of all screen widths.

1. From your site's wp-admin interface, select Appearance > Theme Options
2. Select the "Advanced Settings" tab if it is not already selected
3. Type a number in the box. DO NOT enter units of measurement.  This setting currently only accepts an integer.
4. Click "Save Options."
5. Your website's container element's width has been set.



== Changelog ==

0.0.3 Dropdown menu now drops downward, rather than scooting in from the side. Updated license information and added theme usage instructions to readme.txt
0.0.2 Improved use of printf, updated translation textdomain.
0.0.1 Major change: integrated theme options and slideshow
0.0.0 Initial version, based on the Widgeon Starting Point framework by Jesse Smith for Mardesco.  See `https://github.com/mardesco/WidgeonStartingPoint`
