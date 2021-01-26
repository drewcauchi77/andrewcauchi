$(document).ready(function(){
	$('#nav-icon').click(function(){
                $(this).toggleClass('open');
                $('.mobile-menu').toggleClass('open');
                $('body').toggleClass('stop-scroll');
        });
        
        $('.back-to-top').click(function(){
                $('#nav-icon').removeClass('open');
                $('.mobile-menu').removeClass('open');
                $('body').removeClass('stop-scroll');
        });

        $('.mobile-menu ul li a').click(function(){
                $('#nav-icon').removeClass('open');
                $('.mobile-menu').removeClass('open');
                $('body').removeClass('stop-scroll');
        });
});