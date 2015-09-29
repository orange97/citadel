<?php
function renova_styles() 
{
  wp_enqueue_style("bootstrap", get_stylesheet_directory_uri(). "/assets/css/bootstrap.css");
  wp_enqueue_style("bootstrap-responsive", get_stylesheet_directory_uri(). "/assets/css/bootstrap-responsive.css");
  wp_enqueue_style("extension", get_stylesheet_directory_uri(). "/assets/css/extension.css");
  wp_enqueue_style("typography", get_stylesheet_directory_uri(). "/assets/css/typography.css");
  wp_enqueue_style("fontawesome", get_stylesheet_directory_uri(). "/assets/css/font-awesome.min.css"); 
  //non asset styles
  wp_enqueue_style("prettyphoto", get_stylesheet_directory_uri(). "/stylesheets/portfolio.css");
  wp_enqueue_style("jfa", get_stylesheet_directory_uri(). "/stylesheets/jquery.fancybox-1.3.4.css");
  wp_enqueue_style("isotope", get_stylesheet_directory_uri(). "/stylesheets/isotope.css");
  wp_enqueue_style("colorbox", get_stylesheet_directory_uri(). "/stylesheets/colorbox.css");
  wp_enqueue_style("flexslider", get_stylesheet_directory_uri(). "/stylesheets/flexslider.css");
  wp_enqueue_style("hoverdir", get_stylesheet_directory_uri(). "/stylesheets/hoverdir.css");
  wp_enqueue_style("price-table", get_stylesheet_directory_uri(). "/stylesheets/price-table.css");
  wp_enqueue_style("intro", get_stylesheet_directory_uri(). "/stylesheets/intro.css");
  wp_enqueue_style("timeline", get_stylesheet_directory_uri(). "/stylesheets/timeline.css");
  wp_enqueue_style("slidingmenu", get_stylesheet_directory_uri(). "/stylesheets/slidingmenu.css");
  wp_enqueue_style("jtweet", get_stylesheet_directory_uri(). "/stylesheets/jquery.tweet.css");
  wp_enqueue_style("style",get_stylesheet_directory_uri()."/style.css");
  wp_enqueue_style("blog", get_stylesheet_directory_uri(). "/stylesheets/blog.css");


}
?>