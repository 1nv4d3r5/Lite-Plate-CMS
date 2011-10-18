<?php
include_once '/var/www/inc/constants.php';
include_once DOC_ROOT . 'inc/Page.php';
include_once DOC_ROOT . 'inc/Tree.php';
include_once DOC_ROOT . 'inc/Database.php';
include_once DOC_ROOT . 'inc/Blog.php';

class GlobalController
{
	private $_database;
	private $_tree;
	private $_root;
	private $_page;
	private $_node_list;
	private $_blog;
	
	public function __construct(){
		$this->_database = new Database();
		$this->_tree = new Tree();
		$this->_root = $this->_tree->get_root();
		$this->connect_to_db();
		$this->_node_list = $this->fetch_nodes(1);
		$this->get_root()->add_children($this->_node_list);
		$this->_page = new Page($this->guess_page_title() , $this->get_tree(), $this->fetch_content(1));
		$this->_blog = new Blog();
	}
	public function __destruct(){
		$this->_database->disconnect();
		$this->delete_node_list();
		unset($this->_database, $this->_tree, $this->_root, $this->_page, $this->_node_list, $this->_blog);
	}
	
	public function display(){
		include_once DOC_ROOT . 'inc/template.php';
	}
	public function fetch_nodes($node_level){
		$result = $this->_database->query('SELECT name, url, body_id, type FROM lite_plate.node_' . $node_level);
		$i = 0;
		while($row = mysql_fetch_array($result)){
			$output_array[$i] = new Node($row['name'], $row['url']);
			$output_array[$i]->set_body_id($row['body_id']);
			$output_array[$i]->set_type($row['type']);
			$i++;
		}
		return $output_array;
	}
	public function delete_node_list(){
		for($i=0;$i < count($this->_node_list);$i++){
			unset($this->_node_list[$i]);
		}
	}
	public function fetch_content($node_level){
		$result = $this->_database->query('SELECT content, subcontent, page FROM lite_plate.node_' . $node_level . '_content');
		if(!empty($_GET['node1'])){
			$node1 = Database::sanitize_string($_GET['node1']);
		}
		else{
			$node1 = 'home';
		}
		while($row = mysql_fetch_array($result)){
			if(strcasecmp($row['page'], $node1) == 0){
				return array('left_column' => $row['content'], 'right_column' => $row['subcontent']);
			}
		}
	}
	public function guess_body_id(){
		$this->connect_to_db();
		if(!empty($_GET['node1'])){
			echo ' id="' . Database::sanitize_string($_GET['node1']) . '"';
		}
		else{
			echo ' id="home"';
		}
	}
	public function guess_page_title(){
		if(!empty($_GET['node1'])){
			$node1 = Database::sanitize_string($_GET['node1']);
		}
		else{
			$node1 = 'home';
		}
		for($i=0;$i < count($this->_node_list);$i++){
			if(strcasecmp($this->_node_list[$i]->get_body_id(), $node1) == 0){
				return $this->_node_list[$i]->get_name() . ' | Lite Plate';
			}
		}
	}
	
	public function print_root_links(){
		echo $this->get_root()->print_children_compact();
	}
	
	public function connect_to_db(){
		$this->_database->connect('localhost', 'lite_plate', 'lite_plate');
	}
	public function get_database(){ return $this->_database; }
	public function get_tree(){ return $this->_tree; }
	public function get_root(){ return $this->_root; }
	public function get_page(){ return $this->_page; }
	public function get_blog(){ return $this->_blog; }
}
?>