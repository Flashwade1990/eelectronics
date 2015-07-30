jQuery(document).ready(function($){
    
    // jQuery sticky Menu
    
	$(".mainmenu-area").sticky({topSpacing:0});
    
    
    $('.product-carousel').owlCarousel({
        loop:true,
        nav:true,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
            1000:{
                items:5,
            }
        }
    });  
    
    $('.related-products-carousel').owlCarousel({
        loop:true,
        nav:true,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1000:{
                items:2,
            },
            1200:{
                items:3,
            }
        }
    });  
    
    $('.brand-list').owlCarousel({
        loop:true,
        nav:true,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
            1000:{
                items:4,
            }
        }
    });    
    
    
    // Bootstrap Mobile Menu fix
    $(".navbar-nav li a").click(function(){
        $(".navbar-collapse").removeClass('in');
    });    
    
    // jQuery Scroll effect
    $('.navbar-nav li a, .scroll-to-up').bind('click', function(event) {
        var $anchor = $(this);
        var headerH = $('.header-area').outerHeight();
        $('html, body').stop().animate({
            scrollTop : $($anchor.attr('href')).offset().top - headerH + "px"
        }, 1200, 'easeInOutExpo');

        event.preventDefault();
    });    
    
    // Bootstrap ScrollPSY
    $('body').scrollspy({ 
        target: '.navbar-collapse',
        offset: 95
    }) ;

    $('#1').click(function(){
        $(this).css('color', '#ffce02');
        $('#2').css('color', '');
        $('#3').css('color', '');
        $('#4').css('color', '');
        $('#5').css('color', '');
$('<input>').attr({
    type: 'hidden',
    name: 'rate',
    value: '1'
}).appendTo('form');
});
    $('#2').click(function(){
        $('#1').css('color', '#ffce02');
        $('#2').css('color', '#ffce02');
        $('#3').css('color', '');
        $('#4').css('color', '');
        $('#5').css('color', '');
        $('<input>').attr({
    type: 'hidden',
    name: 'rate',
    value: '2'
}).appendTo('form');
    });  
    $('#3').click(function(){
        $('#1').css('color', '#ffce02');
        $('#2').css('color', '#ffce02');
        $('#3').css('color', '#ffce02');
        $('#4').css('color', '');
        $('#5').css('color', '');
                $('<input>').attr({
    type: 'hidden',
    name: 'rate',
    value: '3'
}).appendTo('form');
    });  
    $('#4').click(function(){
        $('#1').css('color', '#ffce02');
        $('#2').css('color', '#ffce02');
        $('#3').css('color', '#ffce02');
        $('#4').css('color', '#ffce02');
        $('#5').css('color', '');
                $('<input>').attr({
    type: 'hidden',
    name: 'rate',
    value: '4'
}).appendTo('form');
    });  
    $('#5').click(function(){
        $('#1').css('color', '#ffce02');
        $('#2').css('color', '#ffce02');
        $('#3').css('color', '#ffce02');
        $('#4').css('color', '#ffce02');
        $('#5').css('color', '#ffce02');
                $('<input>').attr({
    type: 'hidden',
    name: 'rate',
    value: '5'
}).appendTo('form');
    });         


     
});