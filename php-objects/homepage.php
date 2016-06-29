<?php

class HomePage extends Page {
	public function contentHTML() {
		echo 'Home page Content';
		echo 'Please sign up to our site';
		echo 'Here are the latest 5 products';
	}
	public function latest5Products() {
	}
}