<?php
include_once DOC_ROOT . 'inc/Database.php';
include_once DOC_ROOT . 'inc/BlogEntry.php';
class Blog{
	private $_entry_list;
	private $_month = array ('January','February','March','April','May','June','July','August','September','October','November','December');
	private $_entries_per_month = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
	
	public function __construct(&$database){
		$this->_entry_list = array();
		$database->connect('localhost', 'lite_plate', 'lite_plate');
		$result = $database->query("SELECT id, title, date, entry FROM lite_plate.blog_entries ORDER BY id DESC");
		$i = 0;
		while($row = mysql_fetch_array($result)){
			$this->_entry_list[$i] = new BlogEntry($row['title'], $row['date'], $row['entry']);
			$i++;
		}
		for($i=0;$i < count($this->_entry_list);$i++){
			for($j=0;$j < count($this->_month);$j++){
				$pos = strpos($this->_entry_list[$i]->get_date(), $this->_month[$j]);
				if($pos === false){
					//string needle NOT found in haystack
				}
				else{
					$this->_entries_per_month[$j]++;
				}
			}
		}
	}
	public function __destruct(){
		$this->delete__entry_list();
		unset($this->_entry_list, $this->_month, $this->_entries_per_month);
	}
	
	public function display(&$database){
		if(empty($_GET['node2'])){
			$this->display_all_entries();
		}
		else if(!empty($_GET['node2']) && strcasecmp($_GET['node2'], 'archive') != 0){
			$database->connect('localhost', 'lite_plate', 'lite_plate');
			$node2 = $_GET['node2'];
			Database::sanitize_string($node2);
			$title = str_replace("-", " ", $node2);
			if($this->string_is_title($title)){			
				$this->display_entry_by_title($node2);
			}
			else{
				echo 'Error 404!';
			}
		}
		else{
			?>
			<h2>Blog Archives</h2>
			<?php
			if(!empty($_GET['node3'])){
				$database->connect('localhost', 'lite_plate', 'lite_plate');
				$node3 = $_GET['node3'];
				Database::sanitize_string($node3);
				if($this->string_is_month($node3)){
					$this->display_archive_by_month($node3);
				}
				else{
					echo 'Error 404!';
				}
			}
			else{
				$this->display_archive();
			}
		}
	}
	public function display_all_entries($_month='all'){
		for($i=0;$i < count($this->_entry_list);$i++){
			if(strcasecmp($_month, 'all') == 0){
				echo $this->_entry_list[$i];
			}
		}
	}
	public function display_entry_by_title($title){
		for($i=0;$i < count($this->_entry_list);$i++){
			if(strcasecmp($this->_entry_list[$i]->get_url_title(), $title) == 0){
				$this->_entry_list[$i]->to_string_full();		
			}
		}
	}
	public function display_recent_entries($entry_count=5){
		?><h3><a href="<?php echo WEB_ROOT . 'blog/'; ?>" title="Read recent entries from our blog!">Recent Blog Entries</a></h3>
		<ul class="subcontent_ul serif"><?php
		for($i=0;$i < $entry_count;$i++){
			?>
			<li><a href="<?php echo WEB_ROOT . 'blog/' . $this->_entry_list[$i]->get_url_title() . '/'; ?>" title="<?php echo $this->_entry_list[$i]->get_title(); ?>"><?php echo $this->_entry_list[$i]->get_title(); ?></a>
			<?php
		}
	}
	public function display_archive(){
		for($j=0;$j < count($this->_entries_per_month);$j++){
			if($this->_entries_per_month[$j] > 0){
				?>
				<h3><a href="<?php echo WEB_ROOT . 'blog/archive/' . lcfirst($this->_month[$j]); ?>" title="Blog Archives for <?php echo $this->_month[$j]; ?>"><?php echo $this->_month[$j]; ?></a></h3>
				<ul class="subcontent_ul sans">				
				<?php
				for($i=count($this->_entry_list)-1;$i >= 0;$i--){
					$pos = strpos($this->_entry_list[$i]->get_date(), $this->_month[$j]);
					if($pos === false){
						//string needle NOT found in haystack
					}
					else{
						?>
						<li>
							<a href="http://localhost/blog/<?php echo $this->_entry_list[$i]->get_url_title(); ?>/" title="<?php echo $this->_entry_list[$i]->get_title(); ?>"><?php echo $this->_entry_list[$i]->get_title(); ?></a>
							<strong class="serif"><?php echo $this->_entry_list[$i]->get_date(); ?></strong>
						</li>
						<?php
					}
				}
				?>
				</ul>
				<?php
			}
		}
	}
	public function display_archive_by_month($month){
		?>
		<h3><?php echo ucfirst($month); ?></h3>
		<ul class="subcontent_ul sans">
		<?php
		for($i=count($this->_entry_list)-1;$i >= 0;$i--){
			$pos = strpos(strtolower($this->_entry_list[$i]->get_date()), $month);
			if($pos === false){
				//string needle NOT found in haystack
			}
			else{
				?>				
				<li>
					<a href="http://localhost/blog/<?php echo $this->_entry_list[$i]->get_url_title(); ?>/" title="<?php echo $this->_entry_list[$i]->get_title(); ?>"><?php echo $this->_entry_list[$i]->get_title(); ?></a>
					<strong class="serif"><?php echo $this->_entry_list[$i]->get_date(); ?></strong>
				</li>
				<?php
			}
		}
		?>
		</ul>
		<?php
	}
	public function display_archive_compact(){
		?><h3><a href="http://localhost/blog/archive/" title="Find older entries in our Archives">Blog Archives</a></h3>
		<ul class="subcontent_ul serif"><?php
		for($i=0;$i < count($this->_entries_per_month);$i++){
			if($this->_entries_per_month[$i] > 0){
				?>
				<li><a href="<?php echo WEB_ROOT . 'blog/archive/' . lcfirst($this->_month[$i]) . '/'; ?>" title="<?php echo $this->_entry_list[$i]->get_title(); ?>"><?php echo ucfirst($this->_month[$i]); ?> (<?php echo $this->_entries_per_month[$i]; ?>)</a></li>
				<?php
			}
		}
		?>
		</ul>
		<?php
	}
	
	public function string_is_title($string){
		$match_count = 0;
		for($i=0;$i < count($this->_entry_list);$i++){
			if(strcmp($this->_entry_list[$i]->get_title(), $string) == 0){
				$match_count++;
			}			
		}
		if($match_count > 0){
			return true;
		}
		else{
			return false;
		}
	}
	public function string_is_month($string){
		$match_count = 0;
		for($i=0;$i < count($this->_month);$i++){
			if(strcmp(lcfirst($this->_month[$i]), $string) == 0){
				$match_count++;
			}
		}
		if($match_count > 0){
			return true;
		}
		else{
			return false;
		}
	}
	public function delete__entry_list(){
		for($i=0;$i < count($this->_entries_per_month);$i++){
			unset($this->_entries_per_month[$i]);
		}
	}
}
?>