<?php

require "Views/MoviesView.php";
require "Views/MovieFormView.php";

class MoviesController extends Controller
{
	public function show() {

		// $id = isset($_GET['id']) ? ($_GET['id']) : null;
		// $singlemovie = new Movie($id);
		$singlemovie = new Movie($_GET['id']);
		// var_dump($singlemovie);

		$view = new MoviesView(compact('singlemovie'));
		$view->render();
	}
	public function add() {
		$singlemovie = new Movie;
		// var_dump($singlemovie);
		$view = new MovieFormView(compact('singlemovie'));
		$view->render();
	}

	public function insert() {
		$movie = new Movie($_POST);
		// var_dump($movie);
		$movie->insert();
		header("Location: ./?page=movie&id=".$movie->id);
	}
	public function edit() {
		// $id = isset($_GET['id']) ? ($_GET['id']) : null;
		// $singlemovie = new Movie($id);
		$singlemovie = new Movie($_GET['id']);
		// var_dump($singlemovie);

		$view = new MovieFormView(compact('singlemovie'));
		$view->render();
	}

	public function update() {
		$movie = new Movie($_POST);
		$movie->update();

		header("Location: ./?page=movie&id=".$movie->id);

	}

	public function delete() {

		Movie::delete($_GET['id']);
		header("Location:./");
	}
}