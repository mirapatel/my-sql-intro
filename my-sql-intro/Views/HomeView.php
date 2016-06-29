<?php

class HomeView extends View {

	public function render() {

		extract($this->data);
		// var_dump($movies);
		include "templates/home.php";


	}
	
}