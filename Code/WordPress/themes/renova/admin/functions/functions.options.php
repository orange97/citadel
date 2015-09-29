<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

/*-----------------------------------------------------------------*/
/*----Basic Screen----*/
/*-----------------------------------------------------------------*/				
$of_options[] = array( "name" => "Basic Settings",
					"type" => "heading");
										
$of_options[] = array("name" => "Main Logo",
					"desc" => "This logo will appear on the footer and above the menu",
					"id"   => "mainlogo",
					"std"  => "",
					"mod"  => "min",
					"type" => "media");

$of_options[] = array( "name" => "Mobile Logo",
					"desc" => "This logo will appear above the mobile menu only",
					"id" => "mobilelogo",
					"std" => "",
					"mod"  => "min",
					"type" => "media");

$of_options[] = array( "name"    => "Footer Title",
						"desc"   => "This text will appear above the address block",
						"id"     => "footer_title",
						"std"    => "Your Site",
						"type"   => "text");

$of_options[] = array( "name" => "Optional Footer Logo",
					"desc" => "This logo will appear on the footer above the address if the 'Footer Title' is null",
					"id" => "footerlogo",
					"std" => "",
					"type" => "media");

	
$of_options[] = array( "name"=> "Address",
					"desc"   => "HTML Allowed",
					"id"     => "footer_addressline",
					"std"    => "",
					"type"   => "textarea"); 

$of_options[] = array( "name"=> "Copyright",
					"desc"   => "Copyright text",
					"id"     => "footer_copyright",
					"std"    => "Copyright &copy; 2013. All rights reserved",
					"type"   => "text"); 


/*-----------------------------------------------------------------*/
/*----Appearance----*/
/*-----------------------------------------------------------------*/
$of_options[] = array( "name" => "Appearance Settings",
					   "type" => "heading");

$of_options[] = array( "name" => "Site Pre-loader",
						"desc" => "Add a page preloader",
						"id" => "opt_preloader",
						"std" => 0,
						"folds"		=> 1,
						"type" => "switch"
						); 

$of_options[] = array( 	"name" 		=> "Pre-loader Delay",
						"desc" 		=> "Delay time for preloader",
						"id" 		=> "hidden_preloader_delay",
						"std" 		=> "350",
						"fold" 		=> "opt_preloader", /* the switch hook */
						"min" 		=> "350",
						"step"		=> "5",
						"max" 		=> "1000",
						"type" 		=> "sliderui" 
				     );

// $of_options[] = array( 
// 	                "name" => "Pre-loader Loader Image",
// 					"desc" => "Gif image works as preloader",
// 					"id" => "hidden_preloader_gif",
// 					"std" => "",
// 					"mod" => "min",
// 					"type" => "media",
// 					"fold" => "opt_preloader", /* the switch hook */
// 					);	


$of_options[] = array( "name" => "Favicon",
					"desc" => "Website Favicon",
					"id" => "favicon",
					"std" => "",
					"mod" 		=> "min",
					"type" => "media");	

$of_options[] = array( "name" => "Splashpage Scroll Directive",
					"desc" => "Arrow icon appears at the bottom of the page with # link",
					"id" => "ssd_icon",
					"std" => "",
					"mod" 		=> "min",
					"type" => "media");	

$of_options[] = array( "name"    => "Splashpage Directive # Link",
						"desc"   => "ID of any page that comes after splash page",
						"id"     => "ssd_link",
						"std"    => "showcase",
						"type"   => "text");

$of_options[] = array( "name"    => "Background Images",
						"desc"   => "Background Image appears fullscreen behind right panel",
						"id"     => "bg_slider",
						"std"    => "",
						"type"   => "slider");
					
$of_options[] = array( "name" =>  "Theme Prominent Color",
					"desc" => "Pick a highlight color for the theme (default: #F48C2D).",
					"id" => "highlight_color",
					"std" => "#ffc000",
					"type" => "color");

$of_options[] = array( "name" =>  "Dark Sub-Heading Background Color",
					"desc" => "Applicable only for dark page/section sub-heading (default: #FFC000).",
					"id" => "dsh_color",
					"std" => "#FFC000",
					"type" => "color");

