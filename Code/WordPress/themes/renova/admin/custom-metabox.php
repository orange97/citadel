<?php
/*--Add a meta box for pages--*/
function renova_define_page_metabox($post) 
{ 
  global $post,$renova_meta;


  $meta_one_page         = get_post_meta($post->ID,'one_page',true);
  $meta_bg_position      = get_post_meta($post->ID,'bg_position',true);
  $meta_heading_style    = get_post_meta($post->ID,'heading_style',true);
  $meta_split_content    = get_post_meta($post->ID,'split_content',true);
  $meta_parallax_bg      = get_post_meta($post->ID,'parallax_bg',true);
  $meta_icon_img         = get_post_meta($post->ID,'icon_image',true);
  $meta_section_icon     = get_post_meta($post->ID,'section_icon',true);
  $meta_subheading       = get_post_meta($post->ID,'sub_heading',true);
  $meta_bg_color         = get_post_meta($post->ID,'bg_color',true);
  $meta_sb_position      = get_post_meta($post->ID,'sb_position',true);
  $meta_split_bg         = get_post_meta($post->ID,'split_bg',true);
  
  // Use nonce for verification
  wp_nonce_field(plugin_basename( __FILE__ ), 'renova_page_noncename' );


if($meta_one_page =='yes')
  {
    $yes = 'checked="checked"';
    $no  = '';
  }
  elseif($meta_one_page =='no')
  {
    $no = 'checked="checked"';
    $yes = '';
  }
  else
  {
    $yes = 'checked="checked"';
    $no = '';
  }


//Switch case for heading style

if($meta_heading_style =='dark')
  {
      $dark = 'checked="checked"';
      $light = '';
  }
  elseif($meta_heading_style =='light')
  {
      $dark = '';
      $light = 'checked="checked"';
  }
  else
  {
      $dark = 'checked="checked"';
      $light = '';
  }



//Switch case for heading style
if($meta_sb_position =='left')
  {
      $left  = 'checked="checked"';
      $right = '';
  }
  elseif($meta_sb_position =='right')
  {
     $right  = 'checked="checked"';
      $left = '';
  }
  else
  {
      $left  = 'checked="checked"';
      $right = '';
  }




  
//Include in One page
  $html = "<div class='title_boost' style=\"border-bottom: solid 1px #DFDFDF;\">";
  $html .= "<div class='labelclass'>Include to Onepage</div>";
  $html .= '<input type="radio" id="renova_hht" name="include_onepage" value="yes" '.$yes.' /> Yes &nbsp;&nbsp;';
  $html .= '<input type="radio" id="renova_hht" name="include_onepage" value="no"  '.$no.'/> No';  
  $html .= '<small>';
  $html .= "<br/>If checked 'No' page will be excluded from one page";
  $html .= '</small>'; 
  $html .= '</div>';

//Subheading
  $html .= "<div class='title_boost' style=\"border-top: solid 1px #fff;border-bottom: solid 1px #DFDFDF;\">";
  $html .= "<div class='labelclass'>Page Sub-Heading</div>";
  $html .= '<div class="title_boost">';
  $html .= '<input type="text"  id="sub_heading" name="sub_heading" value="'.$meta_subheading.'" size="80"/>'; 
  $html .= '<small>';
  $html .= "<br/>Page sub heading which appears below the main heading (in One-Page)";
  $html .= '</small>';
  $html .= "</div>";
  $html .= '</div>';  

//Heading Dark light
  $html .= "<div class='title_boost' style=\"border-top: solid 1px #fff;border-bottom: solid 1px #DFDFDF;\">"; 
  $html .= "<div class='labelclass'>Sub Heading Style</div>";
  $html .= '<input type="radio" id="renova_hhs" name="heading-style" value="dark" '.$dark.' /> Dark &nbsp;&nbsp;';
  $html .= '<input type="radio" id="renova_hhs" name="heading-style" value="light"  '.$light.'/> Light';  
  $html .= '<small>';
  $html .= "<br/>White and Black varients";
  $html .= '</small>'; 
  $html .= '</div>';

//icon
  $html .= "<div class='title_boost' style=\"border-top: solid 1px #fff;border-bottom: solid 1px #DFDFDF;\">";
  $html .= "<div class='labelclass'>Section Icon</div>";
  $html .= "<input readonly='readonly' value='$meta_section_icon' name='renova_section_icon'  class='kp_input_box' type='hidden'>";
  $html .= "<input title='Upload' onclick='register_upload_button_event(jQuery(this));' class='kp_button_upload' value='Add' type='button'>";
  $html .= "<input title='Remove' onclick='register_remove_button_event(jQuery(this));' class='kp_button_remove' value='Remove' type='button'>";
  $html .= "<img class='image_preview' src='$meta_section_icon' title='Image URL' alt=''>";
  $html .= '<small>';
  $html .= "<br/>Icon which appears along with the heading highlight section (97px X 97px PNG file only) ";
  $html .= '</small>';  
  $html .= '</div>';

//section Background
  $html .= "<div class='title_boost' style=\"border-top: solid 1px #fff;border-bottom: solid 1px #DFDFDF;\">";
  $html .= "<div class='labelclass'>Section Background</div>";
  $html .= "<input readonly='readonly' value='$meta_parallax_bg' name='renova_parallax_image'  class='kp_input_box' type='hidden'>";
  $html .= "<input title='Upload' onclick='register_upload_button_event(jQuery(this));' class='kp_button_upload' value='Add' type='button'>";
  $html .= "<input title='Remove' onclick='register_remove_button_event(jQuery(this));' class='kp_button_remove' value='Remove' type='button'>";
  $html .= "<img class='image_preview' src='$meta_parallax_bg' title='Image URL' alt=''>";
  $html .= '<small>';
  $html .= "<br/>Section background which appears on the far right or far left side of the sections";
  $html .= '</small>';  
  $html .= '</div>'; 

//section Background Position
  $html .= "<div class='title_boost' style=\"border-top: solid 1px #fff;border-bottom: solid 1px #DFDFDF;\">"; 
  $html .= "<div class='labelclass'>Section Background Position</div>";
  $html .= '<input type="radio" id="sb_position" name="sb_position" value="left" '.$left.' /> Left &nbsp;&nbsp;';
  $html .= '<input type="radio" id="sb_position" name="sb_position" value="right"  '.$right.'/> Right';  
  $html .= '<small>';
  $html .= "<br/>Far left or far right";
  $html .= '</small>'; 
  $html .= '</div>';

//icon
  $html .= "<div class='title_boost' style=\"border-top: solid 1px #fff;border-bottom: solid 1px #DFDFDF;\">";
  $html .= "<div class='labelclass'>Section Directive Image</div>";
  $html .= "<input readonly='readonly' value='$meta_icon_img' name='renova_icon_image'  class='kp_input_box' type='hidden'>";
  $html .= "<input title='Upload' onclick='register_upload_button_event(jQuery(this));' class='kp_button_upload' value='Add' type='button'>";
  $html .= "<input title='Remove' onclick='register_remove_button_event(jQuery(this));' class='kp_button_remove' value='Remove' type='button'>";
  $html .= "<img class='image_preview' src='$meta_icon_img' title='Image URL' alt=''>";
  $html .= '<small>';
  $html .= "<br/>Which appears in the center top area of section with same background color. This is to create a continuity effect between the sections  . 115px X 47px PNG image only";
  $html .= '</small>';  
  $html .= '</div>'; 

//BG color
  $html .= "<div class='title_boost' style=\"border-top: solid 1px #fff;border-bottom: solid 1px #DFDFDF;\">";
  $html .= "<div class='labelclass'>Section Background Color</div>";
  $html .= '<input type="text" id="pagebg_color" name="bg-color" value="'.$meta_bg_color.'" />';
  $html .= '<small>';
  $html .= "<br/>Section background color ";
  $html .= '</small>';
  $html .= '</div>'; 

//Heading Hightligh
  $html .= "<div class='title_boost' style=\"border-top: solid 1px #fff;\">";
  $html .= "<div class='labelclass'>Bottom or Top Split Area Content</div>";
  $html .= '<textarea  id="split_content" name="split_content" style="width:98%" rows="12" >'.$meta_split_content.'</textarea>'; 
  $html .= '<small>';
  $html .= "<br/>Content to appear on the bottom/top split areas depending up on the page template you choose. This metabox supports shortcodes";
  $html .= '</small>';
  $html .= '</div>';

//BG color
  $html .= "<div class='title_boost' style=\"border-top: solid 1px #fff;border-bottom: solid 1px #DFDFDF;\">";
  $html .= "<div class='labelclass'>Split Area Background Color</div>";
  $html .= '<input type="text" id="split_bg" name="split_bg" value="'.$meta_split_bg.'" />';
  $html .= '<small>';
  $html .= "<br/>Applicable for wide section enabled templates only";
  $html .= '</small>';
  $html .= '</div>'; 



  echo $html;


}
//Invoke the box
function renova_create_page_metabox() 
{
  if ( function_exists('add_meta_box') ) 
  {
    add_meta_box( 'page', 'Page Options', 'renova_define_page_metabox', 'page', 'normal', 'high' );
  }
}
/*-for saving the meta--*/
function renova_save_metaboxdata($post_id)
{
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
  if(isset($_POST['renova_page_noncename'])):  
    if (!wp_verify_nonce( $_POST['renova_page_noncename'], plugin_basename( __FILE__ ) ) )
      return;
  endif;  
  // Check permissions
  if(isset($_POST['post_type'])): 
  if ( 'page' == $_POST['post_type'] ) {
      if ( !current_user_can( 'edit_page', $post_id ) )
      return;
    } else {
      if ( !current_user_can( 'edit_post', $post_id ) )
      return;
    }
  endif; 
 if(isset($_POST['renova_page_noncename'])):  

   //sanitization
    //$hh_html_strip  = wp_kses($_POST['heading_highlight'], array('span' => array(), 'strong' => array(),'div' => array('class' => array()),'article' => array(),'p' => array('class' => array(),'data' => array()),'h2' => array('class' => array(),'style' => array()),'h4' => array('class' => array())  ) );
    //$hh_balance_tag = balanceTags($hh_html_strip,true);


    $onepage        = $_POST['include_onepage'];
    $sub_heading    = $_POST['sub_heading'];
    $sb_position    = $_POST['sb_position'];
    $split_content  = $_POST['split_content'];
    $hstyle         = $_POST['heading-style'];
    $bg_image       = $_POST['renova_parallax_image'];
    $icon_image     = $_POST['renova_icon_image'];
    $section_icon   = $_POST['renova_section_icon'];
    $bg_color       = $_POST['bg-color'];
    $split_bgc      = $_POST['split_bg'];
    


    update_post_meta($post_id,'one_page',$onepage);
    update_post_meta($post_id,'heading_style',$hstyle);
    update_post_meta($post_id,'sub_heading',$sub_heading);
    update_post_meta($post_id,'sb_position',$sb_position);
    update_post_meta($post_id,'parallax_bg',$bg_image);
    update_post_meta($post_id,'icon_image',$icon_image);
    update_post_meta($post_id,'section_icon',$section_icon);
    update_post_meta($post_id,'bg_color',$bg_color);
    update_post_meta($post_id,'split_content',$split_content);
    update_post_meta($post_id,'split_bg',$split_bgc);
    

  

  endif;
  
}

