$(document).ready(function($) {
    setTimeout(function() {
        $('.dark-bg').fadeIn('300', function() {
            $('.intro-bg').slideDown('400');
        });
    },1000);
    $('.closePopUp').click(function(event) {
        $('.intro-bg').slideUp('300',function(){
            $(this).remove();
            $('.dark-bg').fadeOut('400', function() {
                $(this).remove();
            });
        });
    });