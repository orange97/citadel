<?php

/*--Basic Config calling---*/
global $renova_pagenow;

//Theme Options
require_once get_template_directory() . "/admin/index.php";
// //Metaboxes
require_once get_template_directory() . "/admin/custom-metabox.php";
// //Custom Post types
require_once get_template_directory() . "/admin/custom-post-types.php";
//Theme Stylesadmin
require_once get_template_directory() . "/admin/theme-styles.php";
//Theme scripts
require_once get_template_directory() . "/admin/theme-scripts.php";

require_once get_template_directory() . "/admin/mobile-menu.php";

// Re-define meta box path and URL
define('RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/admin/meta-box'));
define('RWMB_DIR', trailingslashit( get_stylesheet_directory() . '/admin/meta-box'));
// Include the meta box script
require_once RWMB_DIR . 'meta-box.php';
include_once 'admin/meta-box-init.php';

/*---------------------------------------
---------Reason Initialiszation---------
-----------------------------------------*/
function renova_setup() 
  {
        //Feed links
		add_theme_support( 'automatic-feed-links' );
		//Nav menu
		register_nav_menu( 'primary', __( 'Primary Menu','renovalang') );
		//Sidebar
		$args = array(
		'name'          => __( 'renova_side', 'renovalang' ),
		'id'            => 'renova01',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<section id="%1$s"  class="blog-side-panel %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>' );
		register_sidebar( $args ); 

        //Content width
		if ( ! isset( $content_width ) ) $content_width = 900;
		//Initiate custom post types
        add_action( 'init', 'renova_post_types' );
        add_action( 'init', 'renova_post_gallery' );
        //Load the text domain
		load_theme_textdomain('renovalang', get_template_directory() . '/languages');
		//Post Thumbnails		
		add_theme_support( 'post-thumbnails', array('portfolio_item','gallery_item','post' ) );
        //Post formats
        add_theme_support(
			'post-formats', array(
				'image',
				'audio',
				'link',
				'quote',
				'video'
			)
		);

		set_post_thumbnail_size( 300, 300, true ); // Standard Size Thumbnails
		//Function to crop all thumbnails
		if(false === get_option("thumbnail_crop")) {
		add_option("thumbnail_crop", "1");
		} else {
		update_option("thumbnail_crop", "1");
		}	

  }
   add_action( 'after_setup_theme', 'renova_setup' );


/*---------------------------------------
---------Includes-----------------
-----------------------------------------*/


if (!is_admin() && 'wp-login.php' != $renova_pagenow) 
{ 
    add_action('wp_enqueue_scripts', 'renova_scripts');
    add_action('wp_enqueue_scripts', 'renova_styles' );
}
if(is_admin())
{

    add_action('admin_enqueue_scripts', 'renova_admin_scripts');
}
//Comment scrpt
if (is_singular()): wp_enqueue_script( "comment-reply" ); endif;







/*---------------------------------------
---------Customised Menu-----------------
-----------------------------------------*/
function renova_custom_menu($image = NULL,$onep = 0)
{
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations['primary']);

	
	_wp_menu_item_classes_by_context( $menu_items );

	$return = '<div class="navigation hidden-phone hidden-tablet">
    <ul id="main-nav">';
if($menu != '')
	{
	$menu_items = wp_get_nav_menu_items($menu->term_id);		

	$menunu = array();
	foreach((array)$menu_items as $key => $menu_item )
	{
		$menunu[ (int) $menu_item->db_id ] = $menu_item;
	}
	unset($menu_items);

	$parent_counter = 0;
	foreach ($menunu as $i => $men )
	{
		if($men->menu_item_parent == '0')
		{
			$parent_counter++;
		}
	}
    $logo_level = round($parent_counter / 2) + 1;
    
    $level_finder = 0;
	foreach ($menunu as $i => $men ){
		if($men->menu_item_parent == '0')
		{
			//Pushing logo
			$level_finder++;

			if($level_finder == $logo_level)
			{
             if($onep == 0) {$logo_link = "#body"; } else{ $logo_link= get_site_url();}
			$return .= '<li class="logo-wrap">
                 <a class="scroll-link logo" href="'.$logo_link.'" data-soffset="100">
                   <img alt="'.get_bloginfo('name').'" title="'.get_bloginfo('name').'" src="'.$image.'"/>
                 </a>
                 </li>';
			}

            //Other menu items
			$return .= '<li>';
			    //Specific additions add custom icons
				if( ( 'page' == $men->object ))
				{
					//print_r($men);
					$post_finder = get_post($men->object_id);
					$page_slug = $post_finder->post_name;

					$newlink   = strtolower(preg_replace('/[^a-zA-Z]/s', '', $page_slug)); 
					$href =  '#'.$newlink;				
					$incl_onepage = get_post_meta($men->object_id,'one_page',true);

                  if($incl_onepage == 'yes' OR $incl_onepage == 'Yes')
                    {
						$href =  '#'.$newlink;
						$identifyClass = "is_onepage";
				    }
				    else
				    {
                       $href = $men->url;
                       $identifyClass = "not_onepage";
				    }	
				} 
				else 
				{
					$href =  $men->url;
					$identifyClass = "not_onepage";

				}
				$return .= '<a class="scroll-link '.$identifyClass.'" href="'.$href.'" id="'.$newlink.'-linker" data-soffset="100">'.$men->title.'</a>';
               //child
               if(renova_detect_child($i, false) ){
					$return .= renova_detect_child($i, true);
				}
                
			$return .= '</li>' . "\n";


		}
	}
}
	else
	{
      $return .= '<ul id="main-nav"><li  class="links">';
 	  $return .= '<a id="defaultam-linker" title="Configure Menu" href="'.site_url().'/wp-admin/nav-menus.php">Configure Menu</a>';       
	  $return .= '</li>' . "\n";  
	}

	unset($menunu);	
	$return .= '</ul> </div>' . "\n";
	echo $return;
}

