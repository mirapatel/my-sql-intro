<?php

abstract class PageController {

	protected $title;
	protected $metaDesc;

	public function subscribeToNewsletter() {
		
	}

	abstract public function buildHTML();

}