$of_options[] = array("name" =>  "Dark Sub-Heading Text Color",
					"desc" => "Applicable only for dark page/section sub-heading (default: #FFF).",
					"id" => "dsh_text_color",
					"std" => "#FFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Light Sub-Heading Background Color",
					"desc" => "Pick a color for light heading (default: #FFF).",
					"id" => "lsh_color",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Light Sub-Heading Text Color",
					"desc" => "Pick a color for light heading (default: #FFF).",
					"id" => "lsh_text_color",
					"std" => "#000",
					"type" => "color");


$of_options[] = array( "name" =>  "Dark Renova Heading Background Color",
					"desc" => "For Renova Heading Shortcode (default: ##111111).",
					"id" => "renovaheading_dark_bg",
					"std" => "#111111",
					"type" => "color");

$of_options[] = array("name" =>  "Dark Renova Heading Text Color",
					"desc" => "For Renova Heading Shortcode (default: #FFF).",
					"id" => "renovaheading_dark_text",
					"std" => "#FFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Light Renova Heading Background",
					"desc" => "Pick a text color for light heading (default: #FFF).",
					"id" => "renovaheading_light_bg",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Light Renova Heading Text Color",
					"desc" => "Pick a color for light heading (default: #FFF).",
					"id" => "renovaheading_light_text",
					"std" => "#000",
					"type" => "color");


$of_options[] = array( 	"name" 		=> "Split Area Background Transparency",
						"desc" 		=> "Transparency Switch",
						"id" 		=> "transparency_level",
						"std" 		=> 1,
						"type" 		=> "switch"
				);   

// $of_options[] = array( "name" => "Special Heading font",
// 						"desc" => "Some description. Note that this is a custom text added added from options file.",
// 						"id" => "heading_g_select",
// 						"std" => "Select a font",
// 						"type" => "select_google_font",
// 						"preview" => array(
// 						"text" => "This is my preview text!", //this is the text from preview box
// 						"size" => "30px" //this is the text size from preview box
// 						),
// 						"options" => array(
// 						"none" => "Select a font",//please, always use this key: "none"
// 						"Lobster" => "Lobster",
// 						"Raleway" => "Raleway",
// 						"Arvo" => "Arvo",
// 						"Dancing Script" => "Dancing Script",
// 						"Allan" => "Allan",
// 						"Molengo" => "Molengo",
// 						"Droid Serif" => "Droid Serif",
// 						"Corbin" => "Corbin",
// 						"Ubuntu" => "Ubuntu",
// 						"Merriweather" => "Merriweather",
// 						"Source Sans Pro" => "Source Sans Pro"
// 						)
// 					);
// $of_options[] = array( "name" => "Common Heading font",
// 						"desc" => "H1 to H6",
// 						"id" => "ch_g_select",
// 						"std" => "Select a font",
// 						"type" => "select_google_font",
// 						"preview" => array(
// 						"text" => "Amaze Heading", //this is the text from preview box
// 						"size" => "30px" //this is the text size from preview box
// 						),
// 						"options" => array(
// 						"none" => "Select a font",//please, always use this key: "none"
// 						"Lobster" => "Lobster",
// 						"Raleway" => "Raleway",
// 						"Arvo" => "Arvo",
// 						"Dancing Script" => "Dancing Script",
// 						"Allan" => "Allan",
// 						"Molengo" => "Molengo",
// 						"Droid Serif" => "Droid Serif",
// 						"Corbin" => "Corbin",
// 						"Ubuntu" => "Ubuntu",
// 						"Merriweather" => "Merriweather",
// 						"Open Sans" => "Open Sans",
// 						"Source Sans Pro" => "Source Sans Pro"
// 						)
// 					);

