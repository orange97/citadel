<?php
global $smof_data;
/*---------------------------------------
---------Customised Menu-----------------
-----------------------------------------*/
function renova_custom_mobile_menu($title = NULL,$image = NULL)
{
	$locations = get_nav_menu_locations();
	
    if(isset( $locations['primary'] )) { $menu = wp_get_nav_menu_object( $locations['primary']); }else { $menu = '';}
	_wp_menu_item_classes_by_context( $menu_items );

$return = '<!-- Mobile Only Navigation - 2 types each for small device screens -->
<!-- Sliding Navigation : starts -->
<nav class="menu visible-phone visible-tablet hidden-desktop" id="sm">
  <div class="sm-wrap">';
  if($image != ''):
      $return .= '<h1 class="sm-logo"><img src="'.$image.'" alt="'.$title.'"/></h1>';
  else:
  	  $return .= '<h1 class="sm-logo">'.$title.'</h1>';	
  endif;

if($menu != '')
	{
	$menu_items = wp_get_nav_menu_items($menu->term_id);		

	$menunu = array();
	foreach((array)$menu_items as $key => $menu_item )
	{
		$menunu[ (int) $menu_item->db_id ] = $menu_item;
	}
	unset($menu_items);

	foreach ($menunu as $i => $men ){
		if($men->menu_item_parent == '0')
		{
			$post_finder = get_post($men->object_id);
			$page_slug = $post_finder->post_name;   

			$newlink   = strtolower(preg_replace('/[^a-zA-Z]/s', '', $page_slug)); 
            //Other menu items

			    //Specific additions add custom icons
				if( ( 'page' == $men->object ))
				{
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

				$return .= '<a class="scroll-link '.$identifyClass.'" href="'.$href.'" id="'.$newlink.'-linker" data-soffset="60">'.$men->title.'</a>';
			    $return .=  "\n";
                
                //Mobile menu
               
			    if(detect_mob_child($i, false) ){
							$return .= detect_mob_child($i, true);
						}

		}
	}
}
	else
	{
 	  $return .= '<a id="defaultam-linker" title="Configure Menu" href="'.site_url().'/wp-admin/nav-menus.php">Configure Menu</a>';       
	}

	unset($menunu);	
	$return .= '</div>
  <!-- Navigation Trigger Button -->
  <div id="sm-trigger"></div>
</nav>
<!-- Sliding Navigation : ends -->' . "\n";

	echo $return;
}


//child mob menu
function detect_mob_child($parent, $echo = false){
		
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
		$child_ul = '' . "\n";
		$ret = '';
			foreach ( $menu_next as $i => $mnn ){


			    //Specific additions add custom icons
				if( ( 'page' == $mnn->object ))
				{
					$post_finder = get_post($mnn->object_id);
			        $page_slug = $post_finder->post_name;  

					$newlink   = strtolower(preg_replace('/[^a-zA-Z]/s', '', $page_slug)); 
					$href =  '#'.$newlink;				
					$incl_onepage = get_post_meta($mnn->object_id,'one_page',true);

                  if($incl_onepage == 1)
                    {
						$href =  '#'.$newlink;
						$identifyClass = "is_mob_onepage";
				    }
				    else
				    {
                       $href = $mnn->url;
                       $identifyClass = "not_mob_onepage";
				    }	

				} 
				else 
				{
					$href =  $mnn->url;
					$identifyClass = "not_mob_onepage";

				}

               if(is_single() OR is_page() OR is_archive()) 
				{
                   $ret.= '<a class="'.$identifyClass.' scroll-link" href="'. $href .'" data-soffset="0"> &nbsp;&nbsp;-'. $mnn->title .'</a>';
				}
			    else
			    {
                  //$return .= '<option class="'.$identifyClass.'" value="'. $href .'" onClick="'.$onchange_live.'">'. $men->title .'</option>';
			      $ret .= '<a class="'.$identifyClass.' scroll-link" href="'. $href .'" data-soffset="0"> &nbsp;&nbsp;-'. $mnn->title .'</a>';
			    }

				//$ret .= '<li><a class="'.$identifyClass .'" href="'.$href.'">'.$mnn->title.'</a></li>' . "\n";
			}
			unset ($menu_next);
		$child_ul_close = '' . "\n";
		
		if(!empty($ret) )
			return  $ret;
	}    

	}
