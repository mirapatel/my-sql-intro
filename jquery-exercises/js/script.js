$(document).ready(function(){

	$('h1').click(function(){
		$('p').fadeOut('slow');
	});

	$('#clickMe').click(function(){
		$('.bottom').toggleClass('transparent');
	});

	$('.heading').click(function(){
		$(this).next('.box').slideToggle();
	});

	// $('.heading').click(function(){
	// 	$(this).next('.box')css({"display": "block"});
	// });

	$('#log-in-link').click(function(){
		$('#form').fadeIn('slow');
	});

	$('#close').click(function(){
		$('#form').fadeOut('slow');
	});

});