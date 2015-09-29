<?php 
get_header();
global $smof_data;
$dz_count = 0; 
//$countPages = wp_count_posts('page')->publish;
$pages = get_pages( 'sort_order=asc&sort_column=menu_order&depth=1');
//Pages to sections published pages
foreach($pages as $pag)
{

setup_postdata($pag);
//Anchor point and title
$newanchorpoint = strtolower(preg_replace('/[^a-zA-Z]/s', '', $pag->post_name)); 

$new_title      = $newanchorpoint;
$templ_name     = get_post_meta( $pag->ID, '_wp_page_template', true );
$filename       = preg_replace('"\.php$"', '', $templ_name); 

//Check wether to include in one page
$ren_include_to_onepage =  get_post_meta($pag->ID,'one_page',true);
//Menu Trigger waypoint


if($ren_include_to_onepage == 'yes') { $dz_count++; }
if($ren_include_to_onepage == 'yes' AND $dz_count == '2') 
{ 
  renova_addmenu($new_title);
}

//Background
$ren_parallax          =  get_post_meta($pag->ID,'parallax_bg',true); 
$ren_bg_color          =  get_post_meta($pag->ID,'bg_color',true); 
$ren_sb_position       =  get_post_meta($pag->ID,'sb_position',true); 
$ren_heading_highlight =  get_post_meta($pag->ID,'heading_highlight',true); 
$ren_heading_style     =  get_post_meta($pag->ID,'heading_style',true); 
//Animation
$ren_split_content     =  get_post_meta($pag->ID,'split_content',true);
$ren_section_icon      =  get_post_meta($pag->ID,'section_icon',true);
$ren_directive_icon    =  get_post_meta($pag->ID,'icon_image',true);
$ren_section_bg        =  get_post_meta($pag->ID,'parallax_bg',true);
$ren_sub_heading       =  get_post_meta($pag->ID,'sub_heading',true);
$ren_split_bg          =  get_post_meta($pag->ID,'split_bg',true);

//Split-BG type 1
if($smof_data['transparency_level'] ==1)
{
  $tpl = 'rgba('.renova_hex2rgb($ren_split_bg).',0.7)';
}
else
{
  $tpl = $ren_split_bg;
}


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

$ren_page_heading      =  $pag->post_title;
/*-------------------------------------
 Splash Page
--------------------------------------*/

if($filename == 'home-splash' && $ren_include_to_onepage == 'yes' )
   {

?>

  <section class="intro  master-section" id="<?php echo $new_title; ?>">
        <?php the_content();?>
        <a class="scroll-link" href="#<?php echo $smof_data['ssd_link']; ?>" data-soffset="100"><div id="scroll"></div></a>
  </section>    

<?php

   }
/*-------------------------------------
 Wide Section - 100% Wide page  
--------------------------------------*/
elseif($filename == 'wide-section' AND $ren_include_to_onepage == 'yes')
{

?>
<section id="<?php echo $new_title; ?>"  class="clearfix master-section wide-section-showcase"> 
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
   <?php the_content();?>
</section>    
<?php
}
/*-------------------------------------
 Top Wide Section - Wide section 
--------------------------------------*/
elseif($filename == 'top-wide-split' AND $ren_include_to_onepage == 'yes')
{

?>
<section id="<?php echo $new_title; ?>" class="master-section" style="background:url(<?php echo $ren_directive_icon; ?>) <?php echo $ren_bg_color; ?> center top no-repeat !important;">
  <section class="container-fluid mob-bg-remove <?php echo $new_title.'-bgclass'; ?>">
    <div class="row-fluid">
        <section class="container">
            <div class="row add-top-main">
                <article class="span12">
                  <?php if($ren_section_icon !=''): ?><div class="thumb-icon"><img alt="<?php echo $new_title; ?>" title="<?php echo $new_title; ?>" src="<?php echo $ren_section_icon;?>"/></div><?php endif; ?>
                  <h1 class="main-heading"><span><?php echo $ren_page_heading; ?></span></h1>
                  <?php if($ren_sub_heading !='') {?><h3 class="promo-text<?php echo $hstyle;?>"><span><?php echo $ren_sub_heading; ?></span></h3><?php } ?>
                  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
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

<section  style="background:<?php echo $ren_bg_color; ?>">
  <section class="container-fluid inner mob-bg-remove">
    <div class="row-fluid">
        <section class="container">
          <?php the_content();?>
        </section>    
    </div>   
  </section>
</section>


<?php
}

/*-------------------------------------
 Bottom Wide Section - Wide section 
--------------------------------------*/


//Left split page
elseif($filename == 'bottom-wide-split' AND $ren_include_to_onepage == 'yes')
{
?>
<section id="<?php echo $new_title; ?>" class="master-section" style="background:url(<?php echo $ren_directive_icon; ?>) <?php echo $ren_bg_color; ?> center top no-repeat !important;">
 <section class="container-fluid  mob-bg-remove <?php echo $new_title.'-bgclass'; ?>">
    <div class="row-fluid">
        <section class="container">
            <div class="row add-top-main">
                <article class="span12">
                  <?php if($ren_section_icon !=''): ?><div class="thumb-icon"><img alt="<?php echo $new_title; ?>" title="<?php echo $new_title; ?>" src="<?php echo $ren_section_icon;?>"/></div><?php endif; ?>
                  <h1 class="main-heading"><span><?php echo $ren_page_heading; ?></span></h1>
                  <?php if($ren_sub_heading !='') {?><h3 class="promo-text<?php echo $hstyle;?>"><span><?php echo $ren_sub_heading; ?></span></h3><?php } ?>
                  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
                </article>
            </div>
        </section>      
    </div> 
    </section>     
</section>

<section  style="background:<?php echo $ren_bg_color; ?>">
  <section class="container-fluid inner mob-bg-remove">
    <div class="row-fluid">
        <section class="container">
          <?php the_content();?>
        </section>    
    </div>   
  </section>
</section>

<!--Wide Section -->
<section style="background:<?php echo  $tpl; ?>">
    <section class="container-fluid inner mob-bg-remove tweet-wrap">
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

<?php
}
elseif($filename == 'blog-page' AND $ren_include_to_onepage == 'yes')
{
?>

<section id="<?php echo $new_title; ?>" class="master-section" style="background:url(<?php echo $ren_directive_icon; ?>) <?php echo $ren_bg_color; ?> center top no-repeat !important;">
<section class="container-fluid  mob-bg-remove <?php echo $new_title.'-bgclass'; ?>">
    <div class="row-fluid">
        <section class="container">
            <div class="row add-top-main">
                <article class="span12">
                  <?php if($ren_section_icon !=''): ?><div class="thumb-icon"><img alt="<?php echo $new_title; ?>" title="<?php echo $new_title; ?>" src="<?php echo $ren_section_icon;?>"/></div><?php endif; ?>
                  <h1 class="main-heading"><span><?php echo $ren_page_heading; ?></span></h1>
<?php if($ren_sub_heading !='') {?><h3 class="promo-text<?php echo $hstyle;?>"><span><?php echo $ren_sub_heading; ?></span></h3><?php } ?>
                  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
                </article>
            </div>

      <div id="ajax-container"><!--Ajax-->
        <div id="ajax-inner">  <!--Ajax-->

            <div class="row add-bottom-services">


<?php
  $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 2,'post__not_in' => get_option("sticky_posts"), 'paged' => $paged ));