// $of_options[] = array( "name" => "Text Fonts",
// 						"desc" => "Fonts for paragraphs.",
// 						"id" => "text_g_select",
// 						"std" => "Select a font",
// 						"type" => "select_google_font",
// 						"preview" => array(
// 						"text" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id bibendum libero. Curabitur a neque quis odio tincidunt suscipit eget.", //this is the text from preview box
// 						"size" => "16px" //this is the text size from preview box
// 						),
// 						"options" => array(
// 						"none" => "Select a font",//please, always use this key: "none"
// 						"Lato" => "Lato",
// 						"PT Sans" => "PT Sans",
// 						"Tangerine" => "Tangerine",
// 						"Terminal Dosis" => "Terminal Dosis",
// 						"Open Sans" => "Open Sans",
// 						"Droid Sans" => "Droid Sans",
// 						"Cabin" => "Cabin",
// 						"Crimson Text" => "Crimson Text",
// 						"Cardo" => "Cardo",
// 						"Lekton" => "Lekton",
// 						"Nobile" => "Nobile",
// 						"Vollkorn" => "Vollkorn",
// 						)
// 					);

$of_options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => "custom_css",
                    "std" => "",
                    "type" => "textarea");
/*-----------------------------------------------------------------*/
/*----Social Media ----*/
/*-----------------------------------------------------------------*/
$of_options[] = array( "name" => "Social Media",
					   "type" => "heading");

$of_options[] = array( "name" => "Hello there!",
					"desc" => "",
					"id" => "introduction",
					"std" => "Leave unwanted fields blank so as they will not appear on live website. Excluding RSS feed, you just need to add your id only",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name"    => "Facebook",
						"desc"   => "Facebook profile id",
						"id"     => "facebook",
						"std"    => "facebook",
						"type"   => "text");

$of_options[] = array( "name"    => "Twitter",
						"desc"   => "Twitter profile id",
						"id"     => "twitter",
						"std"    => "designovastudio",
						"type"   => "text");

$of_options[] = array( "name"    => "LinedIn",
						"desc"   => "LinikedIn profile id",
						"id"     => "linkedin",
						"std"    => "linkedin",
						"type"   => "text");

$of_options[] = array( "name"    => "Pintrest",
						"desc"   => "Pintrest profile id",
						"id"     => "pintrest",
						"std"    => "designova",
						"type"   => "text");

$of_options[] = array( "name"    => "googleplus",
						"desc"   => "Google Plus profile id",
						"id"     => "googleplus",
						"std"    => "designova",
						"type"   => "text");

$of_options[] = array( "name"    => "dribbble",
						"desc"   => "Dribbble  profile id",
						"id"     => "dribbble",
						"std"    => "designova",
						"type"   => "text");

// $of_options[] = array( "name"    => "Behance",
// 						"desc"   => "Behance  profile id",
// 						"id"     => "behance",
// 						"std"    => "",
// 						"type"   => "text");

// $of_options[] = array( "name"    => "Vimeo",
// 						"desc"   => "Vimeo  profile id",
// 						"id"     => "vimeo",
// 						"std"    => "",
// 						"type"   => "text");

$of_options[] = array( "name"    => "RSS Feed",
						"desc"   => "RSS Feed link - You need to specify the full link ",
						"id"     => "rss",
						"std"    => "designova",
						"type"   => "text");
/*-----------------------------------------------------------------*/
/*----Contact form ----*/
/*-----------------------------------------------------------------*/
$of_options[] = array( "name" => "Contact Form",
					"type" => "heading");
										
$of_options[] = array( "name" => "Contact Form Email",
					"desc" => "Contact form data will be mailed to this email",
					"id" => "contact_email",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Contact form Subject",
					"desc" => "Insert HTML contents to appear on splash page here",
					"id" => "contact_subject",
					"std" => "Contact through website ",
					"type" => "text"); 

$of_options[] = array( "name" => "Name Label",
					"desc" => "Label for name, replace with your own language",
					"id" => "label_name",
					"std" => "Name",
					"type" => "text");

$of_options[] = array( "name" => "Email Label",
					"desc" => "Label for email, replace with your own language",
					"id" => "label_email",
					"std" => "Email",
					"type" => "text");

$of_options[] = array( "name" => "Message Label",
					"desc" => "Label for email, replace with your own language",
					"id" => "label_message",
					"std" => "Message",
					"type" => "text");

$of_options[] = array( "name" => "Success Message",
					"desc" => "On Successful submission",
					"id" => "msg_success",
					"std" => "Message sent successfully!",
					"type" => "text");

$of_options[] = array( "name" => "Failure Message",
					"desc" => "On Successful submission",
					"id" => "msg_fail",
					"std" => "Oops! Something went wrong try again!",
					"type" => "text");
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
