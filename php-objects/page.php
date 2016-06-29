<?php
abstract class Page {
	private $title;
	private $desc;
	private $stylesheets;
	private $jsFiles;
	public function buildHeaderHTML() {
	}
	public function buildFooterHTML() {
	}
	public function newWeeklySubscriber() {
		
	}
	abstract public function contentHTML();
}