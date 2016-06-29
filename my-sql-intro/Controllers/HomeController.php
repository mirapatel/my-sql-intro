<?php

require "Views/View.php";
require "Views/HomeView.php";

class HomeController extends Controller {

	public function show(){
		$movie = new Movie;
		$movies = $movie->selectAll();   

		$view = new HomeView(compact('movies')); //compact and extract - compacted movies and apssed it to homeview
		$view->render();
	}

}