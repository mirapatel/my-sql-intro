<?php

abstract class View {

	protected $data = []; 

	public function __construct($data) { //$data = []
		$this->data = $data;
	}

	abstract public function render();


}