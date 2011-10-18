<?php
include_once DOC_ROOT . 'inc/Database.php';
include_once DOC_ROOT . 'inc/BlogEntry.php';
class Blog{
	private $database;
	private $entry_list;
	private $month = array ('January','February','March','April','May','June','July','August','September','October','November','December');
	private $entries_per_month = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
	public function __construct(){
		$this->database = new Database();
		$this->entry_list = array();
		$this->database->connect('localhost', 'lite_plate', 'lite_plate');
		$result = $this->database->query("SELECT id, title, date, entry FROM lite_plate.blog_entries ORDER BY id DESC");
		$this->database->disconnect();
		$i = 0;
		while($row = mysql_fetch_array($result)){
			$this->entry_list[$i] = new BlogEntry($row['title'], $row['date'], $row['entry']);
			$i++;
		}
		for($i=0;$i < count($this->entry_list);$i++){
			for($j=0;$j < count($this->month);$j++){
				$pos = strpos($this->entry_list[$i]->get_date(), $this->month[$j]);
				if($pos === false){
					//string needle NOT found in haystack
				}
				else{
					$this->entries_per_month[$j]++;
				}
			}
		}
	}
	public function __destruct(){
		$this->delete_entry_list();
		unset($this->database, $this->entry_list, $this->month, $this->entries_per_month);
	}
	
	public function display(){
		if(empty($_GET['node2'])){
			$this->display_all_entries();
		}
		else if(!empty($_GET['node2']) && strcasecmp($_GET['node2'], 'archive') != 0){
			$node2 = Database::sanitize_string($_GET['node2']);
			$this->display_entry_by_title($node2);
		}
		else{
			?>
			<h2>Blog Archives</h2>
			<?php
			if(!empty($_GET['node3'])){
				$node3 = Database::sanitize_string($_GET['node3']);
				$this->display_archive_by_month($node3);
			}
			else{
				$this->display_archive();
			}
		}
	}
	public function display_all_entries($month='all'){
		for($i=0;$i < count($this->entry_list);$i++){
			if(strcasecmp($month, 'all') == 0){
				echo $this->entry_list[$i];
			}
		}
	}
	public function display_entry_by_title($title){
		for($i=0;$i < count($this->entry_list);$i++){
			$url_title = str_replace(" ", "-", $this->entry_list[$i]->get_title());
			if(strcasecmp($url_title, $title) == 0){
				$this->entry_list[$i]->to_string_full();		
			}
		}
	}
	public function display_recent_entries($entry_count=5){
		?><h3><a href="<?php echo WEB_ROOT . 'blog/'; ?>" title="Read our blog!">Recent Blog Entries</a></h3>
		<ul class="subcontent_ul"><?php
		for($i=0;$i < $entry_count;$i++){
			$url_title = str_replace(" ", "-", $this->entry_list[$i]->get_title());
				?>
				<li><a href="<?php echo WEB_ROOT . 'blog/' . $url_title . '/'; ?>" title="<?php echo $this->entry_list[$i]->get_title(); ?>"><?php echo $this->entry_list[$i]->get_title(); ?></a>
				<?php
		}
	}
	public function display_archive(){
		for($j=0;$j < count($this->entries_per_month);$j++){
			if($this->entries_per_month[$j] > 0){
				?>
				<ul class="default_ul">
				<h3><a href="<?php echo WEB_ROOT . 'blog/archive/' . $this->month[$j]; ?>" title="Blog Archives for <?php echo $this->month[$j]; ?>"><?php echo $this->month[$j]; ?></a></h3>
				<?
				for($i=count($this->entry_list)-1;$i >= 0;$i--){
					$pos = strpos($this->entry_list[$i]->get_date(), $this->month[$j]);
					if($pos === false){
						//string needle NOT found in haystack
					}
					else{
						$url_title = str_replace(" ", "-", $this->entry_list[$i]->get_title());
						?>
							<li>&#183; <a href="http://localhost/blog/<?php echo $url_title; ?>/" title="<?php echo $this->entry_list[$i]->get_title(); ?>"><?php echo $this->entry_list[$i]->get_title(); ?></a></li>
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
		<ul class="default_ul">
		<h3><?php echo $month; ?></h3>
		<?php
		for($i=count($this->entry_list)-1;$i >= 0;$i--){
			$pos = strpos($this->entry_list[$i]->get_date(), $month);
			if($pos === false){
				//string needle NOT found in haystack
			}
			else{
				$url_title = str_replace(" ", "-", $this->entry_list[$i]->get_title());
				?>				
				<li>&#183;<a href="http://localhost/blog/<?php echo $url_title; ?>/" title="<?php echo $this->entry_list[$i]->get_title(); ?>"><?php echo $this->entry_list[$i]->get_title() ?></a></li>
				<?php
			}
		}
		?>
		</ul>
		<?php
	}
	public function display_archive_compact(){
		?><h3><a href="http://localhost/blog/archive/" title="Find older entries in our Archives">Blog Archives</a></h3>
		<ul class="subcontent_ul"><?php
		for($i=0;$i < count($this->entries_per_month);$i++){
			if($this->entries_per_month[$i] > 0){
				?>
				<li><a href="<?php echo WEB_ROOT . 'blog/archive/' . $this->month[$i] . '/'; ?>" title="<?php echo $this->entry_list[$i]->get_title(); ?>"><?php echo $this->month[$i]; ?> (<?php echo $this->entries_per_month[$i]; ?>)</a></li>
				<?php
			}
		}
		?>
		</ul>
		<?php
	}
	
	public function delete_entry_list(){
		for($i=0;$i < count($this->entries_per_month);$i++){
			unset($this->entries_per_month[$i]);
		}
	}
}
?>