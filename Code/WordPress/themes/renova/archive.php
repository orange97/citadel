<?php
 get_header(); 
?>
    <div id="promo1" class="single_post_bg">
        <div  id="post-<?php the_ID(); ?>" class="page-single">

            <div class="container-fluid pad-bottom-main full-bg">
              <div class="row-fluid">
               <div class="container">            
<div class="row add-top add-bottom">
                <article class="span9 blog-block">
 <?php
  $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 10, 'paged' => $paged ));
?>           
 <?php while ($loop->have_posts()) : $loop->the_post(); 
//Slider Addition Meta

            $renova_format = get_post_format();
            $renova_postquote    = rwmb_meta('postquote', 'type=text' );
            $renova_soundcloud   = rwmb_meta('soundcloud', 'type=text' );
            $renova_linkpost     = rwmb_meta('linkpost', 'type=text' );

            switch($renova_format)
            {
              case 'audio':
               $pimg = get_stylesheet_directory_uri().'/images/postformat/audio.png';
              break;
              case 'video':
               $pimg = get_stylesheet_directory_uri().'/images/postformat/video.png';
              break;  
              case 'image':
               $pimg = get_stylesheet_directory_uri().'/images/postformat/image.png';
              break;  
              case 'link':
               $pimg = get_stylesheet_directory_uri().'/images/postformat/link.png';
              break;   
              case 'quote':
               $pimg = get_stylesheet_directory_uri().'/images/postformat/quote.png';
              break; 
              default:
               $pimg = get_stylesheet_directory_uri().'/images/postformat/regular.png';
              break;                                                      
            }

            $renova_sliderimages = rwmb_meta('imgslides', 'type=image' );
            $renova_youtubeids   = rwmb_meta('renyoutubes', 'type=text' );
            $renova_vimeoids     = rwmb_meta('renvimeos', 'type=text' );
 ?>
                <section class="add-bottom">
                  <h2 class="blog-caps"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h2>
                  <div class="postformat">&nbsp;&nbsp;<?php if(is_sticky()): ?><?php _e('STICKY','proximlang'); ?><?php endif; ?>&nbsp;<img src="<?php echo $pimg; ?>" alt="post" title="Format"/></div>
                  <div class="blog-stats">
                    By <span class="stat_hl"><?php the_author(); ?></span> on <span class="stat_hl">
                    <?php the_date('F jS') ?></span> In <span class="stat_hl"><?php 
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

                  </div>                  

<?php 
if($renova_format == 'video' OR $renova_format == 'image')
{
?>
<div class="blog-thumb-single">
<?php

if(!empty($renova_sliderimages) OR !empty($renova_youtubeids) OR !empty($renova_vimeoids))
{
?>
<div  class="flexslider">
    <!-- Carousel items -->
  <ul class="slides">
<?php 
$renova_n = 0;
if($renova_sliderimages): 
foreach ($renova_sliderimages as $renova_item )
{
$renova_n++;
 echo '<li>';
 echo '<img alt="slide" title="'. $renova_n .'"  src="'. $renova_item['full_url'] .'" />
     </li>';
 
}
endif;

if($renova_vimeoids): 
foreach($renova_vimeoids as $renova_itemvideo){
 
  $renova_vimeourl = $renova_itemvideo;
  echo '<li><div class="js-video [vimeo, widescreen]">
      <iframe id="player_1" class="vimeoiframe" src="http://player.vimeo.com/video/'. $renova_vimeourl .'?api=1&player_id=player_1"  frameborder="0" width="100%" height="400" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
     </div></li>';
 
 
}endif;


if($renova_youtubeids):
foreach($renova_youtubeids as $renova_itemyoutube){
 
 $renova_youtubeurl = $renova_itemyoutube;
  echo '<li><div id="youtube_video"  class="js-video [vimeo, widescreen]">
      <iframe id="player_1"   src="http://www.youtube.com/embed/'.$renova_youtubeurl.'?enablejsapi=1" frameborder="0" width="100%" height="400" wmode="Opaque" allowfullscreen></iframe>
     
     </div></li>';

}endif;





?>
 </ul>
</div>
<?php
}
?>
</div>
<?php
}//Ends Image , Video Types
elseif($renova_format == 'quote')
{
?>
<div class="shoutout"><?php echo $renova_postquote; ?></div>
<?php
}
elseif($renova_format == 'link'){
?>
<div class="blog-thumb-single">
<?php echo '<a href="'.$renova_linkpost.'" title="Link">'.$renova_linkpost.'</a>'; ?>
</div>
<?php

}
elseif($renova_format == 'audio')
{
?>
<div class="blog-thumb-single">
<?php echo $renova_soundcloud; ?>
</div>
<?php
}
else{
?>
<div class="blog-thumb-single">
  <?php if(has_post_thumbnail()): the_post_thumbnail( 'full', array( 'class' => "", ) ); endif; ?>
</div>
<?php } ?>






                  <div class="blog-para"><?php the_excerpt();?></div>
                   <a href="<?php the_permalink(); ?>" class="btn btn-renova-alt isolatepage_readmore"><?php _e( 'Read Full Story','renovalang' ); ?></a>
                </section>
    <?php endwhile; ?>



    <section class="blog-pages">
           <?php next_posts_link( '&larr; Older Posts', $loop->max_num_pages ); ?>      
           <?php previous_posts_link( 'Newer Posts&rarr;' );  ?>
    </section>  


        </article>
        <article class="span3 blog-side-panel side-panel">
             <?php get_sidebar('renova_side'); ?>
        </article> 
 </div><!-- row : ends -->



               </div> 
              </div>
            </div>  

        </div> 
    </div>   
<?php 
get_footer(); ?>