jQuery(document).ready(function() {
jQuery().UItoTop({ easingType: 'easeOutQuart' });
});
 
$(document).ready(function(){
$(".fader_img").fadeTo("fast", 0.0);
$(".fader_img").hover(function(){
$(this).fadeTo("fast", 1);
},function(){
$(this).fadeTo("fast", 0.0);
});
});