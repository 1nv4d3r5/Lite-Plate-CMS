<?php
class Page
{
	private $_title;
	private $_body_id;
	private $_content;
	private $_subcontent;
	private $_include_jqueryui;
	private $_script_url;

	/* CONSTRUCTOR */
	public function __construct($title=NULL, $content=NULL, $subcontent=NULL, $body_id='', $include_jqueryui=FALSE, $script_url=NULL){
		$this->_title = $title;
		$this->_body_id = $body_id;
		$this->_content = $content;
		$this->_subcontent = $subcontent;
		$this->_include_jqueryui = $include_jqueryui;
		$this->_script_url = $script_url;
	}

	/* GET FUNCTIONS */
	public function get_title(){ return $this->_title; }
	public function get_body_id(){ return $this->_body_id; }
	public function get_content(){ return $this->_content; }
	public function get_subcontent(){ return $this->_subcontent; }
	public function get_script_url(){ return $this->_script_url; }
	public function get_include_jqueryui(){ return $this->_include_jqueryui; }

	/* SET FUNCTIONS */
	public function set_title($title){ $this->_title = $title; }
	public function set_body_id($body_id){ $this->_body_id = $body_id; }
	public function set_content($content){ $this->_content = $content; }
	public function set_subcontent($subcontent){ $this->_subcontent = $subcontent; }
	public function set_script_url($script_url){ $this->_script_url = $script_url; }
	public function set_include_jqueryui($include_jqueryui){ $this->_include_jqueryui = $include_jqueryui; }
}
?>