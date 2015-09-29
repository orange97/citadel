<?php   global $smof_data; ?>

    <!-- page:starts-->
    <section class="footer container-fluid section">
        <div class="row-fluid">
            <section class="container">
                <div class="row">
                    <article class="contactus span12 text-center">
                  <?php if($smof_data['footerlogo'] == '' && $smof_data['footer_title'] != '')
                    {
                       echo '<h2>'.esc_html($smof_data['footer_title']).'</h2>';
                    }
                    elseif( $smof_data['footerlogo'] != '' && $smof_data['footer_title'] != '')
                    {
                        echo '<img src="'.$smof_data['footerlogo'].'" alt="logo" title="'.get_bloginfo('name').'"/>';
                    }
                    ?>


                        <h1><?php  if(isset($smof_data['footer_addressline'])): echo $smof_data['footer_addressline']; endif;?> </h1>
                    </article>
                 </div>



                 <div class="row foot-soc">
                    <article class="span12 text-center">
                        <nav class="social-links">
                          <?php  if(isset($smof_data['dribbble'])  AND $smof_data['dribbble'] !='') { ?><a class="dribbble" href="http://dribbble.com/<?php echo sanitize_text_field($smof_data['dribbble']); ?>"><img title="socialmedia" alt="socialmedia" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social/cool/dribbble.png"></a><?php } ?>
                          <?php  if(isset($smof_data['facebook'])  AND $smof_data['facebook'] !='') { ?><a class="facebook" href="http://facebook.com/<?php echo sanitize_text_field($smof_data['facebook']); ?>"><img title="socialmedia" alt="socialmedia" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social/cool/facebook.png"></a><?php } ?>
                          <?php  if(isset($smof_data['googleplus'])  AND $smof_data['googleplus'] !='') { ?><a class="google" href="https://plus.google.com/<?php echo sanitize_text_field($smof_data['googleplus']); ?>"><img title="socialmedia" alt="socialmedia" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social/cool/google.png"></a><?php } ?>
                          <?php  if(isset($smof_data['linkedin'])  AND $smof_data['linkedin'] !='') { ?><a class="linkedin" href="http://linkedin.com/<?php echo sanitize_text_field($smof_data['linkedin']); ?>"><img title="socialmedia" alt="socialmedia" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social/cool/linkedin.png"></a><?php } ?>
                          <?php  if(isset($smof_data['pintrest'])  AND $smof_data['pintrest'] !='') { ?><a class="pinterest" href="http://pintrest.com/<?php echo sanitize_text_field($smof_data['pintrest']); ?>"><img title="socialmedia" alt="socialmedia" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social/cool/pinterest.png"></a><?php } ?>
                          <?php  if(isset($smof_data['rss'])  AND $smof_data['rss'] !='') { ?><a class="rss" href="<?php echo $smof_data['rss'] ?>"><img title="socialmedia" alt="socialmedia" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social/cool/rss.png"></a><?php } ?>
                          <?php  if(isset($smof_data['twitter'] )  AND $smof_data['twitter'] !='') { ?><a class="twitter" href="http://twitter.com/<?php echo sanitize_text_field($smof_data['twitter']); ?>"><img title="socialmedia" alt="socialmedia" src="<?php echo get_stylesheet_directory_uri(); ?>/images/social/cool/twitter.png"></a><?php } ?>
                         
                        </nav>
                    </article>
                 </div>

            </section>
        </div>
    </section>



    <section class="footer-down container-fluid section">
        <div class="row-fluid">

            <section class="container">
                 <div class="row">
                    <article class="span12">
                        <div class="copyright text-center">        
                            <p><?php  if(isset($smof_data['footer_copyright'])): echo $smof_data['footer_copyright']; endif;?></p>        
                        </div>
                    </article>
                 </div>

            </section>
        </div>
    </section>
    <!--page:ends-->


</section>


</div>
<!--main-wrapper:ends-->
<?php

//Localize backstretch
if(isset($smof_data['bg_slider']) AND $smof_data['bg_slider'] != '')
{  
  wp_enqueue_script("backstretch-init", get_stylesheet_directory_uri(). "/javascripts/backstretch-init.js",array(),false,true); 
  $slides  = array();
  foreach($smof_data['bg_slider'] AS $bgsl)
  {
    array_push($slides, $bgsl['url']);
  }
  wp_localize_script('backstretch-init', 'slides', $slides);
}


//Localize twitter
if(isset($smof_data['twitter']) AND $smof_data['twitter'] != '')
{
  wp_enqueue_script("twitter-init", get_stylesheet_directory_uri(). "/javascripts/twitter-init.js",array(),false,true);   
  $twitter = $smof_data['twitter'];
  $twi_arry = array('twi_id' => $twitter,'path'=>get_stylesheet_directory_uri());
  wp_localize_script('twitter-init', 'twithandle', $twi_arry);
}

//Single page to return hash nav
if(is_single() OR is_page() OR is_archive()) 
{ 
  wp_enqueue_script( "issingle", get_stylesheet_directory_uri(). "/javascripts/issingle.js",array(),false,true);  
  $singpage = array( 'home_url' => home_url());
  wp_localize_script('issingle', 'singobj', $singpage);
  //Load sticky menu
  wp_enqueue_script( "menusticky", get_stylesheet_directory_uri(). "/javascripts/menusticky-init.js",array(),false,true);  
}

//page preloader
if(isset($smof_data['opt_preloader']) AND $smof_data['opt_preloader'] == '1')
{
  wp_enqueue_style("preloader", get_stylesheet_directory_uri(). "/stylesheets/preloader.css");
  wp_enqueue_script("jq-preloader", get_stylesheet_directory_uri(). "/javascripts/jq-preloader.js",array(),false,true);
  $deval = array('delayvalue' => $smof_data['hidden_preloader_delay']);
  wp_localize_script('jq-preloader', 'preloadvar', $deval); 
}

?>

<?php 
renova_inpage_styles();

wp_footer(); ?> 
</body>
</html>