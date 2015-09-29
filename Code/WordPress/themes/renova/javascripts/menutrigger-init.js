jQuery(document).ready(function($) {
	
// $(function () {

    //WAYPOINTS - INTERACTION
    $('#'+ pageid).waypoint(function (direction) {
        if (direction === 'down') {
            $('.navigation').addClass('sticky').slideDown();
            $('#scroll').stop().animate({bottom: '-150px'}, 700);
            $('#badge').hide();
           
        } else {
            $('#scroll').stop().animate({bottom: '0px'}, 700);
            $('.navigation').slideUp().removeClass('sticky');
            $('#badge').show();
            
        }
    }, { offset: 160 });
	

// });


});