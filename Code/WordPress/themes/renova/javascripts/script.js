//JSHint Validated Custom JS Code by Designova

/*global $:false */
/*global window: false */
jQuery(document).ready(function($) { 
(function(){
  "use strict";

//VIEWPORT DETECTION:
$(function ($) {
    var viewportHeight = $(window).height();
    $('.intro').css('height',viewportHeight);
    $('.intro').css('padding-top',viewportHeight/3);
});


//MASONRY PORTFOLIO INIT:
$(function () {

    var $container = $('#container');

    $container.isotope({
        itemSelector: '.element',
        layoutMode: 'masonry'
    });


    var $optionSets = $('#options .option-set'),
        $optionLinks = $optionSets.find('a');

    $optionLinks.click(function () {
        var $this = $(this);
        // don't proceed if already selected
        if ($this.hasClass('selected')) {
            return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');

        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        var changeLayoutMode;
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[key] = value;
        if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
            // changes in layout modes need extra logic
            changeLayoutMode($this, options);
        } else {
            // creativewise, apply new options
            $container.isotope(options);
        }

        return false;
    });


});


/*===========================================================*/
/*  Colorbox
/*===========================================================*/
$(function () {
    
    // var viewportHeight = $(window).height();
    // var introMargin = (viewportHeight / 3) - (viewportHeight / 12);
    // $('#intro').height(viewportHeight);
    // $('.promo-one').css('margin-top', introMargin);
    //Examples of how to assign the ColorBox event to elements
    $(".zoom-info").colorbox({
        rel: 'group1',
        transition: "fade",
        speed: 1700,
        // onComplete: function () {
        //     $('.flexslider').flexslider({
        //         animation: "slide",
        //         controlNav: false,
        //         directionNav: true

        //     });
        // }
    });

});




$(function() {
    $(' .da-thumbs > li ').each( function() { $(this).hoverdir({hoverDelay : 75}); } );
});



//Blog paginate ajax
  $('.paginate a').addClass('btn btn-renova-alt');
  $('.blog-pages a').addClass('btn btn-renova-alt');
  $('#post-comment').addClass('btn btn-renova-alt');
  $.ajaxSetup({cache:false});
  $('.paginate a').live('click', function(e){
    e.preventDefault();
    var link = $(this).attr('href');
    var height = $('#ajax-container').height();
     
    $('#ajax-container').fadeOut(100).load(link + ' #ajax-inner', function(){ $('#ajax-container').fadeIn(100);  $('.paginate a').addClass('btn btn-renova-alt'); });
  });



//FANCYBOX - LIGHTBOX
//=======================

$("a.fancythumb").fancybox({
                'overlayShow'   : true,
                'transitionIn'  : 'elastic',
                'transitionOut' : 'elastic'
            });

$("a.fancyvideo").click(function() {
    $.fancybox({
            'padding'       : 0,
            'autoScale'     : false,
            'transitionIn'  : 'none',
            'transitionOut' : 'none',
            'title'         : this.title,
            'width'     : 680,
            'height'        : 495,
            'href'          : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
            'type'          : 'swf',
            'swf'           : {
                 'wmode'        : 'transparent',
                'allowfullscreen'   : 'true'
            }
        });

    return false;
});

//WAYPOINTS - INTERACTION
//=======================

    //Triggering Navigation as Sticky when scrolled to second section:
    // $('.beneath-intro').waypoint(function (event, direction) {
    //     if (direction === 'down') {
    //         $('.navigation').addClass('sticky').slideDown();
    //         $('#scroll').stop().animate({bottom: '-150px'}, 700);
    //     } else {
    //         $('#scroll').stop().animate({bottom: '0px'}, 700);
    //         $('.navigation').slideUp().removeClass('sticky');
    //     }
    // }, { offset: 160 });



    $('.page').waypoint(function (direction) {
        var colSwatch = $(this).attr('data-live-color');
        if (direction === 'down') {
            $('#navigation').addClass('bg-'+colSwatch);
        } else {
            $('#navigation').removeClass('bg-'+colSwatch);
        }
    }, { offset: 50 });


    $('.news-img').mouseenter(function(){
        $(this).find('.news-date').slideUp();
    });
    $('.news-img').mouseleave(function(){
        $(this).find('.news-date').slideDown();
    });

    //Nav Menu Links Highlights and Active Transition


    // $('.master-section').mouseenter(function () {
    //     var pageInd = $(this).attr('id');
    //    $('.navigation ul li > a').removeClass('lighted');
    //     $('#'+pageInd+'-linker').addClass('lighted');

       
    // });

//Page nav activation
var page_stack = $.makeArray();
    var stack_top = 0;
    $('.master-section').waypoint(function (direction) {
        if (direction === 'down') 
        {
            $('#main-nav li a').removeClass('lighted');
            $('#main-nav li a[href=#'+$(this).attr('id')+']').addClass('lighted'); 
            stack_top = stack_top+1; 
            page_stack[stack_top] = $(this).attr('id');
            
        } 
        else 
        {
            stack_top = stack_top-1;
            $('#main-nav li a').removeClass('lighted');
            $('#main-nav li a[href=#'+page_stack[stack_top]+']').addClass('lighted');
            
        }
    },{ offset: 100 });







    $('.navigation ul li > a').click(function () {
        $('.navigation ul li > a').removeClass('lighted');
        $(this).addClass('lighted');
    });

    //Portfolio Hover
    $('.folio-item').mouseenter(function () {
        $(this).find('img').css('opacity', '0.2');
        $(this).find('.folio-trigger-icon').fadeIn();
        $(this).find('.titles').fadeIn();
    });

    $('.folio-item').mouseleave(function () {
        $('.folio-item').find('.titles').fadeOut();
        $(this).find('.folio-trigger-icon').fadeOut();
        $('.folio-item').find('img').css('opacity', '1');
    });


    $('.element > img, .service-item, .about-feat').mouseleave(function () {
        $(this).addClass('remove-zoom');
    });

    //Intro Interactions
    $('#intro-nav a').mouseenter(function(){
        // $(this).find('img').animate({opacity : 0});
        // $(this).find('h6').animate({opacity : 1});
    });

  $('.flexslider').flexslider({
    animation: "slide",
    smoothHeight: true,
    directionNav: true,
    controlNav: false,
    animationLoop:true,
    slideshow: false,
    pauseOnAction: true,
    pauseOnHover: true,
    easing: 'swing',
    video:true, 
  });


$('.carousel').carousel({
  interval: false
})

$("html").niceScroll(); 


})();
});