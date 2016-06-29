<?php

class Cyborg extends Person {

	public function fly() {
		echo $this->name.' is flying';
	}

	public function introduceSelf() {
		echo "<p>";
		echo 'Beep boop, ID is '.$this->name;
		echo "<p>";
	}
}