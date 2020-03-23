$(document).ready(function(){
    ScrollReveal().reveal('.viewNumber',{
        duration:1000,
        origin:'right',
        distance:'50px'
    });
    // $(window).scroll(function(){
    //     var scrollTop = $(window).scrollTop();
    //     var documentHight = $(document).height();
    //     var windowHight = $(window).height();
    //     if ($(window).scrollTop() >= $(document).height() -  $(window).height() ) {
    //         $('.viewNumber').show().fadeIn(3000);

    //     }
    // });
});
$(function() {
    // TweenMax.staggerFrom($('.viewNumber'),0.5,{left:100,opacity:0},0.4)
    TweenMax.staggerFrom($('.testTween'),0.5,{scale:0.5,left:100,opacity:0},0.4)

});

// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});
