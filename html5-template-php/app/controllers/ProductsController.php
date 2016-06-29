<?php

class ProductsController extends PageController {

	private $allProducts;

	public function __construct() {

		// Prepare title
		$this->title = 'Our product range';

		// Prepare meta description
		$this->metaDesc = 'Check out our range of soft toys, board games etc';

		// Get all products
		$this->allProducts = [
			[
				'name' => 'Battleship',
				'desc' => 'Board game of awesome'
			],
			[
				'name' => 'Teddy',
				'desc' => 'A soft toy for kids'
			]
		];

		// Filter the products (if requested)

	}

	public function buildHTML() {

		include 'app/templates/header.php';

		include 'app/templates/products/products.php';

		include 'app/templates/footer.php';

	}






}