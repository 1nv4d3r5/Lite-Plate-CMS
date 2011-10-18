<?php
class Page
{
	private $_title;
	private $_main_navigation;
	private $_content;
	
	public function __construct($title, $main_navigation=NULL, $content=NULL){
		$this->_title = $title;
		$this->_main_navigation = $main_navigation;
		$this->_content = $content;
	}
	public function __destruct(){
		unset($this->_title, $this->_main_navigation, $this->_content);
	}
	
	public function get_title(){ return $this->_title; }
	public function get_main_navigation(){ return $this->_main_navigation; }
	public function get_content(){ return $this->_content; }
	
	public function set_title($title){ $this->_title = $title; }
	public function set_main_navigation($main_navigation){ $this->_main_navigation = $main_navigation; }
	public function set_content($content){ $this->_content = $content; }
}
?>