$(document).ready(function(){

	$('#target').css({"background-color":"red"});
	
});

$(document).ready(function(){

	$('.target').css({"background-color":"red"});
	
}); //changes the background color

$(document).ready(function(){

	$("#target span").text("hello");
	
}); //changes the inner text

$(document).ready(function(){

	$( "#target span" ).clone().insertAfter( "#target span" );
	
}); //create a clone under a span

$(document).ready(function(){

	$( "div.target:nth-child(2)" ).css ({"background-color":"red"});
	
}); //chaneg second targets background color

$(document).ready(function(){

	 $(".target button").attr("disabled","disabled");
	
}); //disable button

 $('.target input').removeAttr('checked'); //remove checked boxes

 $("#parent1 #child").detach().appendTo("#parent2"); // move child element to another parent

$("#target input").attr("readonly","readonly"); //textbox read only

$("#target  option").eq(1).attr('selected', 'selected'); //selects second option in drop down