?> 
<?php while ($loop->have_posts()) : $loop->the_post(); ?>


                <article class="span6 news-block">
                    <div class="row-fluid">
                        <article class="span12 news-img">
                            <div class="news-date">
                                <h2><?php the_time('j') ?></h2>
                                <h5><?php the_time('M') ?></h5>
                                <h4><?php the_time('Y') ?></h4>
                            </div>
                            <?php if(has_post_thumbnail()): the_post_thumbnail( 'full', array( 'class' => "", ) ); endif; ?>
                        </article>
                    </div>
                    <div>
                        <div class="row-fluid">
                        <article class="span12 news-specs">
                            <nav>
                                 <a href="#">       
                                     <img alt="renova" title="renova" src="<?php echo get_stylesheet_directory_uri();?>/images/news/icons/01.png"/>
                                      <?php 
                                              $post_categories = get_the_category();
                                              $c    = array_shift($post_categories);
                                              $cats = $c->cat_name;
                                              if (count($post_categories) > 0 ) 
                                              {
                                                foreach( $post_categories as $c ) 
                                                {
                                                  $cats .=  ', ' . $c->cat_name;
                                                }
                                              }
                                              printf($cats);
                                           ?></span>
                                </a>
                                <a href="#">
                                    <img alt="renova" title="renova" src="<?php echo get_stylesheet_directory_uri();?>/images/news/icons/02.png"/>
                                    <span class="news-specs-info"><?php the_author(); ?></span>
                                </a>
                                <a href="#">
                                    <img alt="renova" title="renova" src="<?php echo get_stylesheet_directory_uri();?>/images/news/icons/03.png"/>
                                    <span class="news-specs-info"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
                                </a>
                            </nav>
                        </article>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <article class="span12 news-block-content">
                            <h3 class="news-heading"><span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h3>
                            <p><?php the_excerpt();?></p>
                             <a href="<?php the_permalink(); ?>" class="btn btn-renova-alt"><?php _e( 'Read More','amazelang' ); ?></a>
                        </article>
                    </div>
                    
                </article>

    <?php endwhile; ?>

</div>

<div class="row add-bottom-main">
    <section class="span6 offset5">
      <div class="paginate">
           <?php previous_posts_link( 'Newer Posts&rarr;' );  ?>
           <?php next_posts_link( '&larr; Older Posts', $loop->max_num_pages ); ?>
      </div>
    </section>  
</div>

      </div><!--Ajax-->
</div><!--Ajax-->

        </section>      
    </div> 
    </section>     
</section>
<?php
}
//Other type page starts here
elseif($ren_include_to_onepage == 'yes' )
   {
?>

<section id="<?php echo $new_title; ?>" class="master-section" style="background:url(<?php echo $ren_directive_icon; ?>) <?php echo $ren_bg_color; ?> center top no-repeat !important;">
<section class="container-fluid  mob-bg-remove <?php echo $new_title.'-bgclass'; ?>">
    <div class="row-fluid">
        <section class="container">
            <div class="row add-top-main">
                <article class="span12">
                  <?php if($ren_section_icon !=''): ?><div class="thumb-icon"><img alt="<?php echo $new_title; ?>" title="<?php echo $new_title; ?>" src="<?php echo $ren_section_icon;?>"/></div><?php endif; ?>
                  <h1 class="main-heading"><span><?php echo $ren_page_heading; ?></span></h1>
<?php if($ren_sub_heading !='') {?><h3 class="promo-text<?php echo $hstyle;?>"><span><?php echo $ren_sub_heading; ?></span></h3><?php } ?>
                  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
                </article>
            </div>
        </section>      
    </div> 
    </section>     
</section>

<section  style="background:<?php echo $ren_bg_color; ?>">
  <section class="container-fluid inner mob-bg-remove">
    <div class="row-fluid">
        <section class="container">
          <?php the_content();?>
        </section>    
    </div>   
  </section>
</section>


<?php } ?>
<?php 

} //endforeach
get_footer(); 