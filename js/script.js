// JavaScript Document

function goToByScroll(id,speed){
      // Remove "link" from the ID
    id = id.replace("link", "");
      // Scroll
    $('html,body').animate({
        scrollTop: $("#"+id).offset().top},
        speed);
}

$(document).ready(function(){

$.ajaxSetup({
type: 'POST',
timeout: 50000,
cache: false,
});

$('.tooltip').tooltipster(); // Activate tooltip
// on window load, show the tooltip
$(window).load(function() {
   $('#PlaceAd').tooltipster('show');
   });

	////  Image Rotate Function
	$.fn.animateRotate = function(angle, duration, easing, complete) {
    return this.each(function() {
        var $elem = $(this);
        $({deg: 0}).animate({deg: angle}, {
            duration: duration,
            easing: easing,
            step: function(now) {
                $elem.css({
                  '-moz-transform':'rotate('+now+'deg)',
                  '-webkit-transform':'rotate('+now+'deg)',
                  '-o-transform':'rotate('+now+'deg)',
                  '-ms-transform':'rotate('+now+'deg)',
                  'transform':'rotate('+now+'deg)'
                });
            },
            complete: complete || $.noop
        });
    });
};



/* Select function */
var select = '.ui-select' ;
$(select).find('i').on('click', function(e){
e.preventDefault();
$(this).parent('div').addClass('ACTIVE-SELECT');

if($('.ACTIVE-SELECT').find('ul').is(':hidden')){
$('.ACTIVE-SELECT').find('span').animateRotate(180,500);
$('.ACTIVE-SELECT').find('ul').slideToggle('fast');
$(this).tooltipster('hide');
}
else{
$('.ACTIVE-SELECT').find('span').animateRotate(-360,500);
$('.ACTIVE-SELECT').find('ul').slideUp('fast');
$('.ACTIVE-SELECT').find('ul').parent('div').removeClass('ACTIVE-SELECT');
}

});

$('body').on('click', '.ACTIVE-SELECT ul li a' , function(e){
e.preventDefault();
var value = $(this).attr('href');
$('.ACTIVE-SELECT').find('label').fadeOut('fast',function(){
	$(this).text(value).delay(50).fadeIn('fast') ;
});
$('.ACTIVE-SELECT').attr('data-value',value);
$('.ACTIVE-SELECT').find('ul').slideToggle('fast');
$('.ACTIVE-SELECT').find('span').animateRotate(-360,500);
$('.ACTIVE-SELECT').removeClass('ACTIVE-SELECT');
});
/* End of select function*/

});

/* LIBRARY FUNCTION */
//Validate interger value input
function isInt(n){
	var reInt = new RegExp(/^-?\d+$/);
	if (!reInt.test(n)) {
		return false;
	}
	return true;
}

//Validate email address check
function Valid_email(email) {
 		var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
 		return pattern.test(email);
}
/* END OF LIBRARY FUNCTION */