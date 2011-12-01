<?php
include_once DOC_ROOT . 'inc/Blog.php';
include_once DOC_ROOT . 'inc/Database.php';
include_once DOC_ROOT . 'inc/Page.php';
include_once DOC_ROOT . 'inc/Template.php';
include_once DOC_ROOT . 'inc/Tree.php';
include_once DOC_ROOT . 'inc/UserSystem.php';

class GlobalController
{
	private $_tree;
	private $_template;
	private $_page;
	private $_database;
	private $_blog;
	private $_url_vars;
	
	/* CONSTRUCTOR */
	public function __construct($do_display=AUTO_OFF){
		session_start();
		$this->db_connect();
		$this->build_tree();
		if(strcasecmp($do_display, AUTO_ON) == 0){
			Template::load('inc/default_template.php', $this->_template);
			if($this->load_page()){
				$this->parse_template();
				$this->_blog = new Blog($this->_database);
			}			
			$this->display_page();
		}
		$this->db_disconnect();
	}
	
	/* DESTRUCTOR */
	public function __destruct(){
		unset($this->_tree, $this->_template, $this->_page, $this->_database, $this->_blog);
	}
	
	public function load_page(){
		if(!empty($_GET['node1'])){
			$this->_url_vars['node1'] = $_GET['node1'];
			self::sanitize_string($this->_url_vars['node1']);
			foreach($this->_tree->get_root()->get_children() as $current_node){
				if(strcasecmp($current_node->get_page_name(), $this->_url_vars['node1']) == 0){
					$this->fetch_content($current_node, $this->_page);				//loads any page beside home page
					return true;
				}
			}
			if($this->_page == NULL){
				$this->error_404();													//loads 404 error, since no page found
				return false;
			}
		}
		else{
			$this->fetch_content($this->_tree->get_root(), $this->_page);			//loads home page
			return true;
		}
	}
	public function fetch_body_id(){
		if(!empty($_GET['node1'])){
			foreach($this->_tree->get_root()->get_children() as $current_node){
				if(strcasecmp($current_node->get_page_name(), $this->_url_vars['node1']) == 0){
					return $current_node->get_page_name();
				}
			}
		}
		else{
			return $this->_tree->get_root()->get_page_name();
		}
	}
	public function fetch_content($node, &$output_page){
		$page_name = $node->get_page_name();
		$result = $this->_database->query("SELECT title, content, subcontent, include_jqueryui, script_url FROM lite_plate.content WHERE page='$page_name' LIMIT 1");
		$row = mysql_fetch_array($result);
		$content = $row['content'];
		$subcontent = $row['subcontent'];
		$title = $row['title'];
		$include_jqueryui = FALSE;
		if(strcasecmp($row['include_jqueryui'], '1') == 0){
			$include_jqueryui = TRUE;
		}
		$script_url = $row['script_url'];
		Template::replace_title($this->_template, $title);
		$output_page = new Page($title, $content, $subcontent, $node->get_page_name(), $include_jqueryui, $script_url);
	}
	public function fetch_error_content($error_code){
		$result = $this->_database->query('SELECT content, page FROM lite_plate.error_content WHERE page=' . $error_code . ' LIMIT 1');
		$row = mysql_fetch_array($result);
		return array(
			'left_column' => $row['content'],
			'right_column' => NULL,
		);
	}
	public function build_tree(){
		$this->_tree = new Tree();
		$result = $this->_database->query('SELECT name, rank, url, type, page_name FROM lite_plate.nodes');
		while($row = mysql_fetch_array($result)){
			$this->_tree->insert_node(new Node($row['name'], $row['rank'], WEB_ROOT . $row['url'], $row['page_name'], $row['type']));
		}
	}
	public function parse_template(){
		Template::replace('doctype', DOCTYPE, $this->_template);
		Template::replace('global_style', WEB_ROOT . 'css/global_style.php', $this->_template);
		Template::replace('favicon', WEB_ROOT . 'img/favicon.php', $this->_template);
		Template::replace('preload_script', file_get_contents(DOC_ROOT . 'script/preload.php'), $this->_template);
		Template::replace('body_id', ' id="' . $this->fetch_body_id() . '"', $this->_template);	
		if(!UserSystem::is_logged_in()){
			Template::replace('menu', $this->_tree->output_as_menu(), $this->_template);
		}
		Template::replace('menu', $this->_tree->output_as_menu(TRUE), $this->_template);
		Template::replace_content($this->_template, $this->_page->get_content(), $this->_page->get_subcontent());	
		Template::replace('copyright', file_get_contents(DOC_ROOT . 'inc/copyright.txt'), $this->_template);
		Template::replace('jquery', DEFAULT_JQUERY, $this->_template);
		if($this->_page->get_include_jqueryui() == TRUE){
			Template::replace('include_jqueryui', DEFAULT_JQUERYUI, $this->_template);
		}
		$page_script = $this->_page->get_script_url();
		if(!empty($page_script)){
			Template::replace('page_script', '<script type="text/javascript" src="' . WEB_ROOT . $page_script . '"></script>', $this->_template);
		}
		Template::replace('include_jqueryui', '', $this->_template);
		Template::replace('page_script', '', $this->_template);
	}
	
	/* HELPER FUNCTIONS */
	public function display_page(){	
		header('Content-type: text/html; charset=UTF-8');
		eval('?>' . $this->_template . '<?php ');
	}
	public function db_connect(){
		if($this->_database == NULL){
			$this->_database = new Database();
		}
		$this->_database->connect('localhost', 'lite_plate', 'lite_plate');
	}
	public function db_disconnect(){
		$this->_database->disconnect();	
	}
	public static function http_status($status_code){
		switch($status_code){
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
	public function error_404(){
		$content_array = $this->fetch_error_content(404);
		$this->_page = new Page('Error 404', $content_array['left_column'], $content_array['right_column'], 'error_404');
		Template::replace('doctype', DOCTYPE, $this->_template);
		Template::replace('global_style', WEB_ROOT . 'css/global_style.php', $this->_template);
		Template::replace('favicon', WEB_ROOT . 'img/favicon.php', $this->_template);
		Template::replace('preload_script', file_get_contents(DOC_ROOT . 'script/preload.php'), $this->_template);
		Template::replace_title($this->_template, $this->_page->get_title());
		if(!UserSystem::is_logged_in()){
			Template::replace('menu', $this->_tree->output_as_menu(), $this->_template);
		}
		Template::replace('menu', $this->_tree->output_as_menu(TRUE), $this->_template);
		Template::replace_content($this->_template, $this->_page->get_content(), ' ');
		self::http_status(404);
		echo '404!';
	}
	public static function sanitize_string(&$string){
		mysql_real_escape_string($string);
		addcslashes($string, "\x00\n\r\'\x1a\x25");
	}
}
?>