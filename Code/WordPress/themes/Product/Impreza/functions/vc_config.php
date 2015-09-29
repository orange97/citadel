<?php

if ( ! function_exists('vc_remove_element')) {
	return;
}

$vc_is_wp_version_3_6_more = version_compare( preg_replace( '/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo( 'version' ) ), '3.6' ) >= 0;

$target_arr = array(
	__( 'Same window', 'js_composer' ) => '_self',
	__( 'New window', 'js_composer' ) => "_blank"
);

$add_css_animation = array(
	"type" => "dropdown",
	"heading" => __("Animation", "js_composer"),
	"param_name" => "animate",
	"admin_label" => true,
	"value" => array(
		__("No Animation", "js_composer") => '',
		__("Fade", "js_composer") => "fade",
		__("Appear From Center", "js_composer") => "afc",
		__("Appear From Left", "js_composer") => "afl",
		__("Appear From Right", "js_composer") => "afr",
		__("Appear From Bottom", "js_composer") => "afb",
		__("Appear From Top", "js_composer") => "aft",
		__("Height From Center", "js_composer") => "hfc",
		__("Width From Center", "js_composer") => "wfc",
		__("Rotate From Center", "js_composer") => "rfc",
		__("Rotate From Left", "js_composer") => "rfl",
		__("Rotate From Right", "js_composer") => "rfr",
	),
	"description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "js_composer")
);

$add_css_animation_delay = array(
	"type" => "dropdown",
	"heading" => __("Animation Delay", "js_composer"),
	"param_name" => "animate_delay",
	"admin_label" => true,
	"value" => array(
		__("None", "js_composer") => '',
		__("0.2 second", "js_composer") => "0.2",
		__("0.4 second", "js_composer") => "0.4",
		__("0.6 second", "js_composer") => "0.6",
		__("0.8 second", "js_composer") => "0.8",
		__("1 second", "js_composer") => "1",
	),
	"description" => ''
);

$post_categories = array('All' => '');
$post_categories_raw = get_categories("hierarchical=0");
foreach ($post_categories_raw as $post_category_raw)
{
	$post_categories[$post_category_raw->name] = $post_category_raw->slug;
}
$portfolio_categories = array('All' => '');
$portfolio_categories_raw = get_categories("taxonomy=us_portfolio_category&hierarchical=0");//print_r($portfolio_categories_raw);
foreach ($portfolio_categories_raw as $portfolio_category_raw)
{
	$portfolio_categories[$portfolio_category_raw->name] = $portfolio_category_raw->slug;
}

// Remove templates
if ( ! function_exists( 'us_vc_remove_default_templates' ) ) {
	function us_vc_remove_default_templates( $data ) {
		return array();
	}

	add_filter('vc_load_default_templates', 'us_vc_remove_default_templates');

}

// Remove elements we do not use
vc_remove_element('vc_text_separator');
vc_remove_element('vc_facebook');
vc_remove_element('vc_tweetmeme');
vc_remove_element('vc_googleplus');
vc_remove_element('vc_pinterest');
vc_remove_element('vc_toggle');
vc_remove_element('vc_images_carousel');
vc_remove_element('vc_tour');
vc_remove_element('vc_teaser_grid');
vc_remove_element('vc_posts_grid');
vc_remove_element('vc_carousel');
vc_remove_element('vc_posts_slider');
vc_remove_element('vc_button2');
vc_remove_element('vc_btn');
vc_remove_element('vc_cta');
vc_remove_element('vc_cta_button');
vc_remove_element('vc_cta_button2');
vc_remove_element('vc_progress_bar');
vc_remove_element('vc_pie');
vc_remove_element('vc_basic_grid');
vc_remove_element('vc_media_grid');
vc_remove_element('vc_masonry_grid');
vc_remove_element('vc_masonry_media_grid');
vc_remove_element('vc_icon');

// Remove elements we will redefine
vc_remove_element('vc_separator');
vc_remove_element('vc_message');
vc_remove_element('vc_single_image');
vc_remove_element('vc_gallery');
vc_remove_element('vc_button');
vc_remove_element('vc_tabs');
vc_remove_element('vc_tab');
vc_remove_element('vc_accordion');
vc_remove_element('vc_accordion_tab');
vc_remove_element('vc_video');
vc_remove_element('vc_gmaps');
vc_remove_element('vc_raw_html');
vc_remove_element('vc_raw_js');
vc_remove_element('vc_widget_sidebar');
vc_remove_element('vc_flickr');
vc_remove_element('vc_empty_space');
vc_remove_element('vc_custom_heading');

// Change params for Row - vc_row
vc_remove_param('vc_row', 'el_id');
vc_remove_param('vc_row', 'parallax');
vc_remove_param('vc_row', 'full_width');
vc_remove_param('vc_row', 'el_class');
vc_remove_param('vc_row', 'css');

vc_add_params('vc_row', array(
	array(
		"type" => "dropdown",
		"heading" => __("Columns Type", "js_composer"),
		"param_name" => "columns_type",
		"value" => array(__("Default columns", "js_composer") => "default", __("Columns with wider gaps", "js_composer") => "wide", __("Boxed columns without gaps", "js_composer") => "none",),
		"description" => '',
	),
	array(
		"type" => "checkbox",
		"heading" => __("Separate Section", "js_composer"),
		"param_name" => "section",
		"value" => array(__("Place this row into a separate section", "js_composer") => "yes"),
	),
	array(
		"type" => "checkbox",
		"heading" => __("Full Screen Section", "js_composer"),
		"param_name" => "full_screen",
		"value" => array(__("Make this section height equal to the screen height", "js_composer") => "yes"),
		"dependency" => Array('element' => "section", 'not_empty' => true),
	),
	array(
		"type" => "checkbox",
		"param_name" => "vertical_centering",
		"value" => array(__("Center content of this section by vertical", "js_composer") => "yes"),
		"dependency" => Array('element' => "full_screen", 'not_empty' => true),
	),
	array(
		"type" => "checkbox",
		"heading" => __("Full Width Content", "js_composer"),
		"param_name" => "full_width",
		"value" => array(__("Stretch content to the full width", "js_composer") => "yes"),
		"dependency" => Array('element' => "section", 'not_empty' => true),
		"edit_field_class" => "vc_col-sm-6 vc_column",
	),
	array(
		"type" => "checkbox",
		"heading" => __("Full Height Content", "js_composer"),
		"param_name" => "full_height",
		"value" => array(__("Remove vertical indents", "js_composer") => "yes"),
		"dependency" => Array('element' => "section", 'not_empty' => true),
		"edit_field_class" => "vc_col-sm-6 vc_column",
	),
	array(
		"type" => "dropdown",
		"heading" => __("Section Color Style", "js_composer"),
		"param_name" => "background",
		"value" => array(__('Main Content (default)', "js_composer") => "", __('Alternate Content', "js_composer") => "alternate", __('Primary background color & White text color', "js_composer") => "primary", __('Secondary background color & White text color', "js_composer") => "secondary", __('Custom colors', "js_composer") => 'custom'),
		"description" => "",
		"dependency" => Array('element' => "section", 'not_empty' => true)
	),
	array(
		'param_name' => 'bg_color_info', // all params must have a unique name
		'type' => 'textfield', // this param type
		"heading" => __("Background Color"),
		'description' => __( 'You can set custom background color in "Design Options" tab', 'js_composer' ), // some description if needed
		'value' => '', // your custom markup
		"dependency" => Array('element' => "background", 'value' => 'custom'),
		"edit_field_class" => "vc_col-sm-6 vc_column us-info-text",
	),
	array(
		"type" => "colorpicker",
		"holder" => "div",
		"class" => "",
		"heading" => __("Text Color"),
		"param_name" => "section_text_color",
		"description" => '',
		"dependency" => Array('element' => "background", 'value' => 'custom'),
		"edit_field_class" => "vc_col-sm-6 vc_column",
	),
	array(
		"type" => "attach_image",
		"heading" => __("Section Background Image", "js_composer"),
		"param_name" => "img",
		"value" => "",
		"description" => '',
		"dependency" => Array('element' => "section", 'not_empty' => true)
	),
	array(
		"type" => "dropdown",
		"heading" => __("Parallax Effect", "js_composer"),
		"param_name" => "parallax",
		"value" => array(__("None", "js_composer") => "", __("Vertical Parallax", "js_composer") => "vertical", __("Horizontal Parallax", "js_composer") => "horizontal",  __('Still (Image not moves)', "js_composer") => "still",),
		"dependency" => Array('element' => "section", 'not_empty' => true)
	),
	array(
		"type" => "dropdown",
		"heading" => __("Parallax Background Width", "js_composer"),
		"param_name" => "parallax_bg_width",
		"value" => array("110%" => "110", "120%" => "120", "130%" => "130", "140%" => "140", "150%" => "150", ),
		"description" => '',
		"dependency" => Array('element' => "parallax", 'value' => array('horizontal'))
	),
	array(
		"type" => "checkbox",
		"heading" => __("Reverse Parallax", "js_composer"),
		"param_name" => "parallax_reverse",
		"value" => array(__("Reverse Parallax Effect", "js_composer") => "yes"),
		"dependency" => Array('element' => "parallax", 'value' => array('vertical'))
	),
	array(
		"type" => "checkbox",
		"heading" => __("Background Video", "js_composer"),
		"param_name" => "video",
		"value" => array(__("Apply Background Video to this section", "js_composer") => "yes"),
		"dependency" => Array('element' => "section", 'not_empty' => true)
	),
	array(
		"type" => "textfield",
		"heading" => __("MP4 video file", "js_composer"),
		"param_name" => "video_mp4",
		"description" => __("Add link to MP4 video file", "js_composer"),
		"dependency" => Array('element' => "video", 'not_empty' => true)
	),
	array(
		"type" => "textfield",
		"heading" => __("OGV video file", "js_composer"),
		"param_name" => "video_ogg",
		"description" => __("Add link to OGV video file", "js_composer"),
		"dependency" => Array('element' => "video", 'not_empty' => true)
	),
	array(
		"type" => "textfield",
		"heading" => __("WebM video file", "js_composer"),
		"param_name" => "video_webm",
		"description" => __("Add link to WebM video file", "js_composer"),
		"dependency" => Array('element' => "video", 'not_empty' => true)
	),

	array(
		"type" => "colorpicker",
		"holder" => "div",
		"class" => "",
		"heading" => __("Overlay Color"),
		"param_name" => "section_overlay",
		"description" => '',
		"dependency" => Array('element' => "section", 'not_empty' => true),
	),
//	array(
//		"type" => "dropdown",
//		"heading" => __("Overlay", "js_composer"),
//		"param_name" => "overlay",
//		"value" => array(__('None', "js_composer") => "",__('10% White', "js_composer") => "white_10", __('20% White', "js_composer") => "white_20", __('30% White', "js_composer") => "white_30", __('40% White', "js_composer") => "white_40", __('50% White', "js_composer") => "white_50", __('60% White', "js_composer") => "white_60", __('70% White', "js_composer") => "white_70", __('80% White', "js_composer") => "white_80", __('90% White', "js_composer") => "white_90", __('10% Black', "js_composer") => "black_10", __('20% Black', "js_composer") => "black_20", __('30% Black', "js_composer") => "black_30", __('40% Black', "js_composer") => "black_40", __('50% Black', "js_composer") => "black_50", __('60% Black', "js_composer") => "black_60", __('70% Black', "js_composer") => "black_70", __('80% Black', "js_composer") => "black_80", __('90% Black', "js_composer") => "black_90", ),
//		"description" => '',
//		"dependency" => Array('element' => "section", 'not_empty' => true)
//	),
	array(
		"type" => "textfield",
		"heading" => __("Row/Section ID", "js_composer"),
		"param_name" => "section_id",
		"description" => '',
	),
	array(
		"type" => "textfield",
		"heading" => __("Extra class name", "js_composer"),
		"param_name" => "el_class",
		"description" => '',
	),
	array(
		'type' => 'css_editor',
		'heading' => __( 'Css', 'js_composer' ),
		'param_name' => 'css',
		'group' => __( 'Design options', 'js_composer' )
	),
));

vc_remove_param('vc_row_inner', 'el_class');
vc_remove_param('vc_row_inner', 'el_id');
vc_remove_param('vc_row_inner', 'css');

vc_add_params('vc_row_inner', array(
	array(
		"type" => "dropdown",
		"heading" => __("Columns Type", "js_composer"),
		"param_name" => "columns_type",
		"value" => array(__("Default columns", "js_composer") => "default", __("Columns with wider gaps", "js_composer") => "wide", __("Boxed columns without gaps", "js_composer") => "none",),
		"description" => '',
	),
	array(
		"type" => "textfield",
		"heading" => __("Row ID", "js_composer"),
		"param_name" => "section_id",
		"description" => '',
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Extra class name', 'js_composer' ),
		'param_name' => 'el_class',
		'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
	),
	array(
		'type' => 'css_editor',
		'heading' => __( 'Css', 'js_composer' ),
		'param_name' => 'css',
		// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
		'group' => __( 'Design options', 'js_composer' )
	),
));

// Change params for Column - vc_column

vc_remove_param('vc_column', 'el_class');
vc_remove_param('vc_column', 'css');
vc_remove_param('vc_column', 'width');
vc_remove_param('vc_column', 'offset');

vc_add_params('vc_column', array(
	array(
		"type" => "colorpicker",
		"class" => "",
		"heading" => __("Text Color"),
		"param_name" => "text_color",
		"value" => '', //Default Red color
		"description" => ''
	),
	$add_css_animation,
	$add_css_animation_delay,
	array(
		'type' => 'textfield',
		'heading' => __( 'Extra class name', 'js_composer' ),
		'param_name' => 'el_class',
		'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
	),
	array(
		'type' => 'css_editor',
		'heading' => __( 'Css', 'js_composer' ),
		'param_name' => 'css',
		// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
		'group' => __( 'Design options', 'js_composer' )
	),
));

vc_remove_param('vc_column_inner', 'el_class');
vc_remove_param('vc_column_inner', 'css');
vc_remove_param('vc_column_inner', 'width');

vc_add_params('vc_column_inner', array(
	array(
		"type" => "colorpicker",
		"class" => "",
		"heading" => __("Text Color"),
		"param_name" => "text_color",
		"value" => '', //Default Red color
		"description" => ''
	),
	$add_css_animation,
	$add_css_animation_delay,
	array(
		'type' => 'css_editor',
		'heading' => __( 'Css', 'js_composer' ),
		'param_name' => 'css',
		// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
		'group' => __( 'Design options', 'js_composer' )
	),
));

/* Single image */
vc_map( array(
	'name' => __( 'Single Image', 'js_composer' ),
	'base' => 'vc_single_image',
	'icon' => 'icon-wpb-single-image',
	'category' => __( 'Content', 'js_composer' ),
	'description' => __( 'Single image with CSS animation', 'js_composer' ),
	'params' => array(
		array(
			"type" => "attach_image",
			"heading" => __("Image", "js_composer"),
			"param_name" => "image",
			"value" => "",
			"description" => __("Select image from media library.", "js_composer")
		),
		array(
			"type" => "dropdown",
			"heading" => __("Image Alignment", "js_composer"),
			"param_name" => "align",
			"value" => array(__('Default', "js_composer") => "", __('Left', "js_composer") => "left", __('Center', "js_composer") => "center", __('Right', "js_composer") => "right"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Image Size", "js_composer"),
			"param_name" => "img_size",
			"value" => array(__("Full Size", "js_composer") => "full", __("Large (set in Media Settings)", "js_composer") => "large", __("Medium (set in Media Settings)", "js_composer") => "medium", __("Thumbnail (set in Media Settings)", "js_composer") => "thumbnail", ),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => 'checkbox',
			"heading" => '',
			"param_name" => "img_link_large",
			"description" => "",
			"value" => Array(__("Open original image in a lightbox on click", "js_composer") => 'yes')
		),
		array(
			"type" => "textfield",
			"heading" => __("Image link", "js_composer"),
			"param_name" => "img_link",
			"description" => __("Enter URL if you want this image to have a link.", "js_composer"),
			"dependency" => Array('element' => "img_link_large", 'is_empty' => true,)
		),
		array(
			'type' => 'checkbox',
			'heading' => '',
			'param_name' => 'img_link_new_tab',
			'value' => array( __( 'Open this link in a new tab', 'js_composer' ) => true ),
			"dependency" => Array('element' => "img_link", 'not_empty' => true),
		),
		$add_css_animation,
		$add_css_animation_delay,
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'js_composer' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'group' => __( 'Design options', 'js_composer' )
		),
	)
) );

/* Image Gallery
---------------------------------------------------------- */
vc_map( array(
	'name' => __( 'Image Gallery', 'js_composer' ),
	'base' => 'vc_gallery',
	'icon' => 'icon-wpb-images-stack',
	'category' => __( 'Content', 'js_composer' ),
	'description' => __( 'Responsive image gallery', 'js_composer' ),
	'params' => array(
		array(
			"type" => "attach_images",
			"heading" => __("Images", "js_composer"),
			"param_name" => "ids",
			"value" => "",
			"description" => __("Select images from media library.", "js_composer")
		),
		array(
			"type" => "dropdown",
			"heading" => __("Columns", "js_composer"),
			"param_name" => "columns",
			"value" => array('1 column' => '1', '2 columns' => '2', '3 columns' => '3', '4 columns' => '4', '5 columns' => '5', '6 columns' => '6', '7 columns' => '7', '8 columns' => '8', '9 columns' => '9', '10 columns' => '10', ),
			"description" => ''
		),
		array(
			"type" => 'checkbox',
			"heading" => __("Masonry Grid", "js_composer"),
			"param_name" => "masonry",
			"description" => "",
			"value" => Array(__("Display thumbs with the initial proportions", "js_composer") => 'yes')
		),
		array(
			"type" => 'checkbox',
			"heading" => __("Indents", "js_composer"),
			"param_name" => "indents",
			"description" => "",
			"value" => Array(__("Add indents between thumbnails", "js_composer") => 'yes')
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),

	)
) );

/* Image Slider
---------------------------------------------------------- */
vc_map( array(
	"name" => __("Image Slider", "js_composer"),
	"base" => "vc_simple_slider",
	"icon" => "icon-wpb-images-stack",
	"category" => __('Content', 'js_composer'),
	"params" => array(

		array(
			"type" => "attach_images",
			"heading" => __("Images", "js_composer"),
			"param_name" => "ids",
			"value" => "",
			"description" => __("Select images from media library.", "js_composer")
		),
		array(
			"type" => "dropdown",
			"heading" => __("Navigation Arrows", "js_composer"),
			"param_name" => "arrows",
			"value" => array(__("Show always", "js_composer") => "always", __("Show on hover", "js_composer") => "hover", __("Hide", "js_composer") => "hide", ),
			"description" => '',
			"edit_field_class" => "vc_col-sm-4 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Additional Navigation", "js_composer"),
			"param_name" => "nav",
			"value" => array(__("None", "js_composer") => "none", __("Dots", "js_composer") => "dots", __("Thumbs", "js_composer") => "thumbs", ),
			"description" => '',
			"edit_field_class" => "vc_col-sm-4 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Transition Effect", "js_composer"),
			"param_name" => "transition",
			"value" => array(__("Slide", "js_composer") => "slide", __("Fade", "js_composer") => "fade", __("Dissolve", "js_composer") => "dissolve", ),
			"description" => '',
			"edit_field_class" => "vc_col-sm-4 vc_column",
		),
		array(
			"type" => 'checkbox',
			"heading" => '',
			"param_name" => "auto_rotation",
			"value" => Array(__("Enable Auto Rotation", "js_composer") => 'yes')
		),
		array(
			"type" => 'checkbox',
			"heading" => '',
			"param_name" => "fullscreen",
			"value" => Array(__("Allow Full Screen view", "js_composer") => 'yes')
		),
		array(
			"type" => 'checkbox',
			"heading" => '',
			"param_name" => "stretch",
			"value" => Array(__("Stretch all images to full size of this slider", "js_composer") => 'yes')
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),

	)
) );

