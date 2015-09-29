jQuery(document).ready(function($) {
	
// $(function ($) {
//     $("#ticker").tweet({
//         username: twithandle,
//         page: 1,
//         avatar_size: 0,
//         count: 20,
//         loading_text: "loading tweets..."
//     }).bind("loaded", function () {
//         var ul = $(this).find(".tweet_list");
//         var ticker = function () {
//             setTimeout(function () {
//                 ul.find('li:first').animate({
//                     marginTop: '-4em'
//                 }, 500, function () {
//                     $(this).detach().appendTo(ul).removeAttr('style');
//                 });
//                 ticker();
//             }, 5000);
//         };
//         ticker();
//     });
// });
$(function ($) {
    $('#ticker').tweet({
        modpath: twithandle.path + '/twitter/',
        count: 1,
        loading_text: 'loading twitter feed flame...',
        username:twithandle.twi_id
        /* etc... */
    });
  }); 

});