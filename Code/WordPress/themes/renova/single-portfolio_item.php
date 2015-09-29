<?php 
get_header(); 
while(have_posts()) : the_post();


$templ_name     = get_post_meta( $post->ID, '_wp_page_template', true );
$filename       = preg_replace('"\.php$"', '', $templ_name); 
//Heading Highlight
$heading_highlight =  get_post_meta( $post->ID,'heading_highlight',true); 
$bg_color          =  get_post_meta( $post->ID,'bg_color',true); 
$page_heading      =  $post->post_title;

//Background
$parallax          =  get_post_meta( $post->ID,'parallax_bg',true); 
$sb_position       =  get_post_meta( $post->ID,'sb_position',true); 
$heading_highlight =  get_post_meta( $post->ID,'heading_highlight',true); 
$heading_style     =  get_post_meta( $post->ID,'heading_style',true); 
//Animation
$split_content     = get_post_meta($post->ID,'split_content',true);
$section_icon      = get_post_meta($post->ID,'section_icon',true);
$directive_icon    = get_post_meta($post->ID,'icon_image',true);
$section_bg        = get_post_meta($post->ID,'parallax_bg',true);
$sub_heading       = get_post_meta($post->ID,'sub_heading',true);
$split_bg          = get_post_meta($post->ID,'split_bg',true);


$newanchorpoint = strtolower(preg_replace('/\s+/', '-', $post->post_name)); 
$new_title      = $newanchorpoint;

//Fail safe bg color
if($bg_color == ''){$bg_color = '#ffffff';}

if($heading_style == 'dark')
{
    $hstyle = '';
}
elseif($heading_style == '')
{
    $hstyle = '';
}
else $hstyle = "-alt darken";
?>
<section id="<?php echo $new_title; ?>" class="single_post_bg">
  <section class="container-fluid  mob-bg-remove" >
    <div class="row-fluid">
        <section class="container">
            <div class="row add-top-main">
                <article class="span12">
                  <h1 class="main-heading"><span><?php echo $page_heading; ?></span></h1>
                </article>
            </div>
        </section>      
    </div> 
    </section>     
</section>

<section  class="single-page-normal">
  <section class="container-fluid inner mob-bg-remove">
    <div class="row-fluid">
        <section class="container">
          <?php the_content();?>
        </section>  
        <section class="container">
          <div class="row">
            <article class="span1 offset5">
              <?php 
previous_post_link('%link', '&laquo;');
next_post_link('%link', '&raquo;');
               ?>
            </article>
          </div>    
        </section>            
    </div>   
  </section>
</section>


<?php 
endwhile;
get_footer(); ?>