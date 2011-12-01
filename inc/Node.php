<?php
class Node
{
	private $_name;
	private $_rank;
	private $_url;
	private $_type;
	private $_page_name;
	private $_children;
	private $_page;
	
	/* CONSTRUCTOR */
	public function __construct($name='NULL', $rank=0, $url=WEB_ROOT, $page_name='', $type='menu', $children=NULL, $page=NULL){
		$this->_name = $name;
		$this->_rank = $rank;
		$this->_url = $url;
		$this->_page_name = $page_name;
		$this->_type = $type;
		$this->_children = $children;
		$this->_page = $page;
	}
	
	/* MAGIC FUNCTIONS */
	public function __toString(){
		if($this->_children != NULL){
			$output =  '<li><a href="' . $this->_url . '">' . $this->_name . '</a>';
			foreach($this->_children as $key => $current_node){
				$output .= '<ul>' . $this->_children[$key] . '</ul>';
			}
			return $output . '</li>';
		}
		else{
			return '<li><a href="' . $this->_url . '">' . $this->_name . '</a></li>';
		}
		
	}
	public function output($type='menu', $user_status='logged_out'){
		$output = $class = '';
		$i = 0;
		foreach($this->_children as $key => $current_node){
			if(strcasecmp($this->_children[$key]->_type, $type) == 0){
				if($i == 1 && strcasecmp($this->_children[$key]->_type, $user_status) == 0){
					$class = ' class="last-child"';
				}
				$output .= '<li' . $class . '><a href="' . $this->_children[$key]->get_url() . '" class="menu_' . $this->_children[$key]->get_page_name() . '">' . $this->_children[$key]->get_name() . '</a></li>';
				$i++;
			}
		}
		return $output;		
	}
	public function output_compact(){
		$output =  '';
		foreach($this->_children as $key => $current_node){
			if(strcasecmp($this->_children[$key]->_type, 'menu') == 0){
				$output .= '<li><a href="' . $this->_children[$key]->get_url() . '">' . $this->_children[$key]->get_name() . '</a></li>';
			}
		}
		return $output;		
	}
	public function output_accordion(){
		for($i=0; $i < count($this->_children); $i++){
			if(strcasecmp($this->_children[$i]->get_type(), 'menu') == 0){
				?>
				<h3 class="cursor_pointer"><?php echo $this->_children[$i]->get_name() ?></h3>
				<div class="edit_page_container">
					<form>
						<label class="sans cursor_pointer edit_page_label">
							<strong>Page Title</strong>
							<input type="text" value="<?php #echo $this->_children[$i]->get_title() ?>">
						</label>
						<label class="sans cursor_pointer edit_page_label">
							<strong>Page Main Content</strong>
							<textarea><?php #echo $this->_children[$i]->get_title() ?></textarea>
						</label>
					</form>
				</div>
				<?php
			}
		}
	}
	
	/* HELPER FUNCTIONS */
	public function insert_child(&$node){
		if($this->_children == NULL){
			$this->_children = array();
		}
		if(is_array($node)){
			foreach($node as $key => $current_node){
				$this->_children[$key] = $current_node;
			}
		}
		else{
			array_push($this->_children, $node);
		}
	}
	public function remove_child($node){
		//todo
	}

	/* GET FUNCTIONS */
	public function get_name(){ return $this->_name; }
	public function get_rank(){ return $this->_rank; }
	public function get_url(){ return $this->_url; }
	public function get_type(){ return $this->_type; }
	public function get_page_name(){ return $this->_page_name; }
	public function get_children($node_name=NULL){
		if($node_name == NULL){
			return $this->_children;
		}
		return $this->_children[$node_name];
	}
	public function get_page(){ return $this->_page; }

	/* SET FUNCTIONS */
	public function set_name($name){ $this->_name = $name; }
	public function set_rank($rank){ $this->_rank = $rank; }
	public function set_type($type){ $this->_type = $type; }
	public function set_children($children){ $this->_children = $children; }
	public function set_page($page){ $this->_page = $page; }
}
?>