//Initialize
add_action('admin_menu', 'renova_create_page_metabox'); /*--Plug the metabox*/
add_action( 'save_post', 'renova_save_metaboxdata' ); /*--save metabox content*/



/*---------------------------------------------
-------------Portfolio Metaboxes---------------
----------------------------------------------*/
function renova_define_portfolio_metabox($post) 
{ 
  global $post,$renova_meta;

  //Existing Meta value
  $meta_expansion_image   = get_post_meta( $post->ID,'expansion_image',true);
  $meta_f_image_style     = get_post_meta( $post->ID,'f_image_style',true);
  //$meta_video_url       = get_post_meta( $post->ID,'video_url',true);

if($meta_f_image_style =='height-02')
  {
    $yes = 'checked="checked"';
    $no  = '';
  }
  elseif($meta_f_image_style =='height-01')
  {
    $no = 'checked="checked"';
    $yes = '';
  }
  else
  {
    $yes = 'checked="checked"';
    $no = '';
  }

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'renova_portfolio_noncename' );

  
//Expansion Image
  $html = "<div class='title_boost'>";
  $html .= "<div class='labelclass'>Zoom image</div>";
  $html .= "<input readonly='readonly' value='$meta_expansion_image' name='renova_expansion_image'  class='kp_input_box' type='hidden'>";
  $html .= "<input title='Upload' onclick='register_upload_button_event(jQuery(this));' class='kp_button_upload' value='Add' type='button'>";
  $html .= "<input title='Remove' onclick='register_remove_button_event(jQuery(this));' class='kp_button_remove' value='Remove' type='button'>";
  $html .= "<img class='image_preview' src='$meta_expansion_image' title='Image URL' alt=''>";
  $html .= '<small>';
  $html .= "Image to appear while clicking the zoom link, if left blank featured image will appear as default";
  $html .= '</small>'; 
  $html .= "</div>";