//child menu
function renova_detect_child($parent, $echo = false){
		
    $parent = ($parent != "") ? $parent : '0';

    $locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[ 'primary' ] );
	$menu_items = wp_get_nav_menu_items( $menu->term_id );
	
	_wp_menu_item_classes_by_context( $menu_items );
	
	$menu_next = array();
	foreach( (array) $menu_items as $key => $menu_item ){
		if($menu_item->menu_item_parent == $parent)
			$menu_next[ (int) $menu_item->db_id ] = $menu_item;
	}
	unset ($menu_items);
	
	if( !$echo ){
		if( !empty($menu_next) )
			return true;
		else
			return false;
	} else {
		$child_ul = '<ul>' . "\n";
		$ret = '';
			foreach ( $menu_next as $i => $mnn ){


			    //Specific additions add custom icons
				if( ( 'page' == $mnn->object ))
				{
					$post_finder = get_post($men->object_id);
			        $page_slug = $post_finder->post_name;   
			        
					$newlink   = strtolower(preg_replace('/[^a-zA-Z]/s', '', $page_slug)); 
					$href =  '#'.$newlink;				
					$iconp = get_post_meta($mnn->object_id,'menu_icon',true);
					$incl_onepage = get_post_meta($mnn->object_id,'one_page',true);

                  if($incl_onepage == 'yes' OR $incl_onepage == 'Yes')
                    {
						$href =  '#'.$newlink;
						$identifyClass = "is_onepage";
				    }
				    else
				    {
                       $href = $mnn->url;
                       $identifyClass = "not_onepage";
				    }	

				} 
				else 
				{
					$href =  $mnn->url;
					$identifyClass = "not_onepage";

				}



				$ret .= '<li><a class="scroll-link '.$identifyClass.'" href="'.$href.'" id="'.$newlink.'-linker" data-soffset="100">'.$mnn->title.'</a></li>' . "\n";
			}
			unset ($menu_next);
		$child_ul_close = '</ul>' . "\n";
		
		if( !empty($ret) )
			return $child_ul . $ret . $child_ul_close;
	}    

	}



/*---------------------------------------
---------Format comment Callback-----------
-----------------------------------------*/

