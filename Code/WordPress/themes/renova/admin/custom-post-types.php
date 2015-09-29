<?php
function renova_post_types() 
{
	/*---Portfolio custom post ----*/
	register_post_type( 'portfolio_item',
		array(
			'labels' => array(
				'name' => __( 'Portfolio' ,'renovalang'),
				'singular_name' => __( 'Project' ,'renovalang'),
				'add_new' => __( 'Add New Project' ,'renovalang'),
				'add_new_item' => __( 'Add New Project' ,'renovalang'),
				'edit' => __( 'Edit Project','renovalang' ),
				'edit_item' => __( 'Edit Project','renovalang' ),
			),
			'description' => __( 'Portfolio Items.','renovalang' ),
			'public' => true,
			'supports' => array( 'title', 'editor','thumbnail' ),
			'rewrite' => array( 'slug' => 'item', 'with_front' => false ),
			'has_archive' => true,
			'show_in_menu' => true,
			'menu_position' => 7,
			'menu_icon' => get_template_directory_uri() . '/admin/assets/images/custom/glyphicons_155_show_thumbnails.png',
		)
	);
	register_taxonomy( 'portfolio_category', array( 'portfolio_item' ),
	array( 'hierarchical' => true, 'label' => "Categories","singular_label" => "Category" ) );	
}

/*---------------------------------------------
-------------Gallery Post Type---------------
----------------------------------------------*/
function renova_post_gallery() 
{
	/*---Portfolio custom post ----*/
	register_post_type( 'gallery_item',
		array(
			'labels' => array(
				'name' => __( 'Gallery' ,'renovalang'),
				'singular_name' => __( 'Image' ,'renovalang'),
				'add_new' => __( 'Add New Image' ,'renovalang'),
				'add_new_item' => __( 'Add New Image' ,'renovalang'),
				'edit' => __( 'Edit Image','renovalang' ),
				'edit_item' => __( 'Edit Image','renovalang' ),
			),
			'description' => __( 'Images','renovalang' ),
			'public' => true,
			'supports' => array( 'title','thumbnail'),
			'rewrite' => array( 'slug' => 'galimages', 'with_front' => false ),
			'has_archive' => true,
			'show_in_menu' => true,
			'menu_position' => 8,
			'menu_icon' => get_template_directory_uri() . '/admin/assets/images/custom/images.png',
		)
	);
	//register_taxonomy( 'portfolio_category', array( 'portfolio_item' ),
	//array( 'hierarchical' => true, 'label' => "Categories","singular_label" => "Category" ) );	
}




// function renova_team()
// {

// 		/*---Slider custom post ----*/
// 	register_post_type('team',
// 		array(
// 			'labels' => array(
// 				'name' => __( 'Team' ,'renovalang'),
// 				'singular_name' => __( 'Team' ,'renovalang'),
// 				'add_new' => __( 'Add Member' ,'renovalang'),
// 				'add_new_item' => __( 'Add Member' ,'renovalang'),
// 				'edit' => __( 'Edit Member','renovalang' ),
// 				'edit_item' => __( 'Edit Member','renovalang' ),
// 			),
// 			'description' => __( 'Team Members.','renovalang' ),
// 			'public' => true,
// 			'supports' => array( 'title', 'thumbnail'),
// 			'rewrite' => array( 'slug' => 'members', 'with_front' => false ),
// 			'has_archive' => true,
//             'show_in_menu' => true,
//             'menu_position' => 9,
//             'menu_icon' => get_template_directory_uri() . '/admin/assets/images/custom/glyphicons_043_group.png',
// 		)
// 	);
// }

?>