<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = '';

global $meta_boxes;

$meta_boxes = array();


// 2nd meta box
$meta_boxes[] = array(
	'title' => 'Blog Options',
    'pages' => array( 'post'),
	'fields' => array(
		// Youtube Ids
        array(
			// Field name - Will be used as label
			'name'  => 'Youtube Video Ids',
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}renyoutube",
			// Field description (optional)
			'desc'  => 'Add Youtube Video IDS (Ex:WluQQiXKVc8)',
			'type'  => 'text',
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => true,
		),
       array(
			// Field name - Will be used as label
			'name'  => 'Vimeo Video Ids',
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}renvimeos",
			// Field description (optional)
			'desc'  => 'Add Vimeo Video IDS (Ex:24535181)',
			'type'  => 'text',
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => true,
		),

       array(
			'name' => __( 'Image Slider', 'nextlang' ),
			'id'   => "{$prefix}imgslides",
			'type' => 'image_advanced',
			'max_file_uploads' => 10
         		),
    // IMAGE UPLOAD
    array(
      'name' => 'Quote (Only for Quote post format)',
      'id'   => "{$prefix}postquote",
      'type' => 'textarea',
      'cols' => 20,
      'rows' => 5,
    ),
    array(
      'name' => 'Sound Cloud Embed (Only for audio post format)',
      'id'   => "{$prefix}soundcloud",
      'type' => 'textarea',
      'cols' => 20,
      'rows' => 5,
    ),    
    array(
      'name' => 'Link (Only for Link post format)',
      'id'   => "{$prefix}linkpost",
      'type' => 'text',
      'size' => 80
    ),  

	)
);







/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function designova_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'designova_register_meta_boxes' );