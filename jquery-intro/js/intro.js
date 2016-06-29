// alert("hi");

//wait for the browser to e ready

// window.onload = function(){

// }

$("document").ready(init);

function init() {

	//change th etext inside the h1
	var h1 = document.querySelector("h1");

	h1.innerHTML = "changed by javascript";

	$(h1).html("changed again by jQuery");

	//add zebra striping to the unordered list

	var list = document.querySelectorAll("li:nth-child(2n)");
	console.log(list);

	for(var i=0; i<list.length; i++) {

		list[i].style.backgroundColor = 'red';
	}


	$("li:nth-child(2n)").css("background-color", "blue");

	//listen for clicks on the menu button 
	$("#menu").click(function(){
		$("ul").slideToggle();
	});
	

}