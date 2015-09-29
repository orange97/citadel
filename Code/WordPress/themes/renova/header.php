<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head class="no-skrollr">
  <?php   global $smof_data; ?>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php echo bloginfo('name').wp_title(); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <meta name="description" content="<?php echo get_bloginfo('description'); ?>"/>
  <meta name="keywords" content="<?php bloginfo('categories'); ?>"/>

  <!-- Le fav and touch icons -->
  <?php if($smof_data['favicon'] != '') { ?>
  <link rel="shortcut icon" href="<?php echo $smof_data['favicon']; ?>">
  <?php } else {?>
  <link rel="shortcut icon" href="<?php get_stylesheet_directory_uri(); ?>images/favicon.ico">
  <?php } ?>
   
  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
<?php wp_head();  ?>

</head>
<body id="body" <?php body_class(); ?>>
 <?php 
if(isset($smof_data['opt_preloader']) AND $smof_data['opt_preloader'] == 1)
{
?>
 <div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<?php } ?>
  <div class="main-wrapper" class="sliding">

<?php 
      get_header();
      if(isset($smof_data['mobilelogo']) AND $smof_data['mobilelogo'] !=''):
        renova_custom_mobile_menu($title = get_bloginfo('name'), $image = $smof_data['mobilelogo']);
      else:  
        renova_custom_mobile_menu($title = get_bloginfo('name'));
      endif;
?>
<section id="mastwrap" class="sliding">
<?php 
    //Stand alone page logo fix  
    if(is_single() OR is_page() OR is_archive()) 
    { 
          $renova_logo = $smof_data['mainlogo'];
          renova_custom_menu($renova_logo,1); 
    }
    else
    {
          $renova_logo = $smof_data['mainlogo'];
          renova_custom_menu($renova_logo,0); 


?>
<div id="badge" class=" hidden-phone hidden-tablet">
<img alt="<?php echo get_bloginfo('name');?>" title="<?php echo get_bloginfo('name');?>" src="<?php echo $smof_data['mainlogo'];?>"/>
</div>  


<!-- Solstice Clock -->

<div align="center" id="solstice-clock" style="padding:10px; position: absolute; top: 15px; left: 15px;">

<div align="left"><p style = "color:#cccccc; text-shadow: 1px 1px #000000;">Winter Solstice Countdown: December 22, 2015 11:49 pm</p>

<?php

    echo do_shortcode('[ujicountdown id="Timer" expire="2015/12/22 11:49:00"]');

?>

</div></div>


<?php } ?>