//Heading Dark light
  $html .= "<div class='title_boost' style=\"border-top: solid 1px #DFDFDF;\">";
  $html .= '<div class="title_boost">';  
  $html .= "<div class='labelclass'>Featured Image Style</div>";
  $html .= '<input type="radio" id="f_image_style" name="f_image_style" value="height-02" '.$yes.' /> Rectangular &nbsp;&nbsp;';
  $html .= '<input type="radio" id="f_image_style" name="f_image_style" value="height-01"  '.$no.'/> Square';  
  $html .= '<small>';
  $html .= "(For masonary style portfolio)";
  $html .= '</small>'; 
  $html .= '</div>';
  $html .= '</div>';


  echo $html;

}
//nvoke the box
function renova_create_portfolio_metabox() 
{
  if ( function_exists('add_meta_box') ) 
  {
    add_meta_box( 'expansion_images', 'Portfolio Additions', 'renova_define_portfolio_metabox', 'portfolio_item', 'normal', 'high' );
  }
}
//for saving the meta
function renova_save_portfolio_metabox($post_id)
{
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
  if(isset( $_POST['renova_portfolio_noncename'])) 
  {
      if (!wp_verify_nonce( $_POST['renova_portfolio_noncename'], plugin_basename( __FILE__ ) ) )
        return;
  }
  // Check permissions
  if(isset($_POST['post_type']) AND isset($_POST['renova_expansion_image']))
  if(isset($_POST['post_type']))
   {

      if ( 'portfolio_item' == $_POST['post_type'] ) 
      {
        if ( !current_user_can( 'edit_page', $post_id ) ) return;
      }
      else
      {
        if ( !current_user_can( 'edit_post', $post_id ) ) return;
      }

      $up_expansion_img = $_POST['renova_expansion_image'];
      $f_image_style   = $_POST['f_image_style'];
      //$up_video_url     = $_POST['renova_video_url'];

      update_post_meta($post_id, 'expansion_image', $up_expansion_img);
      update_post_meta($post_id, 'f_image_style', $f_image_style); 
      //update_post_meta($post_id, 'video_url', $up_video_url);  
   }

}
//Initialize
add_action('admin_menu', 'renova_create_portfolio_metabox'); 
add_action( 'save_post', 'renova_save_portfolio_metabox' );


