<?php
/**
 * Template Name: Top Wide Split Section
 *
 * @author Designova (designova.net)
 * @theme Reason
 */

get_header(); 
while(have_posts()) : the_post();


$templ_name     = get_post_meta( $post->ID, '_wp_page_template', true );
$filename       = preg_replace('"\.php$"', '', $templ_name); 
//Heading Highlight
$heading_highlight =  get_post_meta( $post->ID,'heading_highlight',true); 
$ren_bg_color      =  get_post_meta( $post->ID,'bg_color',true); 
$page_heading      =  $post->post_title;

//Background
$ren_parallax          =  get_post_meta($post->ID,'parallax_bg',true); 
$ren_bg_color          =  get_post_meta($post->ID,'bg_color',true); 
$ren_sb_position       =  get_post_meta($post->ID,'sb_position',true); 
$ren_heading_highlight =  get_post_meta($post->ID,'heading_highlight',true); 
$ren_heading_style     =  get_post_meta($post->ID,'heading_style',true); 
//Animation
$ren_split_content     =  get_post_meta($post->ID,'split_content',true);
$ren_section_icon      =  get_post_meta($post->ID,'section_icon',true);
$ren_directive_icon    =  get_post_meta($post->ID,'icon_image',true);
$ren_section_bg        =  get_post_meta($post->ID,'parallax_bg',true);
$ren_sub_heading       =  get_post_meta($post->ID,'sub_heading',true);
$ren_split_bg          =  get_post_meta($post->ID,'split_bg',true);


$newanchorpoint = strtolower(preg_replace('/[^a-zA-Z]/s', '', $post->post_name)); 
$new_title      = $newanchorpoint;

//Fail safe bg color
if($ren_bg_color == ''){$ren_bg_color = '#ffffff';}

if($ren_heading_style == 'dark')
{
    $hstyle = '';
}
elseif($ren_heading_style == '')
{
    $hstyle = '';
}
else $hstyle = "-alt darken";

//Split-BG type 1
if($smof_data['transparency_level'] ==1)
{
  $tpl = 'rgba('.renova_hex2rgb($ren_split_bg).',0.7)';
}
else
{
  $tpl = $ren_split_bg;
}


?>
<section id="<?php echo $new_title; ?>" class="master-section" style="background:url(<?php echo $ren_directive_icon; ?>) <?php echo $ren_bg_color; ?> center top no-repeat !important; margin-top:100px;">
 <section class="container-fluid  mob-bg-remove <?php echo $new_title.'-bgclass'; ?>">
    <div class="row-fluid">
        <section class="container">
            <div class="row add-top-main">
                <article class="span12">
                  <?php if($ren_section_icon !=''): ?><div class="thumb-icon"><img alt="<?php echo $new_title; ?>" title="<?php echo $new_title; ?>" src="<?php echo $ren_section_icon;?>"/></div><?php endif; ?>
                  <h1 class="main-heading"><span><?php echo $page_heading; ?></span></h1>
                  <?php if($ren_sub_heading !='') {?><h3 class="promo-text<?php echo $hstyle;?>"><span><?php echo $ren_sub_heading; ?></span></h3><?php } ?>
                </article>
            </div>
        </section>      
    </div> 
    </section>     
</section>
<!--Wide Section -->
<section style="background:<?php echo  $tpl; ?>">
    <section class="container-fluid inner mob-bg-remove">
    <div class="row-fluid">
        <section class="container">
            <div class="row">
                <article class="span12">
                  <?php echo do_shortcode($ren_split_content);?>
                </article>
            </div>
        </section>
    </div>
    </section>    
</section>
<!--Wide Section ends-->
<section class="pagebottom pagetop" style="background:<?php echo $ren_bg_color; ?>">
  <section class="container-fluid inner mob-bg-remove">
    <div class="row-fluid">
        <section class="container">
          <?php the_content();?>
        </section>    
    </div>   
  </section>
</section>



<?php 
endwhile;
get_footer();