/* Separator (Divider)
---------------------------------------------------------- */
vc_map( array(
	'name' => __( 'Separator', 'js_composer' ),
	'base' => 'vc_separator',
	'icon' => 'icon-wpb-ui-separator',
	'category' => __( 'Content', 'js_composer' ),
	'description' => __( 'Horizontal separator line', 'js_composer' ),
	'params' => array(
		array(
			"type" => "dropdown",
			"heading" => __("Separator Type", "js_composer"),
			"param_name" => "type",
			"value" => array(__('Default', "js_composer") => "", __('Full Width', "js_composer") => "fullwidth", __('Short', "js_composer") => "short", __('Invisible', "js_composer") => "invisible"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Separator Size", "js_composer"),
			"param_name" => "size",
			"value" => array(__('Medium', "js_composer") => "", __('Small', "js_composer") => "small", __('Large', "js_composer") => "big", __('Huge', "js_composer") => "huge"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Icon (optional)", "js_composer"),
			"param_name" => "icon",
			"value" => "",
			"description" => sprintf(__('FontAwesome Icon name. %s', "js_composer"), '<a href="http://fontawesome.io/icons/" target="_blank">Full list of icons</a>'),
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Text (optional)", "js_composer"),
			"param_name" => "text",
			"value" => "",
			"description" => 'Displays text in the middle of this separator',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	)
) );

/* Button
---------------------------------------------------------- */
vc_map( array(
	"name" => __("Button", "js_composer"),
	"base" => "vc_button",
	"icon" => "icon-wpb-ui-button",
	"category" => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Button Label", "js_composer"),
			"holder" => "button",
			"class" => "wpb_button",
			"param_name" => "text",
			"value" => __("Click me", "js_composer"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Button Link", "js_composer"),
			"param_name" => "url",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Button Color", "js_composer"),
			"param_name" => "type",
			"value" => array(__("Primary (theme color)", "js_composer") => "primary", __("Secondary (theme color)", "js_composer") => "secondary", __("Contrast (theme color)", "js_composer") => "contrast", __("Faded (theme color)", "js_composer") => "default", __("White", "js_composer") => "white", __("Pink", "js_composer") => "pink", __("Blue", "js_composer") => "blue", __("Green", "js_composer") => "green", __("Yellow", "js_composer") => "yellow", __("Purple", "js_composer") => "purple", __("Red", "js_composer") => "red", __("Lime", "js_composer") => "lime", __("Navy", "js_composer") => "navy", __("Cream", "js_composer") => "cream", __("Brown", "js_composer") => "brown", __("Midnight", "js_composer") => "midnight", __("Teal", "js_composer") => "teal", __("Transparent", "js_composer") => "transparent"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => 'checkbox',
			"heading" => __("Button Style", "js_composer"),
			"param_name" => "outlined",
			"value" => Array(__("Apply Outlined Style to the Button", "js_composer") => 'yes'),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Button Icon (optional)", "js_composer"),
			"param_name" => "icon",
			"description" => sprintf(__('FontAwesome Icon name. %s', "js_composer"), '<a href="http://fontawesome.io/icons/" target="_blank">Full list of icons</a>')
		),
		array(
			"type" => "dropdown",
			"heading" => __("Button Size", "js_composer"),
			"param_name" => "size",
			"value" => array(__("Medium", "js_composer") => "", __("Small", "js_composer") => "small", __("Large", "js_composer") => "big"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Button Alignment", "js_composer"),
			"param_name" => "align",
			"value" => array(__('Left', "js_composer") => "left", __('Center', "js_composer") => "center", __('Right', "js_composer") => "right"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "checkbox",
			"heading" => '',
			"param_name" => "target",
			"value" => array(__( 'Open button link in a new tab', 'js_composer' ) => 1 ),
			"dependency" => Array('element' => "href", 'not_empty' => true)
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),
	"js_view" => 'VcButtonView'
) );

/* Tabs
---------------------------------------------------------- */
$tab_id_1 = time().'-1-'.rand(0, 100);
$tab_id_2 = time().'-2-'.rand(0, 100);
vc_map( array(
	"name"  => __("Tabs", "js_composer"),
	"base" => "vc_tabs",
	"show_settings_on_create" => false,
	"is_container" => true,
	"icon" => "icon-wpb-ui-tab-content",
	"category" => __('Content', 'js_composer'),
	"params" => array(

		array(
			"type" => 'checkbox',
			"heading" => __("Act as Timeline", "js_composer"),
			"param_name" => "timeline",
			"description" => '',
			"value" => Array(__("Change look and feel into Timeline", "js_composer") => 'yes')
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
		array(
			"type" => 'checkbox',
			"heading" => __("Full Size Content", "js_composer"),
			"param_name" => "no_indents",
			"value" => Array(__("Remove paddings in this tab's content area", "js_composer") => 'yes')
		),

	),
	"custom_markup" => '
  <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
  <ul class="tabs_controls">
  </ul>
  %content%
  </div>'
,
	'default_content' => '
  [vc_tab title="'.__('Tab 1','js_composer').'" tab_id="'.$tab_id_1.'"][/vc_tab]
  [vc_tab title="'.__('Tab 2','js_composer').'" tab_id="'.$tab_id_2.'"][/vc_tab]
  ',
	"js_view" => ($vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35')
) );

vc_map( array(
	"name" => __("Tab", "js_composer"),
	"base" => "vc_tab",
	"allowed_container_element" => 'vc_row',
	"is_container" => true,
	"content_element" => false,
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Tab Title", "js_composer"),
			"param_name" => "title",
			"description" => __("Enter the tab title here (better keep it short)", "js_composer")
		),
		array(
			"type" => "textfield",
			"heading" => __("Tab Icon (optional)", "js_composer"),
			"param_name" => "icon",
			"description" => sprintf(__('FontAwesome Icon name. %s', "js_composer"), '<a href="http://fontawesome.io/icons/" target="_blank">Full list of icons</a>'),


		),
		array(
			"type" => 'checkbox',
			"heading" => __("Active", "js_composer"),
			"param_name" => "active",
			"value" => Array(__("Tab is opened when page load", "js_composer") => 'yes')
		),
		array(
			"type" => 'checkbox',
			"heading" => __("Full Size Content", "js_composer"),
			"param_name" => "no_indents",
			"value" => Array(__("Remove paddings in this tab's content area", "js_composer") => 'yes')
		),
	),
	'js_view' => ($vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35')
) );

/* Accordion block
---------------------------------------------------------- */
vc_map( array(
	"name" => __("Accordion", "js_composer"),
	"base" => "vc_accordion",
	"show_settings_on_create" => false,
	"is_container" => true,
	"icon" => "icon-wpb-ui-accordion",
	"category" => __('Content', 'js_composer'),
	"params" => array(

		array(
			"type" => 'checkbox',
			"heading" => __("Act as Toggles", "js_composer"),
			"param_name" => "toggle",
			"value" => Array(__("Allow several sections be open at the same time", "js_composer") => 'yes')
		),
		array(
			"type" => 'checkbox',
			"heading" => __("Align Titles to the Center", "js_composer"),
			"param_name" => "title_center",
			"value" => Array(__("Align Titles to the Center", "js_composer") => 'yes')
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),

	),
	"custom_markup" => '
  <div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">
  %content%
  </div>
  <div class="tab_controls">
  <button class="add_tab" title="'.__("Add accordion section", "js_composer").'">'.__("Add accordion section", "js_composer").'</button>
  </div>
  ',
	'default_content' => '
  [vc_accordion_tab title="'.__('Section 1', "js_composer").'"][/vc_accordion_tab]
  [vc_accordion_tab title="'.__('Section 2', "js_composer").'"][/vc_accordion_tab]
  ',
	'js_view' => 'VcAccordionView'
) );

vc_map( array(
	"name" => __("Accordion Section", "js_composer"),
	"base" => "vc_accordion_tab",
	"allowed_container_element" => 'vc_row',
	"is_container" => true,
	"content_element" => false,
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Tab Title", "js_composer"),
			"param_name" => "title",
			"description" => __("Enter the tab title here (better keep it short)", "js_composer")
		),
		array(
			"type" => "textfield",
			"heading" => __("Tab Icon (optional)", "js_composer"),
			"param_name" => "icon",
			"description" => sprintf(__('FontAwesome Icon name. %s', "js_composer"), '<a href="http://fontawesome.io/icons/" target="_blank">Full list of icons</a>')

		),
		array(
			"type" => 'checkbox',
			"heading" => __("Active", "js_composer"),
			"param_name" => "active",
			"value" => Array(__("Tab is opened when page load", "js_composer") => 'yes')
		),
		array(
			"type" => 'checkbox',
			"heading" => __("Full Size Content", "js_composer"),
			"param_name" => "no_indents",
			"value" => Array(__("Remove paddings in this section", "js_composer") => 'yes')
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Background Color"),
			"param_name" => "bg_color",
			"value" => '', //Default Red Background
			"description" => ''
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Text Color"),
			"param_name" => "text_color",
			"value" => '', //Default Red color
			"description" => ''
		),
	),
	'js_view' => 'VcAccordionTabView'
) );

/* Iconbox
---------------------------------------------------------- */
vc_map( array(
	"name" => __("IconBox", "js_composer"),
	"base" => "vc_iconbox",
	"icon" => "icon-wpb-ui-separator-label",
	"category" => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Icon", "js_composer"),
			"param_name" => "icon",
			"value" => 'star',
			"description" => sprintf(__('FontAwesome Icon name. %s', "js_composer"), '<a href="http://fontawesome.io/icons/" target="_blank">Full list of icons</a>'),
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
//		array(
//			"type" => "checkbox",
//			"heading" => __("Icon Style", "js_composer"),
//			"param_name" => "with_circle",
//			"value" => array(__("Place Icon into Circle") => 'yes' ),
//			"description" => '',
//			"edit_field_class" => "vc_col-sm-6 vc_column",
//		),
		array(
			"type" => "dropdown",
			"heading" => __("Icon Style", "js_composer"),
			"param_name" => "icon_style",
			"value" => array(__("Simple Icon", "js_composer") => "default", __("Icon in Outlined Circle", "js_composer") => "circle_outlined", __("Icon in Solid Circle", "js_composer") => "circle_solid",),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Icon Color", "js_composer"),
			"param_name" => "color",
			"value" => array(__('Primary (theme color)', "js_composer") => "primary", __('Secondary (theme color)', "js_composer") => "secondary", __('Light (theme color)', "js_composer") => "light", __('Contrast (theme color)', "js_composer") => "contrast", __('Custom colors', "js_composer") => "custom", ),
			"description" => '',
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Icon Color"),
			"param_name" => "icon_color",
			"value" => '', //Default Red color
			"description" => '',
			"dependency" => Array('element' => "color", 'value' => 'custom'),
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Icon Circle Color"),
			"param_name" => "bg_color",
			"value" => '', //Default Red color
			"description" => '',
			"dependency" => Array('element' => "color", 'value' => 'custom'),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Icon Position", "js_composer"),
			"param_name" => "iconpos",
			"value" => array(__('Top', "js_composer") => "top", __('Left', "js_composer") => "left",),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Icon Size", "js_composer"),
			"param_name" => "size",
			"value" => array(__('Medium (default)', "js_composer") => "medium", __('Tiny', "js_composer") => "tiny", __('Small', "js_composer") => "small", __('Large', "js_composer") => "big", __('Huge', "js_composer") => "huge"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Title", "js_composer"),
			"param_name" => "title",
			"holder" => "div",
			"value" => '',
			"description" => ''
		),
		array(
			"type" => "textarea",
			"heading" => __("Iconbox Content", "js_composer"),
			"param_name" => "content",
			"value" => '',
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => __("Link (optional)", "js_composer"),
			"param_name" => "link",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "checkbox",
			"heading" => '',
			"param_name" => "external",
			"value" => array(__( 'Open this link in a new tab', 'js_composer' ) => true ),
			"dependency" => Array('element' => "link", 'not_empty' => true)
		),
		array(
			"type" => "attach_image",
			"heading" => __("Image (optional)", "js_composer"),
			"param_name" => "img",
			"value" => "",
			"description" => __("Path to image, which overrides the font icon", "js_composer")
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),
) );

/* Testimonial
---------------------------------------------------------- */
vc_map( array(
	"name" => __("Testimonial", "js_composer"),
	"base" => "vc_testimonial",
	"icon" => "icon-wpb-ui-separator-label",
	"category" => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "textarea",
			'admin_label' => true,
			"heading" => __("Quote Text", "js_composer"),
			"param_name" => "content",
			"value" => __("Text goes here", "js_composer"),
			"description" => '',
		),
		array(
			"type" => "textfield",
			"heading" => __("Author Name", "js_composer"),
			"param_name" => "author",
			"value" => __("Name", "js_composer"),
			"description" => __("Enter the Name of the Person to quote", "js_composer"),
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Author Subtitle", "js_composer"),
			"param_name" => "company",
			"value" => '',
			"description" => __("Can be used for a job description", "js_composer"),
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "attach_image",
			"heading" => __("Author Photo (optional)", "js_composer"),
			"param_name" => "img",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),
) );

/* Team Member
---------------------------------------------------------- */
vc_map( array(
	"name" => __("Team Member", "js_composer"),
	"base" => "vc_member",
	"icon" => "icon-wpb-ui-separator-label",
	"category" => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Name", "js_composer"),
			"param_name" => "name",
			"value" => __("John Doe", "js_composer"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Role", "js_composer"),
			"param_name" => "role",
			"value" => __("Designer", "js_composer"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "attach_image",
			"heading" => __("Photo", "js_composer"),
			"param_name" => "img",
			"value" => "",
			"description" => '',
		),
		array(
			"type" => "textarea",
			"heading" => __("Description (optional)", "js_composer"),
			"param_name" => "content",
			"value" => '',
			"description" => '',
		),
		array(
			"type" => "textfield",
			"heading" => __("Link (optional)", "js_composer"),
			"param_name" => "link",
			"value" => "",
			"description" => '',
		),
		array(
			'type' => 'checkbox',
			'heading' => '',
			'param_name' => 'external',
			'value' => array( __( 'Open this link in a new tab', 'js_composer' ) => true ),
			"dependency" => Array('element' => "link", 'not_empty' => true),
		),
		array(
			"type" => "textfield",
			"heading" => __("Email", "js_composer"),
			"param_name" => "email",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Facebook", "js_composer"),
			"param_name" => "facebook",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Twitter", "js_composer"),
			"param_name" => "twitter",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Google+", "js_composer"),
			"param_name" => "google_plus",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("LinkedIn", "js_composer"),
			"param_name" => "linkedin",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Skype", "js_composer"),
			"param_name" => "skype",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Custom Icon", "js_composer"),
			"param_name" => "custom_icon",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Custom Icon Link", "js_composer"),
			"param_name" => "custom_link",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),
) );

/* Portfolio Grid
---------------------------------------------------------- */
vc_map( array(
	"name" => __("Portfolio Grid", "js_composer"),
	"base" => "vc_portfolio",
	"icon" => "icon-wpb-ui-separator-label",
	"category" => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Columns", "js_composer"),
			"param_name" => "columns",
			"value" => array('5 columns' => '5', '4 columns' => '4', '3 columns' => '3', '2 columns' => '2',),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Pagination', 'js_composer' ),
			'param_name' => 'pagination',
			'value' => array(
				__( 'No pagination', 'js_composer' ) => '',
				__( 'Regular pagination', 'js_composer' ) => 'regular',
				__( 'Ajax pagination (Load More button)', 'js_composer' ) => 'ajax',
			),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Items Quantity", "js_composer"),
			"param_name" => "items",
			"value" => '',
			"description" => __("If left blank, equals amount of Columns", "js_composer"),
		),
		array(
			"type" => "dropdown",
			"heading" => __("Items Style", "js_composer"),
			"param_name" => "style",
			"value" => array(
				'Type 1' => 'type_1',
				'Type 2' => 'type_2',
				'Type 3' => 'type_3',
				'Type 4' => 'type_4',
				'Type 5' => 'type_5',
				'Type 6' => 'type_6',
				'Type 7' => 'type_7',
				'Type 8' => 'type_8',
				'Type 9' => 'type_9',
				'Type 10' => 'type_10',
				'Type 11' => 'type_11',
				'Type 12' => 'type_12',
				'Type 13' => 'type_13',
				'Type 14' => 'type_14',
				'Type 15' => 'type_15',
			),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Items Text Alignment", "js_composer"),
			"param_name" => "align",
			"value" => array(__('Left', "js_composer") => "left", __('Center', "js_composer") => "center", __('Right', "js_composer") => "right"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Items Ratio", "js_composer"),
			"param_name" => "ratio",
			"value" => array('3:2 (landscape)' => '3:2', '4:3 (landscape)' => '4:3', '1:1 (square)' => '1:1', '2:3 (portrait)' => '2:3', '3:4 (portrait)' => '3:4',),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Items Meta", "js_composer"),
			"param_name" => "meta",
			"value" => array(__('Do not show', "js_composer") => "", __('Show Item date', "js_composer") => "date", __('Show Item category', "js_composer") => "category"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => 'checkbox',
			"heading" => __("Filtering", "js_composer"),
			"param_name" => "filters",
			"description" => "",
			"value" => Array(__("Enable filtering by category", "js_composer") => 'yes'),
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => 'checkbox',
			"heading" => __("Items Indents", "js_composer"),
			"param_name" => "with_indents",
			"description" => "",
			"value" => Array(__("Add indents between Items", "js_composer") => 'yes'),
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => 'checkbox',
			"heading" => __("Random Order", "js_composer"),
			"param_name" => "random_order",
			"description" => "",
			"value" => Array(__("Display items in random order", "js_composer") => 'yes'),
		),
		array(
			"type" => "checkbox",
			"heading" => __("Display Items of selected categories", "js_composer"),
			"param_name" => "category",
			"value" => $portfolio_categories,
			"description" => ''
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),

) );/* Blog
---------------------------------------------------------- */
vc_map( array(
	"name" => __("Blog", "js_composer"),
	"base" => "vc_blog",
	"icon" => "icon-wpb-ui-separator-label",
	"category" => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Layout Type", "js_composer"),
			"param_name" => "type",
			"value" => array('Large Image' => 'large_image', 'Small Square Image' => 'small_square_image', 'Small Rounded Image' => 'small_circle_image', 'Masonry Grid' => 'masonry_paginated',),
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => __("Posts Quantity", "js_composer"),
			"param_name" => "items",
			"value" => '',
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Pagination', 'js_composer' ),
			'param_name' => 'pagination',
			'value' => array(
				__( 'No pagination', 'js_composer' ) => '',
				__( 'Regular pagination', 'js_composer' ) => 'regular',
				__( 'Ajax pagination (Load More button)', 'js_composer' ) => 'ajax',
			),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => 'checkbox',
			"heading" => '',
			"param_name" => "show_date",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"value" => Array(__("Show Post Date", "js_composer") => 'yes')
		),
		array(
			"type" => 'checkbox',
			"heading" => '',
			"param_name" => "show_author",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"value" => Array(__("Show Post Author", "js_composer") => 'yes')
		),
		array(
			"type" => 'checkbox',
			"heading" => '',
			"param_name" => "show_categories",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"value" => Array(__("Show Post Categories", "js_composer") => 'yes')
		),
		array(
			"type" => 'checkbox',
			"heading" => '',
			"param_name" => "show_tags",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"value" => Array(__("Show Post Tags", "js_composer") => 'yes')
		),
		array(
			"type" => 'checkbox',
			"heading" => '',
			"param_name" => "show_comments",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"value" => Array(__("Show Post Comments", "js_composer") => 'yes')
		),
		array(
			"type" => 'checkbox',
			"heading" => '',
			"param_name" => "show_read_more",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"value" => Array(__("Show Read More button", "js_composer") => 'yes')
		),
		array(
			"type" => "dropdown",
			"heading" => __("Posts Content", "js_composer"),
			"param_name" => "post_content",
			"value" => array('Excerpt' => 'excerpt', 'Full Content of Post' => 'full', 'No Content' => 'none',),
			"description" => ''
		),
		array(
			"type" => "checkbox",
			"heading" => __("Display Posts of selected categories", "js_composer"),
			"param_name" => "category",
			"value" => $post_categories,
			"description" => ''
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),

) );

/* Clients
---------------------------------------------------------- */
vc_map( array(
	"name" => __("Client Logos", "js_composer"),
	"base" => "vc_clients",
	"icon" => "icon-wpb-ui-separator-label",
	"category" => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Quantity of displayed logos", "js_composer"),
			"param_name" => "columns",
			"value" => array('6 items' => '6', '5 items' => '5', '4 items' => '4', '3 items' => '3', '2 items' => '2', '1 item' => '1',),
			"std" => '5',
			"description" => ''
		),
		array(
			"type" => 'checkbox',
			"heading" => '',
			"param_name" => "indents",
			"value" => Array(__(" Add indents around logo images", "js_composer") => 'yes')
		),
		array(
			"type" => 'checkbox',
			"heading" => '',
			"param_name" => "arrows",
			"value" => Array(__("Show Navigation Arrows", "js_composer") => 'yes')
		),
		array(
			"type" => 'checkbox',
			"heading" => '',
			"param_name" => "auto_scroll",
			"value" => Array(__("Enable Auto Rotation", "js_composer") => 'yes')
		),
		array(
			"type" => "textfield",
			"heading" => __("Auto Rotation Interval (in seconds)", "js_composer"),
			"param_name" => "interval",
			"value" => 3,
			"description" => '',
			"dependency" => Array('element' => "auto_scroll", 'not_empty' => true),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),

) );

/* ActionBox
---------------------------------------------------------- */
vc_map( array(
	"name" => __("ActionBox", "js_composer"),
	"base" => "vc_actionbox",
	"icon" => "icon-wpb-ui-separator-label",
	"category" => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("ActionBox Color", "js_composer"),
			"param_name" => "type",
			"value" => array(__('Primary Color', "js_composer") => "primary", __('Secondary Color', "js_composer") => "secondary", __('Alternate Color', "js_composer") => "alternate", __('Custom colors', "js_composer") => "custom",),
			"description" => ''
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Background Color"),
			"param_name" => "bg_color",
			"value" => '',
			"description" => '',
			"dependency" => Array('element' => "type", 'value' => 'custom'),
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Text Color"),
			"param_name" => "text_color",
			"value" => '',
			"description" => '',
			"dependency" => Array('element' => "type", 'value' => 'custom'),
		),
		array(
			"type" => "textfield",
			"heading" => __("ActionBox Title", "js_composer"),
			"param_name" => "title",
			"holder" => "div",
			"value" => __("This is ActionBox", "js_composer"),
			"description" => ''
		),
		array(
			"type" => "textarea",
			"heading" => __("ActionBox Text", "js_composer"),
			"param_name" => "message",
			"value" => '',
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => __("Button 1 Label", "js_composer"),
			"param_name" => "button1",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Button 1 Link", "js_composer"),
			"param_name" => "link1",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Button 1 Color", "js_composer"),
			"param_name" => "style1",
			"value" => array(__("Primary (theme color)", "js_composer") => "primary", __("Secondary (theme color)", "js_composer") => "secondary", __("Contrast (theme color)", "js_composer") => "contrast", __("Faded (theme color)", "js_composer") => "default", __("White", "js_composer") => "white", __("Pink", "js_composer") => "pink", __("Blue", "js_composer") => "blue", __("Green", "js_composer") => "green", __("Yellow", "js_composer") => "yellow", __("Purple", "js_composer") => "purple", __("Red", "js_composer") => "red", __("Lime", "js_composer") => "lime", __("Navy", "js_composer") => "navy", __("Cream", "js_composer") => "cream", __("Brown", "js_composer") => "brown", __("Midnight", "js_composer") => "midnight", __("Teal", "js_composer") => "teal", __("Transparent", "js_composer") => "transparent"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => 'checkbox',
			"heading" => __("Button 1 Style", "js_composer"),
			"param_name" => "outlined1",
			"value" => Array(__("Apply Outlined Style to the Button", "js_composer") => 'yes'),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Button 1 Size", "js_composer"),
			"param_name" => "size1",
			"value" => array(__("Medium", "js_composer") => "", __("Small", "js_composer") => "small", __("Large", "js_composer") => "big"),
		),
		array(
			"type" => "textfield",
			"heading" => __("Button 1 Icon (optional)", "js_composer"),
			"param_name" => "icon1",
			"description" => sprintf(__('FontAwesome Icon name. %s', "js_composer"), '<a href="http://fontawesome.io/icons/" target="_blank">Full list of icons</a>')
		),
		array(
			"type" => "dropdown",
			"heading" => __("Button 1 Target", "js_composer"),
			"param_name" => "target1",
			"value" => $target_arr,
		),
		array(
			"type" => "textfield",
			"heading" => __("Button 2 Label", "js_composer"),
			"param_name" => "button2",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Button 2 Link", "js_composer"),
			"param_name" => "link2",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Button 2 Color", "js_composer"),
			"param_name" => "style2",
			"value" => array(__("Primary (theme color)", "js_composer") => "primary", __("Secondary (theme color)", "js_composer") => "secondary", __("Contrast (theme color)", "js_composer") => "contrast", __("Faded (theme color)", "js_composer") => "default", __("White", "js_composer") => "white", __("Pink", "js_composer") => "pink", __("Blue", "js_composer") => "blue", __("Green", "js_composer") => "green", __("Yellow", "js_composer") => "yellow", __("Purple", "js_composer") => "purple", __("Red", "js_composer") => "red", __("Lime", "js_composer") => "lime", __("Navy", "js_composer") => "navy", __("Cream", "js_composer") => "cream", __("Brown", "js_composer") => "brown", __("Midnight", "js_composer") => "midnight", __("Teal", "js_composer") => "teal", __("Transparent", "js_composer") => "transparent"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => 'checkbox',
			"heading" => __("Button 2 Style", "js_composer"),
			"param_name" => "outlined2",
			"value" => Array(__("Apply Outlined Style to the Button", "js_composer") => 'yes'),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Button 2 Size", "js_composer"),
			"param_name" => "size2",
			"value" => array(__("Medium", "js_composer") => "", __("Small", "js_composer") => "small", __("Large", "js_composer") => "big"),
		),
		array(
			"type" => "textfield",
			"heading" => __("Button 2 Icon (optional)", "js_composer"),
			"param_name" => "icon2",
			"description" => sprintf(__('FontAwesome Icon name. %s', "js_composer"), '<a href="http://fontawesome.io/icons/" target="_blank">Full list of icons</a>')
		),
		array(
			"type" => "dropdown",
			"heading" => __("Button 2 Target", "js_composer"),
			"param_name" => "target2",
			"value" => $target_arr,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),
) );

/* Video element
---------------------------------------------------------- */
vc_map( array(
	"name" => __("Video Player", "js_composer"),
	"base" => "vc_video",
	"icon" => "icon-wpb-film-youtube",
	"category" => __('Content', 'js_composer'),
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => __("Video link", "js_composer"),
			"param_name" => "link",
			"admin_label" => true,
			"description" => sprintf(__('Link to the video. More about supported formats at %s.', "js_composer"), '<a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">WordPress codex page</a>')
		),
		array(
			"type" => "dropdown",
			"heading" => __("Ratio", "js_composer"),
			"param_name" => "ratio",
			"value" => array('16x9' => "16-9", '4x3' => "4-3", '3x2' => "3-2", '1x1' => "1-1", ),
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => __("Max Width in pixels", "js_composer"),
			"param_name" => "max_width",
			"admin_label" => true,
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"heading" => __("Video Alignment", "js_composer"),
			"param_name" => "align",
			"value" => array(__('Left', "js_composer") => "left", __('Center', "js_composer") => "center", __('Right', "js_composer") => "right"),
			"description" => '',
			'dependency' => array( 'element' => 'max_width', 'not_empty' => true )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'js_composer' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'group' => __( 'Design options', 'js_composer' )
		),

	)
) );

/* Message box
---------------------------------------------------------- */
vc_map( array(
	"name" => __("Message Box", "js_composer"),
	"base" => "vc_message",
	"icon" => "icon-wpb-information-white",
	"wrapper_class" => "alert",
	"category" => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Message Box Color", "js_composer"),
			"param_name" => "color",
			"value" => array(__('Notification (blue)', "js_composer") => "info", __('Attention (yellow)', "js_composer") => "attention", __('Success (green)', "js_composer") => "success", __('Error (red)', "js_composer") => "error", __('Custom', "js_composer") => "custom"),
			"description" => ''
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Background Color"),
			"param_name" => "bg_color",
			"value" => '', //Default Red Background
			"description" => '',
			"dependency" => Array('element' => "color", 'value' => 'custom'),
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => __("Text Color"),
			"param_name" => "text_color",
			"value" => '', //Default Red color
			"description" => '',
			"dependency" => Array('element' => "color", 'value' => 'custom'),
		),
		array(
			"type" => "textarea",
			"holder" => "div",
			"class" => "content",
			"heading" => __("Message Text", "js_composer"),
			"param_name" => "content",
			"value" => __("I am message box. Click edit button to change this text.", "js_composer")
		),
		array(
			"type" => "textfield",
			"heading" => __("Icon (optional)", "js_composer"),
			"param_name" => "icon",
			"value" => "",
			"description" => sprintf(__('FontAwesome Icon name. %s', "js_composer"), '<a href="http://fontawesome.io/icons/" target="_blank">Full list of icons</a>'),
		),
		array(
			"type" => 'checkbox',
			"heading" => '',
			"param_name" => "closing",
			"value" => Array(__("Enable closing", "js_composer") => 'yes'),
			"description" => '',
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),
	"js_view" => 'VcMessageView'
) );



/* Counter
---------------------------------------------------------- */
vc_map( array(
	"name"		=> __("Counter", "js_composer"),
	"base"		=> "vc_counter",
	'icon'		=> 'icon-wpb-ui-separator',
	"category"  => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("The initial number value", "js_composer"),
			"param_name" => "number",
			"value" => "0",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("The final number value", "js_composer"),
			"param_name" => "count",
			"value" => "99",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Number Color", "js_composer"),
			"param_name" => "color",
			"value" => array(__("Default (theme color)", "js_composer") => "", __("Primary (theme color)", "js_composer") => "primary", __("Secondary (theme color)", "js_composer") => "secondary", __("Custom Color", "js_composer") => "custom",),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Number Size", "js_composer"),
			"param_name" => "size",
			"value" => array(__('Small', "js_composer") => "small", __('Medium', "js_composer") => "medium", __('Large', "js_composer") => "big", ),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"heading" => '',
			"param_name" => "custom_color",
			"description" => '',
			"dependency" => Array('element' => "color", 'value' => 'custom'),
		),
		array(
			"type" => "textfield",
			"heading" => __("Title for Counter", "js_composer"),
			"param_name" => "title",
			"value" => "Projects completed",
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => __("Prefix (optional)", "js_composer"),
			"param_name" => "prefix",
			"value" => "",
			"description" => 'Text before number',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Suffix (optional)", "js_composer"),
			"param_name" => "suffix",
			"value" => "",
			"description" => 'Text after number',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),
) );


/* Contact form
---------------------------------------------------------- */
vc_map( array(
	"name"		=> __("Contact Form", "js_composer"),
	"base"		=> "vc_contact_form",
	'icon'		=> 'icon-wpb-ui-separator',
	"category"  => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Reciever Email", "js_composer"),
			"param_name" => "form_email",
			"value" => "",
			"description" => sprintf(__('Contact requests will be sent to this Email.', "js_composer"))
		),
		array(
			"type" => "dropdown",
			"heading" => __("Name Field State", "js_composer"),
			"param_name" => "form_name_field",
			"value" => array(__('Shown, required', "js_composer") => "required", __('Shown, not required', "js_composer") => "show", __('Hidden', "js_composer") => "not_show"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Email Field State", "js_composer"),
			"param_name" => "form_email_field",
			"value" => array(__('Shown, required', "js_composer") => "required", __('Shown, not required', "js_composer") => "show", __('Hidden', "js_composer") => "not_show"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Phone Field State", "js_composer"),
			"param_name" => "form_phone_field",
			"value" => array(__('Shown, required', "js_composer") => "required", __('Shown, not required', "js_composer") => "show", __('Hidden', "js_composer") => "not_show"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Message Field State", "js_composer"),
			"param_name" => "form_message_field",
			"value" => array(__('Shown, required', "js_composer") => "required", __('Shown, not required', "js_composer") => "show", __('Hidden', "js_composer") => "not_show"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Captcha", "js_composer"),
			"param_name" => "form_captcha",
			"value" => array(__('Don\'t Display Captcha', "js_composer") => "", __('Display Captcha', "js_composer") => "show"),
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"heading" => __("Button Size", "js_composer"),
			"param_name" => "button_size",
			"value" => array(__("Medium", "js_composer") => "", __("Small", "js_composer") => "small", __("Large", "js_composer") => "big"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Button Alignment", "js_composer"),
			"param_name" => "button_align",
			"value" => array(__('Left', "js_composer") => "left", __('Center', "js_composer") => "center", __('Right', "js_composer") => "right"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Button Color", "js_composer"),
			"param_name" => "button_color",
			"value" => array(__("Primary (theme color)", "js_composer") => "primary", __("Secondary (theme color)", "js_composer") => "secondary", __("Contrast (theme color)", "js_composer") => "contrast", __("Faded (theme color)", "js_composer") => "default", __("White", "js_composer") => "white", __("Pink", "js_composer") => "pink", __("Blue", "js_composer") => "blue", __("Green", "js_composer") => "green", __("Yellow", "js_composer") => "yellow", __("Purple", "js_composer") => "purple", __("Red", "js_composer") => "red", __("Lime", "js_composer") => "lime", __("Navy", "js_composer") => "navy", __("Cream", "js_composer") => "cream", __("Brown", "js_composer") => "brown", __("Midnight", "js_composer") => "midnight", __("Teal", "js_composer") => "teal", __("Transparent", "js_composer") => "transparent"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => 'checkbox',
			"heading" => __("Button Style", "js_composer"),
			"param_name" => "button_outlined",
			"value" => Array(__("Apply Outlined Style to the Button", "js_composer") => 'yes'),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),
) );



/* Contacts
---------------------------------------------------------- */
vc_map( array(
	"name"		=> __("Contacts", "js_composer"),
	"base"		=> "vc_contacts",
	'icon'		=> 'icon-wpb-ui-separator',
	"category"  => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Address", "js_composer"),
			"param_name" => "address",
			"value" => "",
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => __("Phone", "js_composer"),
			"param_name" => "phone",
			"value" => "",
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => __("Fax", "js_composer"),
			"param_name" => "fax",
			"value" => "",
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => __("Email", "js_composer"),
			"param_name" => "email",
			"value" => "",
			"description" => ''
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),
) );

/* Social Links
---------------------------------------------------------- */
vc_map( array(
	"name"		=> __("Social Links", "js_composer"),
	"base"		=> "vc_social_links",
	'icon'		=> 'icon-wpb-ui-separator',
	"category"  => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Icons Size", "js_composer"),
			"param_name" => "size",
			"value" => array(__('Small', "js_composer") => "", __('Medium', "js_composer") => "normal", __('Large', "js_composer") => "big"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "dropdown",
			"heading" => __("Icons Alignment", "js_composer"),
			"param_name" => "align",
			"value" => array(__('Left', "js_composer") => "left", __('Center', "js_composer") => "center", __('Right', "js_composer") => "right"),
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Email", "js_composer"),
			"param_name" => "email",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Facebook", "js_composer"),
			"param_name" => "facebook",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Twitter", "js_composer"),
			"param_name" => "twitter",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Google+", "js_composer"),
			"param_name" => "google",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("LinkedIn", "js_composer"),
			"param_name" => "linkedin",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("YouTube", "js_composer"),
			"param_name" => "youtube",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Vimeo", "js_composer"),
			"param_name" => "vimeo",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Flickr", "js_composer"),
			"param_name" => "flickr",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Instagram", "js_composer"),
			"param_name" => "instagram",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Behance", "js_composer"),
			"param_name" => "behance",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Xing", "js_composer"),
			"param_name" => "xing",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Pinterest", "js_composer"),
			"param_name" => "pinterest",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Skype", "js_composer"),
			"param_name" => "skype",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Tumblr", "js_composer"),
			"param_name" => "tumblr",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Dribbble", "js_composer"),
			"param_name" => "dribbble",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Vkontakte", "js_composer"),
			"param_name" => "vk",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("SoundCloud", "js_composer"),
			"param_name" => "soundcloud",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Yelp", "js_composer"),
			"param_name" => "yelp",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Twitch", "js_composer"),
			"param_name" => "twitch",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("DeviantArt", "js_composer"),
			"param_name" => "deviantart",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("Foursquare", "js_composer"),
			"param_name" => "foursquare",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("GitHub", "js_composer"),
			"param_name" => "github",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type" => "textfield",
			"heading" => __("RSS", "js_composer"),
			"param_name" => "rss",
			"value" => "",
			"description" => '',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),
) );

/* Google maps element
---------------------------------------------------------- */
vc_map( array(
	"name" => __("Google Maps", "js_composer"),
	"base" => "vc_gmaps",
	"icon" => "icon-wpb-map-pin",
	"category" => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Address", "js_composer"),
			"holder" => "div",
			"param_name" => "address",
			"value" => "1600 Amphitheatre Parkway, Mountain View, CA 94043, United States",
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => __("Marker text", "js_composer"),
			"param_name" => "marker",
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => __("Map height", "js_composer"),
			"param_name" => "height",
			"value" => "400",
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"heading" => __("Map type", "js_composer"),
			"param_name" => "type",
			"value" => array(__("Roadmap", "js_composer") => "ROADMAP", __("Satellite", "js_composer") => "SATELLITE", __("Map + Terrain", "js_composer") => "HYBRID", __("Terrain", "js_composer") => "TERRAIN"),
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"heading" => __("Map zoom", "js_composer"),
			"param_name" => "zoom",
			"value" => array(
				__("14 (default)", "js_composer") => '',
				' 1' => '1',
				' 2' => '2',
				' 3' => '3',
				' 4' => '4',
				' 5' => '5',
				' 6' => '6',
				' 7' => '7',
				' 8' => '8',
				' 9' => '9',
				' 10' => '10',
				' 11' => '11',
				' 12' => '12',
				' 13' => '13',
				' 15' => '15',
				' 16' => '16',
				' 17' => '17',
				' 18' => '18',
				' 19' => '19',
				' 20' => '20'),
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => __("Map Latitude (optional)", "js_composer"),
			"param_name" => "latitude",
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"description" => __("If Longitude and Latitude are set, they override the Address for Google Map.", "js_composer"),
		),
		array(
			"type" => "textfield",
			"heading" => __("Map Longitude (optional)", "js_composer"),
			"param_name" => "longitude",
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"description" => __("If Longitude and Latitude are set, they override the Address for Google Map.", "js_composer"),
		),
		array(
			"type" => "attach_image",
			"heading" => __("Custom Marker Image", "js_composer"),
			"param_name" => "custom_marker_img",
			"description" => 'Image should NOT be bigger then 80x80 px'
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Custom Marker Size', 'js_composer' ),
			'param_name' => 'custom_marker_size',
			'value' => array(
				__( '20x20', 'js_composer' ) => '20',
				__( '30x30', 'js_composer' ) => '30',
				__( '40x40', 'js_composer' ) => '40',
				__( '50x50', 'js_composer' ) => '50',
				__( '60x60', 'js_composer' ) => '60',
				__( '70x70', 'js_composer' ) => '70',
				__( '80x80', 'js_composer' ) => '80',
			),
			"dependency" => Array('element' => "custom_marker_img", 'not_empty' => true),
			'description' => ''
		),
		array(
			"type" => "checkbox",
			"heading" => __("Additional Markers", "js_composer"),
			"param_name" => "add_markers",
			"value" => array(__("Add more Markers to the map", "js_composer") => "yes"),
			"description" => ''
		),

		array(
			"type" => "textfield",
			"heading" => __("Marker 2 address", "js_composer"),
			"param_name" => "marker_2_address",
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"description" => '',
			"dependency" => Array('element' => "add_markers", 'not_empty' => true),
		),
		array(
			"type" => "textfield",
			"heading" => __("Marker 2 text", "js_composer"),
			"param_name" => "marker_2",
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"description" => '',
			"dependency" => Array('element' => "add_markers", 'not_empty' => true),
		),

		array(
			"type" => "textfield",
			"heading" => __("Marker 3 address", "js_composer"),
			"param_name" => "marker_3_address",
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"description" => '',
			"dependency" => Array('element' => "add_markers", 'not_empty' => true),
		),
		array(
			"type" => "textfield",
			"heading" => __("Marker 3 text", "js_composer"),
			"param_name" => "marker_3",
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"description" => '',
			"dependency" => Array('element' => "add_markers", 'not_empty' => true),
		),

		array(
			"type" => "textfield",
			"heading" => __("Marker 4 address", "js_composer"),
			"param_name" => "marker_4_address",
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"description" => '',
			"dependency" => Array('element' => "add_markers", 'not_empty' => true),
		),
		array(
			"type" => "textfield",
			"heading" => __("Marker 4 text", "js_composer"),
			"param_name" => "marker_4",
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"description" => '',
			"dependency" => Array('element' => "add_markers", 'not_empty' => true),
		),

		array(
			"type" => "textfield",
			"heading" => __("Marker 5 address", "js_composer"),
			"param_name" => "marker_5_address",
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"description" => '',
			"dependency" => Array('element' => "add_markers", 'not_empty' => true),
		),
		array(
			"type" => "textfield",
			"heading" => __("Marker 5 text", "js_composer"),
			"param_name" => "marker_5",
			"edit_field_class" => "vc_col-sm-6 vc_column",
			"description" => '',
			"dependency" => Array('element' => "add_markers", 'not_empty' => true),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	)
) );

/* Latest posts
---------------------------------------------------------- */
vc_map( array(
	"name" => __("Latest Posts", "js_composer"),
	"base" => "vc_latest_posts",
	"icon" => "icon-wpb-ui-separator-label",
	"category" => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => __("Posts Number", "js_composer"),
			"param_name" => "posts",
			"value" => array(2 => 2, 1 =>1, 3 =>3,),
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"heading" => __("Caregory", "js_composer"),
			"param_name" => "category",
			"value" => $post_categories,
			"description" => ''
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),

) );

/* Raw HTML
---------------------------------------------------------- */
vc_map( array(
	'name' => __( 'Raw HTML', 'js_composer' ),
	'base' => 'vc_raw_html',
	'icon' => 'icon-wpb-raw-html',
	'category' => __( 'Structure', 'js_composer' ),
	'wrapper_class' => 'clearfix',
	'description' => __( 'Output raw html code on your page', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textarea_raw_html',
			'holder' => 'div',
			'heading' => __( 'Raw HTML', 'js_composer' ),
			'param_name' => 'content',
			'value' => base64_encode( '<p>I am raw html block.<br/>Click edit button to change this html</p>' ),
			'description' => __( 'Enter your HTML content.', 'js_composer' )
		),
	)
) );

/* Raw JS
---------------------------------------------------------- */
vc_map( array(
	'name' => __( 'Raw JS', 'js_composer' ),
	'base' => 'vc_raw_js',
	'icon' => 'icon-wpb-raw-javascript',
	'category' => __( 'Structure', 'js_composer' ),
	'wrapper_class' => 'clearfix',
	'description' => __( 'Output raw javascript code on your page', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textarea_raw_html',
			'holder' => 'div',
			'heading' => __( 'Raw js', 'js_composer' ),
			'param_name' => 'content',
			'value' => __( base64_encode( '<script type="text/javascript"> alert("Enter your js here!" ); </script>' ), 'js_composer' ),
			'description' => __( 'Enter your JS code.', 'js_composer' )
		),
	)
) );

/* Widgetised sidebar
---------------------------------------------------------- */
vc_map( array(
	'name' => __( 'Widgetised Sidebar', 'js_composer' ),
	'base' => 'vc_widget_sidebar',
	'class' => 'wpb_widget_sidebar_widget',
	'icon' => 'icon-wpb-layout_sidebar',
	'category' => __( 'Structure', 'js_composer' ),
	'description' => __( 'Place widgetised sidebar', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'js_composer' ),
			'param_name' => 'title',
			'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' )
		),
		array(
			'type' => 'widgetised_sidebars',
			'heading' => __( 'Sidebar', 'js_composer' ),
			'param_name' => 'sidebar_id',
			'description' => __( 'Select which widget area output.', 'js_composer' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );

/* Flickr
---------------------------------------------------------- */
vc_map( array(
	'base' => 'vc_flickr',
	'name' => __( 'Flickr Widget', 'js_composer' ),
	'icon' => 'icon-wpb-flickr',
	'category' => __( 'Content', 'js_composer' ),
	'description' => __( 'Image feed from your flickr account', 'js_composer' ),
	"params" => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'js_composer' ),
			'param_name' => 'title',
			'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Flickr ID', 'js_composer' ),
			'param_name' => 'flickr_id',
			'admin_label' => true,
			'description' => sprintf( __( 'To find your flickID visit %s.', 'js_composer' ), '<a href="http://idgettr.com/" target="_blank">idGettr</a>' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Number of photos', 'js_composer' ),
			'param_name' => 'count',
			'value' => array( 9, 8, 7, 6, 5, 4, 3, 2, 1 ),
			'description' => __( 'Number of photos.', 'js_composer' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Type', 'js_composer' ),
			'param_name' => 'type',
			'value' => array(
				__( 'User', 'js_composer' ) => 'user',
				__( 'Group', 'js_composer' ) => 'group'
			),
			'description' => __( 'Photo stream type.', 'js_composer' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Display', 'js_composer' ),
			'param_name' => 'display',
			'value' => array(
				__( 'Latest', 'js_composer' ) => 'latest',
				__( 'Random', 'js_composer' ) => 'random'
			),
			'description' => __( 'Photo order.', 'js_composer' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );

/* Empty Space Element
---------------------------------------------------------- */
vc_map( array(
	'name' => __( 'Empty Space', 'js_composer' ),
	'base' => 'vc_empty_space',
	'icon' => 'icon-wpb-ui-empty_space',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'js_composer' ),
	'description' => __( 'Add spacer with custom height', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Height', 'js_composer' ),
			'param_name' => 'height',
			'value' => '32px',
			'admin_label' => true,
			'description' => __( 'Enter empty space height.', 'js_composer' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
		),
	),
) );

/* Custom Heading element
----------------------------------------------------------- */
vc_map( array(
	'name' => __( 'Custom Heading', 'js_composer' ),
	'base' => 'vc_custom_heading',
	'icon' => 'icon-wpb-ui-custom_heading',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'js_composer' ),
	'description' => __( 'Add custom heading text with google fonts', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textarea',
			'heading' => __( 'Text', 'js_composer' ),
			'param_name' => 'text',
			'admin_label' => true,
			'value'=> __( 'This is custom heading element with Google Fonts', 'js_composer' ),
			'description' => __( 'Enter your content. If you are using non-latin characters be sure to activate them under Settings/Visual Composer/General Settings.', 'js_composer' ),
		),
		array(
			'type' => 'font_container',
			'param_name' => 'font_container',
			'value'=>'',
			'settings'=>array(
				'fields'=>array(
					'tag'=>'h2', // default value h2
					'text_align',
					'font_size',
					'line_height',
					'color',
					//'font_style_italic'
					//'font_style_bold'
					//'font_family'

					'tag_description' => __('Select element tag.','js_composer'),
					'text_align_description' => __('Select text alignment.','js_composer'),
					'font_size_description' => __('Enter font size.','js_composer'),
					'line_height_description' => __('Enter line height.','js_composer'),
					'color_description' => __('Select color for your element.','js_composer'),
					//'font_style_description' => __('Put your description here','js_composer'),
					//'font_family_description' => __('Put your description here','js_composer'),
				),
			),
			// 'description' => __( '', 'js_composer' ),
		),
		array(
			'type' => 'google_fonts',
			'param_name' => 'google_fonts',
			'value' => '',// Not recommended, this will override 'settings'. 'font_family:'.rawurlencode('Exo:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic').'|font_style:'.rawurlencode('900 bold italic:900:italic'),
			'settings' => array(
				//'no_font_style' // Method 1: To disable font style
				//'no_font_style'=>true // Method 2: To disable font style
				'fields'=>array(
					'font_family'=>'Abril Fatface:regular', //'Exo:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',// Default font family and all available styles to fetch
					'font_style'=>'400 regular:400:normal', // Default font style. Name:weight:style, example: "800 bold regular:800:normal"
					'font_family_description' => __('Select font family.','js_composer'),
					'font_style_description' => __('Select font styling.','js_composer')
				)
			),
			// 'description' => __( '', 'js_composer' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'js_composer' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'group' => __( 'Design options', 'js_composer' )
		),
	),
) );

vc_map( array(
	"name" => __("Icon", "js_composer"),
	"base" => "vc_icon",
	"icon" => "icon-wpb-ui-separator-label",
	"category" => __('Content', 'js_composer'),
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Icon", "js_composer"),
			"param_name" => "icon",
			"value" => 'star',
			"description" => sprintf(__('FontAwesome Icon name. %s', "js_composer"), '<a href="http://fontawesome.io/icons/" target="_blank">Full list of icons</a>')
		),
		array(
			"type" => "dropdown",
			"heading" => __("Color Style", "js_composer"),
			"param_name" => "color",
			"value" => array(__("Text Color", "js_composer") => "", __("Primary (theme color)", "js_composer") => "primary", __("Secondary (theme color)", "js_composer") => "secondary", __("Faded (theme color)", "js_composer") => "fade", __("Border (theme color)", "js_composer") => "border"),
			"description" => '',
		),
		array(
			"type" => "dropdown",
			"heading" => __("Size", "js_composer"),
			"param_name" => "size",
			"value" => array(__("Tiny", "js_composer") => "tiny", __("Small", "js_composer") => "small", __("Medium", "js_composer") => "medium", __("Large", "js_composer") => "big", __("Huge", "js_composer") => "huge"),
		),
		array(
			"type" => "checkbox",
			"heading" => __("With Circle", "js_composer"),
			"param_name" => "with_circle",
			"value" => array(__("Place Icon into Circle") => 'yes' ),
		),
		array(
			"type" => "textfield",
			"heading" => __("Link (optional)", "js_composer"),
			"param_name" => "link",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "checkbox",
			"heading" => __("External Link", "js_composer"),
			"param_name" => "external",
			"value" => array(__("Opens in new tab") => 1 ),
			"dependency" => Array('element' => "href", 'not_empty' => true)
		),
	),
) );

function remove_vc_base_css_js() {
	wp_deregister_style( 'js_composer_front' );
	wp_deregister_script( 'wpb_composer_front_js' );
}
add_action( 'wp_enqueue_scripts', 'remove_vc_base_css_js', 15 );

function remove_vc_grid_elements_submenu() {
	remove_submenu_page( VC_PAGE_MAIN_SLUG, 'edit.php?post_type=vc_grid_item' );
}

add_action( 'admin_menu', 'remove_vc_grid_elements_submenu' );

if (is_admin()){
	if ( ! function_exists('is_plugin_active')){
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}
	if (is_plugin_active('impreza_js_composer/impreza_js_composer.php')){
		deactivate_plugins('impreza_js_composer/impreza_js_composer.php');
	}
	if (is_plugin_active('impreza_js_composer_435/impreza_js_composer_435.php')){
		deactivate_plugins('impreza_js_composer_435/impreza_js_composer_435.php');
	}
}