function renova_format_comments($comment, $args, $depth) 
{
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('commentlists'); ?>>
		<div id="comment-<?php comment_ID(); ?>" class=" clearfix cmntparent <?php
                        $authID = get_the_author_meta('ID');
                                                    
                        if($authID == $comment->user_id)
                           echo "cmntbyauthor";
                       else
                           echo "";
                        ?>">
			<div class="comment">


            				<div class="comment-author image-polaroid">
            					<?php 
                                $defimg = get_stylesheet_directory_uri(). "/images/avatar.png";
                                if(get_avatar($comment)):
                                	echo get_avatar($comment,$size='75');
                                else:
                                ?>
                                <img src="<?php echo $defimg; ?>"  alt="avatar" />
            					<?php endif; ?>
            				</div>
            				<div class="comment-body">
 										<div class="comment-meta">
											<span class="meta-name"><?php printf(__('%s','livelang'), get_comment_author_link()) ?></span>
											<span class="meta-date"> on <?php comment_time('F jS, Y'); ?></span>
											<div class="reply">
											<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
											<?php edit_comment_link(__('Edit','personalang'),'<span class="edit-comment">', '</span>'); ?>
										    </div>
									    </div>           					
                                <?php if ($comment->comment_approved == '0') : ?>
                   					<div class="alert-box success">
                      					<?php _e('Your comment is awaiting moderation.','personalang') ?>
                      				</div>
            					<?php endif; ?>
                                
                                <?php comment_text() ?>
                                
                                <!-- removing reply link on each comment since we're not nesting them -->
            					
                            </div>		
		</li>

<?php
}


/*---------------------------------------
-------BG color with alpha converter-----
-----------------------------------------*/
function renova_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}


/*---------------------------------------
-------Columns-----
-----------------------------------------*/
// GET FEATURED IMAGE
function ST4_get_featured_image($post_ID){
 $post_thumbnail_id = get_post_thumbnail_id($post_ID);
 if ($post_thumbnail_id){
  $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
  return $post_thumbnail_img[0];
 }
}

// ADD NEW COLUMN
function ST4_columns_head($defaults) {
  $new = array();
  foreach($defaults as $key => $title) {
    if ($key=='title') // Put the Thumbnail column before the Author column
      $new['featured_image'] = 'Gallery Item';
    $new[$key] = $title;
  }
  return $new;


}

// SHOW INFO IN THE NEW COLUMN
function ST4_columns_content($column_name, $post_ID) {
 if ($column_name == 'featured_image') {
  $post_featured_image = ST4_get_featured_image($post_ID);
  if ($post_featured_image){
   echo '<img class="thumbnail" src="' . $post_featured_image . '" style="max-width:100px;" />'; 
  }
 }
}

add_filter('manage_gallery_item_posts_columns', 'ST4_columns_head');
add_filter('manage_gallery_item_posts_custom_column', 'ST4_columns_content', 1, 2);

function ST4_columns_content_with_default_image($column_name, $post_ID) {
 // Create a default.jpg image and save it in the images directory of your active theme.

 if ($column_name == 'featured_image') {
  $post_featured_image = ST4_get_featured_image($post_ID);
  if ($post_featured_image){
   // HAS A FEATURED IMAGE
   echo '<img src="' . $post_featured_image . '"  />';
   } else {
    // NO FEATURED IMAGE, USE THE DEFAULT ONE
    echo '<img src="' . get_template_directory_uri(). '/images/default.jpg" />'; 
   }
  }
}

/*Inpage Styles Init*/

function renova_inpage_styles() 
{
    require_once get_template_directory() . "/inpagestyles.php";

}

/*Inpage Styles Init*/
function renova_addmenu($new_title)
{  
  wp_enqueue_script( "menutrigger", get_stylesheet_directory_uri(). "/javascripts/menutrigger-init.js",array(),false,true);  
  add_action('wp_enqueue_scripts', 'renova_add_menu');
  wp_localize_script('menutrigger', 'pageid', $new_title);
}

add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');
 
function post_link_attributes($output) {
    $code = 'class="btn btn-renova-alt"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}
