<?php
class Node{
	private $_name;
	private $_url;
	private $_parent;
	private $_children;
	private $_body_id;
	private $_type;
	
	public function __construct($name, $url=NULL, $parent=NULL, $children=array(), $body_id=NULL, $type='main'){
		$this->_name = $name;
		$this->_url = WEB_ROOT . $url;
		$this->_parent = $parent;
		$this->_children = $children;
		$this->_body_id = $body_id;
		$this->_type = $type;
	}
	public function __destruct(){
		$this->delete_all_children();
	}
	public function __toString(){
		return '<ul><li>' . $this->_name . '</li>' . $this->print_children() . '</ul>';
	}

	public function add_children($children){
		if($children != NULL){
			for($i=0;$i < count($children);$i++){
				array_push($this->_children, $children[$i]);
			}
		}
	}
	public function delete_all_children(){
		if($this->_children != NULL){
			for($i=0;$i < count($this->_children);$i++){
				unset($this->_children[$i]);
			}
		}
	}
	public function print_children(){
		if(count($this->_children) == 0){
			return '';
		}
		$children = '<ul class="column grid_8 main_navigation">';
		for($i=0; $i < count($this->_children); $i++){
			if(strcasecmp($this->_children[$i]->get_type(), 'main') == 0){
				$children .= '<li><a href="' . $this->_children[$i]->get_url() . '" title="' . ucfirst($this->_children[$i]->get_name()) . '" class="' . 'menu_' . $this->_children[$i]->get_body_id() . '">' . $this->_children[$i]->get_name() . '</a></li>';
			}
		}
		$children .= '</ul><ul class="column grid_4 login_navigation">';
		for($i=0; $i < count($this->_children); $i++){
			if(strcasecmp($this->_children[$i]->get_type(), 'login') == 0){
				$class = '';
				if(strcasecmp($this->_children[$i]->get_name(), 'Sign Up') == 0){
					$class = 'last-child';
				}
				$children .= '<li class="' . $class . '"><a href="' . $this->_children[$i]->get_url() . '" title="' . ucfirst($this->_children[$i]->get_name()) . '" class="' . 'menu_' . $this->_children[$i]->get_body_id() . '">' . $this->_children[$i]->get_name() . '</a></li>';
			}
		}
		$children .= '</ul>';
		return $children;
	}
	
	public function print_children_compact(){
		if(count($this->_children) == 0){
			return '';
		}
		$children = '';
		for($i=0; $i < count($this->_children); $i++){
			if(strcasecmp($this->_children[$i]->get_type(), 'main') == 0){
				$children .= '<li><a href="' . $this->_children[$i]->get_url() . '" title="' . ucfirst($this->_children[$i]->get_name()) . '">' . $this->_children[$i]->get_name() . '</a></li>';
			}
		}
		return $children;
	}
	
	
	public function get_name(){ return $this->_name; }
	public function get_url(){ return $this->_url; }
	public function get_parent(){ return $this->_parent; }
	public function get_child($index){ return $this->_children[$index]; }
	public function get_children(){ return $this->_children; }
	public function get_body_id(){ return $this->_body_id; }
	public function get_type(){ return $this->_type; }
	
	public function set_name($name){ $this->_name = $name; }
	public function set_url($url){ $this->_url = $url; }
	public function set_parent($parent){ $this->_parent = $parent; }
	public function set_children($children){ $this->_children = $children; }
	public function set_body_id($body_id){ $this->_body_id = $body_id; }
	public function set_type($type){ $this->_type = $type; }
}
?>