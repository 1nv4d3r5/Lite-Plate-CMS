<?php
include_once '/var/www/inc/constants.php';
include_once DOC_ROOT . 'inc/Page.php';
include_once DOC_ROOT . 'inc/Tree.php';
include_once DOC_ROOT . 'inc/Database.php';
include_once DOC_ROOT . 'inc/Blog.php';

class GlobalController{
	private $_database;
	private $_tree;
	private $_root;
	private $_page;
	private $_body_id;
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
		$node1 = $this->get_node1();
		if(!$this->page_exists($node1)){
			$this->error_404();
			return;
		}
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
		$result = $this->_database->query('SELECT content, subcontent, script_url, page FROM lite_plate.node_' . $node_level . '_content');
		$node1 = $this->get_node1();
		while($row = mysql_fetch_array($result)){
			if(strcasecmp($row['page'], $node1) == 0){
				return array(
					'left_column' => $row['content'],
					'right_column' => $row['subcontent'],
					'script_url' => $row['script_url']
				);
			}
		}
	}
	public function guess_body_id(){
		if(!empty($this->_body_id)){
			echo ' id="' . $this->_body_id . '"';
		}
		else{
			$this->connect_to_db();
			$node1 = $this->get_node1();
			echo ' id="' . $node1 . '"';
		}
	}
	public function guess_page_title(){
		$node1 = $this->get_node1();
		for($i=0;$i < count($this->_node_list);$i++){
			if(strcasecmp($this->_node_list[$i]->get_body_id(), $node1) == 0){
				return $this->_node_list[$i]->get_name() . ' | Lite Plate';
			}
		}
	}
	public function page_exists($page_name){
		for($i=0;$i < count($this->_node_list);$i++){
			if(strcmp($this->_node_list[$i]->get_body_id(), $page_name) == 0){
				return true;
			}
		}
		return false;
	}

	
	public function error_403(){
		$this->_page = new Page('403 Error' , $this->get_tree(), $this->fetch_http_error_content(403));	
		$this->set_body_id('403');
		self::http_status(403);
	}
	public function error_404(){
		$this->_page = new Page('404 Error' , $this->get_tree(), $this->fetch_http_error_content(404));
		$this->set_body_id('404');
		self::http_status(404);
	}
	public function error_500(){
		$this->_page = new Page('500 Error' , $this->get_tree(), $this->fetch_http_error_content(500));	
		$this->set_body_id('500');
		self::http_status(500);
	}
	public function fetch_http_error_content($error_code){
		$result = $this->_database->query('SELECT content, subcontent, script_url, page FROM lite_plate.node_1_content WHERE page=' . $error_code . ' LIMIT 1');
		$row = mysql_fetch_array($result);
		return array(
			'left_column' => $row['content'],
			'right_column' => $row['subcontent'],
			'script_url' => $row['script_url']
		);
		
	}
	public static function http_status($error_code){
		switch($error_code){
			case 200: {
				header('HTTP/1.1 200 OK');
			} break;
			case 403: {
				header('HTTP/1.1 403 Forbidden');
			} break;
			case 404: {
				header('HTTP/1.1 404 Not Found');
			} break;
			case 500: {
				header('HTTP/1.1 500 Internal Server Error');
			} break;
			default: break;
		}
	}
	public static function redirect($wait_time, $url){
		header('Refresh: ' . $wait_time . '; URL=' . $url);
	}
	public function get_node1(){
		if(!empty($_GET['node1'])){
			return Database::sanitize_string($_GET['node1']);
		}
		else{
			return 'home';
		}
	}
	public function connect_to_db(){
		$this->_database->connect('localhost', 'lite_plate', 'lite_plate');
	}
	
	public function print_root_links(){
		echo $this->get_root()->print_children_compact();
	}
	
	public function get_database(){ return $this->_database; }
	public function get_tree(){ return $this->_tree; }
	public function get_root(){ return $this->_root; }
	public function get_page(){ return $this->_page; }
	public function get_body_id(){ return $this->_body_id; }
	public function get_node_list(){ return $this->_node_list; }
	public function get_blog(){ return $this->_blog; }
	
	public function set_body_id($body_id){ $this->_body_id = $body_id; }
}
?>