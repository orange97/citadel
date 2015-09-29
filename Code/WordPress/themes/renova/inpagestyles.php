<?php
global $smof_data;

    // if($smof_data['text_g_select'] != 'none') {$pff = $smof_data['text_g_select'];} else $pff = "Open_Sans_R"; 
    // if($smof_data['heading_g_select'] != 'none') {$hf = $smof_data['heading_g_select']; } else $hf = "Carto_Sans_Bold";
    // if($smof_data['ch_g_select'] != 'none') {$chf = $smof_data['ch_g_select'];} else $chf = ""; 
?>
<style type="text/css">
/*-------Page Specific Classes---------*/
<?php
$pages = get_pages( 'sort_order=asc&sort_column=menu_order&depth=1');
//Pages to sections published pages
echo '@media only screen and (min-width: 768px){';
foreach($pages as $pag):
setup_postdata($pag);
$newanchorpoint = strtolower(preg_replace('/[^a-zA-Z]/s', '', $pag->post_name)); 
$new_title      = $newanchorpoint;

// //Background
$ren_sb_position       =  get_post_meta($pag->ID,'sb_position',true); 
$ren_section_bg        =  get_post_meta($pag->ID,'parallax_bg',true);


 echo '.'.$new_title.'-bgclass {';
 echo 'background:url('.$ren_section_bg.') '.$ren_sb_position.'  top no-repeat !important;';
 echo '}';
endforeach;
echo '}';
?>



#scroll
{
        background: url('<?php echo $smof_data["ssd_icon"]; ?>') no-repeat center top !important;
}


.navigation
{
    background: <?php echo $smof_data['highlight_color']; ?> !important;
}
.postformat
{
  background: <?php echo $smof_data['highlight_color']; ?> !important;
}
.wide-section-showcase{
    background: <?php echo $smof_data['highlight_color']; ?>;
}

.da-thumbs li a div {
    background-color: rgba(<?php echo renova_hex2rgb($smof_data['highlight_color'])?>,0.8) !important; 
}

.testimonial-block{
   background: <?php echo $smof_data['highlight_color']; ?> !important;
}
/*Mobile nav bg*/
#nav a {

   background: <?php echo $smof_data['highlight_color']; ?>; 
}
#nav-toggle 
{
     background: <?php echo $smof_data['highlight_color']; ?>;
     background:  url("<?php echo get_stylesheet_directory_uri(); ?>/stylesheets/hamburger.gif") no-repeat center center <?php echo $smof_data['highlight_color']; ?>;
}
/* Time Line */
.cbp_tmtimeline:before {
    background: <?php echo $smof_data['highlight_color']; ?>
}
.cbp_tmtimeline > li:nth-child(2n+1) .cbp_tmtime span:last-child {
    color: <?php echo $smof_data['highlight_color']; ?>;
}
.cbp_tmtimeline > li:nth-child(2n+1) .cbp_tmlabel {
    background: <?php echo $smof_data['highlight_color']; ?>;
}
.cbp_tmtimeline > li .cbp_tmicon {
    box-shadow: 0 0 0 8px <?php echo $smof_data['highlight_color']; ?>;

}
.cbp_tmtimeline > li:nth-child(2n+1) .cbp_tmlabel:after {
    border-right-color: <?php echo $smof_data['highlight_color']; ?>;

}


.team-block-inner{
    background: <?php echo $smof_data['highlight_color']; ?> !important;
}

.news-date{
    background: <?php echo $smof_data['highlight_color']; ?> !important;
}

.news-specs{
    background: <?php echo $smof_data['highlight_color']; ?> !important;   
}

.btn-renova:hover{
    background:<?php echo $smof_data['highlight_color']; ?> !important;   
}

.btn-renova-alt:hover{
    background:<?php echo $smof_data['highlight_color']; ?> !important;    
}
.tweet_list li a {
    color: <?php echo $smof_data['highlight_color']; ?>;
}