/*---------------------------------------------
-------------Gallery Metaboxes---------------
----------------------------------------------*/
function renova_define_gallery_metabox($post) 
{ 
  global $post,$renova_meta;

  //Existing Meta value
  $meta_expansion_image   = get_post_meta( $post->ID,'gallery_expansion_image',true);
  $meta_zoom_video        = get_post_meta( $post->ID,'gallery_zoom_video',true);
  $meta_opt_url           = get_post_meta( $post->ID,'gallery_opt_url',true);

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'renova_gallery_noncename' );

  
//Expansion Image
  $html = "<div class='title_boost' style=\"border-top: solid 0px #fff;border-bottom: solid 1px #FFF;\">";
  $html .= "<div class='labelclass'>Optional Zoom image</div>";
  $html .= "<input readonly='readonly' value='$meta_expansion_image' name='renova_gallery_expansion_image'  class='kp_input_box' type='hidden'>";
  $html .= "<input title='Upload' onclick='register_upload_button_event(jQuery(this));' class='kp_button_upload' value='Add' type='button'>";
  $html .= "<input title='Remove' onclick='register_remove_button_event(jQuery(this));' class='kp_button_remove' value='Remove' type='button'>";
  $html .= "<img class='image_preview' src='$meta_expansion_image' title='Image URL' alt=''>";
  $html .= '<small>';
  $html .= "Image to appear while clicking the zoom link, if left blank featured image will appear as default";
  $html .= '</small>'; 
  $html .= "</div>";

