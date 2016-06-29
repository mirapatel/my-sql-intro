<?php 

// class = blueprint

class Person {

	protected $dob; //variable
	protected $name = ""; 
	protected $weight;
	protected $height;
	protected $gender;
	public $nickname = "";
	protected $stomachLevel = 0;
	protected $hasShoes = false;

	//function that runs when you create an instance of this class
	public function __construct($newName, $newWeight=0) {

		//save the new values up inside the properties
		$this->name = $newName;
		$this->weight = $newWeight;
		$this->dob = date("Y-m-d");
	}

	public function eat() {


	}

	public function walk() {


	}

	public function sayBirthday() {

		//convert the birthday into something you would say

		//convert date into a timestamp
		$birthdayAsTime = strtotime($this->dob);

		//get the day (21st etc)
		$day = date("jS", $birthdayAsTime);

		//get the month and year (January 2001 etc)
		$monthYear = date("F Y", $birthdayAsTime);

		echo "<p>";
		echo "My birthday is on the {$day} of {$monthYear}";
		echo "<p>";
	}

	public function introduceSelf() {

		echo "<p>";
		echo "Hello, my name is ".$this->name;
		echo "<p>";

	}

}