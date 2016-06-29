$(document).ready(function(){

	$('.control').click(function(){
		$(this).next('.box').slideToggle();
});
});//document

$(document).ready(function(){
	$('#login-link').click(function(){
		$('#login-box').fadeIn();
	});
});
