// alert("hello");

// localStorage.setItem("cart", JSON.stringify([]));

//if a shopping car does not exist in local storage
if (localStorage.getItem("cart") == null) {
	//crate a cart
	localStorage.setItem("cart", JSON.stringify([]));
};

//extract the cart and convert it back into an object
var cart = JSON.parse(localStorage.getItem("cart")); 

//show the contents of the cart
console.log(cart);

// var product = {
// 	id: 1234,
// 	price: 12.99
// }

document.querySelector("#total-cart").innerHTML = cart.length; 



//add this product to the cart array
// cart.push(product);

// console.log(cart);
//show the user how many items they have in their cart
updateCartDisplay();

//find all the add to cart buttons
var addToCartButtons = document.querySelectorAll(".add-to-cart");

	for (var i =0; i<addToCartButtons.length; i++) {

	addToCartButtons[i].onclick = addToCart;
};

function addToCart () {
	// console.log(this); //this is the key thing that triggered the event
	var productName = this.dataset.name;
	var productPrice = parseFloat(this.dataset.price);

	var product = {
		name: productName,
		price: productPrice
		//quantity
	}

	cart.push(product);

	localStorage.setItem("cart", JSON.stringify(cart));

	console.log(cart);
	updateCartDisplay();


	document.querySelector("#total-cart").innerHTML = cart.length; 

	//update quantity and check
};

//listen for clicks on the clear cart button
document.querySelector("#clear-cart").onclick = function () {
	
	localStorage.setItem("cart", JSON.stringify([]));

	cart = [];

	updateCartDisplay();
};

function updateCartDisplay() {

	//get cart contents
	var cart = JSON.parse(localStorage.getItem("cart")); 

	// //if the total items is 0
	// if (cart.length == 0) {
	// 	var text = "";
	// } else {
	// 	var text = cart.length;
	// }

	//count cart contents and display on the screen
	document.querySelector("#total-cart").innerHTML = cart.length;

	showCartTable();


};

function showCartTable() {

	//find the container that will hold the table
	var container = document.querySelector("#cart-table");

	var table = document.createElement("table");
	table.setAttribute("border" , "1");

	//create a row to hold the headings
	var headingsRow = document.createElement("tr");

	//create the name heading
	var nameHeading = document.createElement("th");

	nameHeading.innerHTML = "Product Name";

	//create heding for the price of the product
	var priceHeading = document.createElement("th");

	priceHeading.innerHTML = "Price";

	//add the headings to the headings row
	headingsRow.appendChild(nameHeading);
	headingsRow.appendChild(priceHeading);

	//add the headings row to the table
	table.appendChild(headingsRow);

	var grandTotal = 0;

	//loop over all the cart items 
	for( i =0; i <cart.length; i ++) {

		//get the price of the product and add to the grand total
		grandTotal += cart[i].price; 



		//create a row for this product
		var row = document.createElement("tr");

		//create the product name data element
		var nameTD = document.createElement("td");

		//create the product price data element
		var priceTD = document.createElement("td");

		//add data to the TD elements 
		nameTD.innerHTML = cart[i].name;
		priceTD.innerHTML = cart[i].price;

		//add the TD elements to the row
		row.appendChild(nameTD);
		row.appendChild(priceTD);

		table.appendChild(row);
	};


	console.log(grandTotal);

	var grandTotalRow = document.createElement("tr");
	var grandTotalTD = document.createElement("td");
	var fillerTD = document.createElement("td");

	grandTotalTD.innerHTML = "Grand Total: $" + grandTotal;

	grandTotalRow.appendChild(fillerTD);
	grandTotalRow.appendChild(grandTotalTD);

	table.appendChild(grandTotalRow);


	//clear whatever is inside the div
	container.innerHTML = "";

	//add the table to the screen
	container.appendChild(table);



};


//get a copy of the cart
// var cart localStorage.getItem("cart");

// cart = {
// 	id: 1234,
// 	name: "Smartphone",
// 	price: 1000,
// 	thumbnail: "image.jpg"
// };

// //convert our object into text, because Local storage doesnt
// //work with objects
// cart = JSON.stringify(cart);

// //save our changes
// localStorage.setItem("cart", cart);