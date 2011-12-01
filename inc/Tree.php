<?php
include_once DOC_ROOT . 'inc/Node.php';
class Tree
{
	private $_root;
	
	/* CONSTRUCTOR */
	public function __construct(){
		$this->_root = new Node('Home', 1, WEB_ROOT, 'home');;
	}

	/* MAGIC FUNCTIONS */
	public function __toString(){
		return '<ul>' . $this->_root . '</ul>';
	}
	
	public function output_as_menu($logged_in=FALSE){
		if($logged_in === FALSE){
			return '<ul class="column grid_8 main_navigation">' . $this->_root->output() . '</ul><ul class="column grid_4 user_navigation">' . $this->_root->output('logged_out') . '</ul>';
		}
		return '<ul class="column grid_8 main_navigation">' . $this->_root->output() . '</ul><ul class="column grid_4 user_navigation">' . $this->_root->output('logged_in', 'logged_in') . '</ul>';
	}
	public function output_compact(){
		return '<ul>' . $this->_root->output_compact() . '</ul>';
	}

	/* HELPER FUNCTIONS */
	public function insert_node($node){
		$this->_root->insert_child($node);
	}
	
	/* GET FUNCTIONS */
	public function get_root(){ return $this->_root; }
	
	/* SET FUNCTIONS */
	public function set_root($root){ $this->_root = $root; }
}
?>