.shoutout
{
    border-left: solid 10px <?php echo $smof_data['highlight_color']; ?>;
}
.inner-heading span{
border-bottom: double 4px <?php echo $smof_data['highlight_color']; ?>;
}

#intro-nav ul li{
    background: <?php echo $smof_data['highlight_color']; ?>;
}
p.p-price {
    color:<?php echo $smof_data['highlight_color']; ?>;
}


.tweet_list li a:hover {
                color: <?php echo $smof_data['highlight_color']; ?>;

            }

#container-folio{
  background: <?php echo $smof_data['highlight_color']; ?>;
}

@media (max-width: 767px){
    .news-img{
    background: <?php echo $smof_data['highlight_color']; ?>;
  }
  .promo-text > span:after {
  border-bottom:0 !important;
  } 

  .promo-text > span:after {
  border-bottom:0 !important;
  }
.promo-text-alt.darken > span:after {
   border-bottom:0 !important;
}
.promo-text-inv-yellow.darken > span:after
 {
   border-top:0 !important;
}
.promo-text-inv.darken > span:after
 {
   border-top:0 !important;
}   
}

@media (max-width: 360px){
    .promo-text{
    background:<?php echo $smof_data['dsh_color']; ?> !important;
  }
  .promo-text-inv-yellow{
     background: <?php echo $smof_data['renovaheading_dark_bg']; ?> !important;
     color: <?php echo $smof_data['renovaheading_dark_text']; ?> !important;
  }
.promo-text > span:after {
  border-bottom:0 !important;
  }

.promo-text-alt.darken > span:after {
   border-bottom:0 !important;
}
.promo-text-inv-yellow.darken > span:after
 {
   border-top:0 !important;
}
.promo-text-inv.darken > span:after
 {
   border-top:0 !important;
}

}
@media (max-width: 320px){
    .promo-text{
    background:<?php echo $smof_data['dsh_color']; ?> !important;
  }
  .promo-text-inv-yellow
  {
    background: <?php echo $smof_data['renovaheading_dark_bg']; ?>;
    color: <?php echo $smof_data['renovaheading_dark_text']; ?> !important;
  }
  .promo-text > span:after {
  border-bottom:0 !important;
  }
.promo-text-alt.darken > span:after {
   border-bottom:0 !important;
}
.promo-text-inv-yellow.darken > span:after
 {
   border-top:0 !important;
}
.promo-text-inv.darken > span:after
 {
   border-top:0 !important;
}



}


/*Sub heads*/
.promo-text > span{
    background: <?php echo $smof_data['dsh_color']; ?>;
    color:<?php echo $smof_data['dsh_text_color']; ?>;
}

.promo-text-alt.darken > span{
  color: <?php echo $smof_data['lsh_text_color']; ?>;
   background: <?php echo $smof_data['lsh_color']; ?>;

}

.promo-text > span:after {
  border-bottom-color: <?php echo $smof_data['dsh_color']; ?> !important;
}

.promo-text-alt.darken > span:after {
  border-bottom-color: <?php echo $smof_data['lsh_color']; ?> !important;
}

/*Renova Heading*/
.promo-text-inv-yellow.darken > span{
    color: <?php echo $smof_data['renovaheading_dark_text']; ?>;
    background: <?php echo $smof_data['renovaheading_dark_bg']; ?>;
}
.promo-text-inv-yellow.darken > span:after
 {
  border-top-color: <?php echo $smof_data['renovaheading_dark_bg']; ?> !important;
}


.promo-text-inv.darken > span{
    color: <?php echo $smof_data['renovaheading_light_text']; ?>;
    background: <?php echo $smof_data['renovaheading_light_bg']; ?>;
}

.promo-text-inv.darken > span:after
 {
  border-top-color: <?php echo $smof_data['renovaheading_light_bg']; ?> !important;
}




<?php //echo esc_textarea($smof_data['custom_css']); 
   echo $smof_data['custom_css'];
?>
</style>
