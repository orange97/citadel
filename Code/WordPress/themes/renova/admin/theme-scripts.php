<?php
function renova_scripts() 
{ 
    //jQuery
    wp_enqueue_script('jquery');
    //Assets
    wp_enqueue_script("bootstrap", get_stylesheet_directory_uri(). "/assets/js/bootstrap.min.js",array(),false,true);
    wp_enqueue_script("bo-transition", get_stylesheet_directory_uri(). "/assets/js/bootstrap-transition.js",array(),false,true);
    wp_enqueue_script("bo-alert", get_stylesheet_directory_uri(). "/assets/js/bootstrap-alert.js",array(),false,true);
    wp_enqueue_script("bo-modal", get_stylesheet_directory_uri(). "/assets/js/bootstrap-modal.js",array(),false,true);
    wp_enqueue_script("bo-dropdown", get_stylesheet_directory_uri(). "/assets/js/bootstrap-dropdown.js",array(),false,true);
    wp_enqueue_script("bo-scrollspy", get_stylesheet_directory_uri(). "/assets/js/bootstrap-scrollspy.js",array(),false,true);
    wp_enqueue_script("bo-tab", get_stylesheet_directory_uri(). "/assets/js/bootstrap-tab.js",array(),false,true);
    wp_enqueue_script("bo-tooltip", get_stylesheet_directory_uri(). "/assets/js/bootstrap-tooltip.js",array(),false,true);
    wp_enqueue_script("bo-popover", get_stylesheet_directory_uri(). "/assets/js/bootstrap-popover.js",array(),false,true);
    wp_enqueue_script("bo-button", get_stylesheet_directory_uri(). "/assets/js/bootstrap-button.js",array(),false,true);
    wp_enqueue_script("bo-collapse", get_stylesheet_directory_uri(). "/assets/js/bootstrap-collapse.js",array(),false,true);
    wp_enqueue_script("bo-carousel", get_stylesheet_directory_uri(). "/assets/js/bootstrap-carousel.js",array(),false,true);
    wp_enqueue_script("bo-typeahead", get_stylesheet_directory_uri(). "/assets/js/bootstrap-typeahead.js",array(),false,true);
    wp_enqueue_script("bo-affix", get_stylesheet_directory_uri(). "/assets/js/bootstrap-affix.js",array(),false,true);
   
    //common
    wp_enqueue_script("wa-images", get_stylesheet_directory_uri(). "/javascripts/jquery.waitforimages.js",array(),false,true);    
    wp_enqueue_script("modernizr", get_stylesheet_directory_uri(). "/javascripts/modernizr.custom.js");    //loads on top
    wp_enqueue_script("waypoint", get_stylesheet_directory_uri(). "/javascripts/waypoints.min.js",array(),false,true);    
    wp_enqueue_script("hoverdir", get_stylesheet_directory_uri(). "/javascripts/jquery.hoverdir.js",array(),false,true);    
    wp_enqueue_script("bs", get_stylesheet_directory_uri(). "/javascripts/jquery.backstretch.min.js",array(),false,true);    
    wp_enqueue_script("colorbox", get_stylesheet_directory_uri(). "/javascripts/jquery.colorbox.js",array(),false,true);    
    wp_enqueue_script("isotope", get_stylesheet_directory_uri(). "/javascripts/jquery.isotope.min.js",array(),false,true);    
    wp_enqueue_script("facybox", get_stylesheet_directory_uri(). "/javascripts/jquery.fancybox-1.3.4.js",array(),false,true);    
    wp_enqueue_script("tweet", get_stylesheet_directory_uri(). "/javascripts/jquery.tweet.js",array(),false,true);    
    wp_enqueue_script("flexslider", get_stylesheet_directory_uri(). "/javascripts/jquery.flexslider.js",array(),false,true);    
    wp_enqueue_script("formvalid", get_stylesheet_directory_uri(). "/javascripts/form-validation.js",array(),false,true);    
    wp_enqueue_script("slidemenu", get_stylesheet_directory_uri(). "/javascripts/slidingmenu.js",array(),false,true);        
    wp_enqueue_script("scroll", get_stylesheet_directory_uri(). "/javascripts/scroll.js",array(),false,true);    
    wp_enqueue_script("script", get_stylesheet_directory_uri(). "/javascripts/script.js",array(),false,true); 
    wp_enqueue_script("nicescroll", get_stylesheet_directory_uri(). "/javascripts/jquery.nicescroll.min.js",array(),false,true); 


}

function renova_admin_scripts()
{    
   wp_enqueue_script("uploader", get_stylesheet_directory_uri(). "/admin/assets/js/designova/uploader.js");  
   wp_enqueue_script('wp-color-picker');
   wp_enqueue_script('amwpcolor', get_stylesheet_directory_uri(). "/admin/assets/js/designova/wpcolor.js");
   wp_enqueue_style("metastyles", get_stylesheet_directory_uri(). "/admin/assets/css/metastyles.css"); 
   wp_enqueue_style('wp-color-picker');
}
