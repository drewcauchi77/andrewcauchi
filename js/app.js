$(document).ready(function(){
	$('#nav-icon').click(function(){
        $(this).toggleClass('open');
        $('.mobile-menu').toggleClass('open');
        $('body').toggleClass('stop-scroll');
	});
});