//BG color
  $html .= "<div class='title_boost' style=\"border-top: solid 1px #DFDFDF;border-bottom: solid 0px #DFDFDF;\">";
  $html .= "<div class='labelclass'>Optional Video URL</div>";
  $html .= '<input type="text" id="zoom_video" style="width:100%;" name="zoom_video" value="'.$meta_zoom_video .'" />';
  $html .= '<small>';
  $html .= "<br/>Youtube Video URL <br/>(Sample Youtube:http://www.youtube.com/watch?v=qqXi8WmQ_WM) <br/>NB: Video will be preffered over zoom image. Youtube video only";
  $html .= '</small>';
  $html .= '</div>'; 

  $html .= "<div class='title_boost' style=\"border-top: solid 1px #DFDFDF;border-bottom: solid 0px #DFDFDF;\">";
  $html .= "<div class='labelclass'>Optional URL</div>";
  $html .= '<input type="text" id="opt_url" style="width:100%;" name="opt_url" value="'.$meta_opt_url .'" />';
  $html .= '<small>';
  $html .= "<br/>Absolute url to pages, website etc. ";
  $html .= '</small>';
  $html .= '</div>'; 

  echo $html;

}
//nvoke the box
function renova_create_gallery_metabox() 
{
  if ( function_exists('add_meta_box') ) 
  {
    add_meta_box( 'expansion_images', 'Gallery Image Options', 'renova_define_gallery_metabox', 'gallery_item', 'normal', 'high' );
  }
}
//for saving the meta
function renova_save_gallery_metabox($post_id)
{
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
  if(isset( $_POST['renova_gallery_noncename'])) 
  {
      if (!wp_verify_nonce( $_POST['renova_gallery_noncename'], plugin_basename( __FILE__ ) ) )
        return;
  }
  // Check permissions
  if(isset($_POST['renova_gallery_noncename']))
  // if(isset($_POST['post_type']))
   {

      if ( 'gallery_item' == $_POST['post_type'] ) 
      {
        if ( !current_user_can( 'edit_page', $post_id ) ) return;
      }
      else
      {
        if ( !current_user_can( 'edit_post', $post_id ) ) return;
      }

      $up_expansion_img = $_POST['renova_gallery_expansion_image'];
      $up_video_url     = $_POST['zoom_video'];
      $up_opt_url       = $_POST['opt_url'];

      update_post_meta($post_id, 'gallery_expansion_image', $up_expansion_img);
      update_post_meta($post_id, 'gallery_zoom_video', $up_video_url);
      update_post_meta($post_id, 'gallery_opt_url', $up_opt_url);    
   }

}
//Initialize
add_action('admin_menu', 'renova_create_gallery_metabox'); 
add_action( 'save_post', 'renova_save_gallery_metabox' );



/*---------------------------------------------
-------------Post Metaboxes---------------
----------------------------------------------*/
// function renova_define_post_metabox($post) 
// { 
//   global $post,$renova_meta;

//   //Existing Meta value
//   $meta_soundcloud   = get_post_meta( $post->ID,'soundcloud',true);
//   $meta_quote             = get_post_meta( $post->ID,'postquote',true);

//   // Use nonce for verification
//   wp_nonce_field( plugin_basename( __FILE__ ), 'renova_post_noncename' );

  
// //Expansion Image

//   $html = "<div class='title_boost' style=\"border-bottom: solid 1px #DFDFDF;\">";
//   $html .= "<div class='labelclass'>Sound Cloud Embbed Code</div>";
//   $html .= '<textarea  id="sound_cloud" name="sound_cloud" style="width:98%" rows="3" >'.$meta_soundcloud.'</textarea>'; 
//   $html .= '<small>';
//   $html .= "<br/>Sound Cloud Embbed Code";
//   $html .= '</small>';
//   $html .= '</div>';

//   $html .= "<div class='title_boost' style=\"border-top: solid 1px #fff;\">";
//   $html .= "<div class='labelclass'>Quote</div>";
//   $html .= '<textarea  id="post_quote" name="post_quote" style="width:98%" rows="3" >'.$meta_quote.'</textarea>'; 
//   $html .= '<small>';
//   $html .= "<br/>Quote , Only for Quote post type";
//   $html .= '</small>';
//   $html .= '</div>';  

//   echo $html;

// }
// //nvoke the box
// function renova_create_post_metabox() 
// {
//   if ( function_exists('add_meta_box') ) 
//   {
//     add_meta_box( 'post_additions', 'Audio and Quote', 'renova_define_post_metabox', 'post', 'normal', 'high' );
//   }
// }
// //for saving the meta
// function renova_save_post_metabox($post_id)
// {
//   if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
//       return;
//   if(isset( $_POST['renova_post_noncename'])) 
//   {
//       if (!wp_verify_nonce( $_POST['renova_post_noncename'], plugin_basename( __FILE__ ) ) )
//         return;
//   }
//   // Check permissions
//    if(isset($_POST['post_type']) AND isset($_POST['sound_cloud'])) 
//   if(isset($_POST['post_type']))
//    {

//       if ( 'post' == $_POST['post_type'] ) 
//       {
//         if ( !current_user_can( 'edit_page', $post_id ) ) return;
//       }
//       else
//       {
//         if ( !current_user_can( 'edit_post', $post_id ) ) return;
//       }

//       $soundcloud = $_POST['sound_cloud'];
//       $quote     = $_POST['post_quote'];

//       update_post_meta($post_id, 'soundcloud', $soundcloud);
//       update_post_meta($post_id, 'postquote', $quote);  
//    }

// }
// //Initialize
// add_action('admin_menu', 'renova_create_post_metabox'); 
// add_action( 'save_post', 'renova_save_post_metabox' );



?>