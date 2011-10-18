<?php
include_once DOC_ROOT . 'inc/Node.php';
class Tree
{
	private $root;
	
	public function __construct(){
		$this->root = new Node('root', NULL);
	}
	public function __destruct(){
		unset($this->root);
	}
	public function __toString(){
		return $this->root->print_children();
	}
	
	public function get_root(){
		return $this->root;
	}
}
?>