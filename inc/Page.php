<?php
include_once(DOC_ROOT . 'inc/Database.php');
include_once(DOC_ROOT . 'inc/Blog.php');
class Page{
    private $database;
	private $title;
    private $body_id;
	private $content;
    private $script_filepath;
	
    public function __construct($title='', $body_id='', $content_filepath='', $subcontent_filepath='', $script_filepath=''){
        $this->database = new Database();
		$this->title = $title . ' | Lite Plate';
		session_start();
		if(substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')){
			ob_start("ob_gzhandler");
		}
		else{
			ob_start();
		}
		$expire = "Expires: " . gmdate ("D, d M Y H:i:s", time() + 345600) . " GMT";
		header ($expire);
		header ('Content-type: text/html; charset=utf-8');
		if(strcasecmp($content_filepath, '') == 0){
			if(!empty($_GET['node1'])){
				$this->body_id = $this->get_bodyid();
				$this->database->connect('localhost', 'lite_plate', 'lite_plate');
				$this->content = $this->get_content($this->database->sanitize_string($_GET['node1']));
			}
			else if(strcasecmp($body_id, 'home') == 0){
				$this->body_id = ' id="home"';
				$this->content = $this->get_content('home');
			}
			if(!$this->content){
				$error_404 = array('title' => '404 Error', 'left_column' => '<h2>404 File Not Found</h2><p>Sorry but we can\'t find that page anywhere around here.</p>', 'right_column' => '', 'footer' => '');
				$this->body_id = null;
				$this->content = $error_404;
				Page::http_status(404);
			}
		}
		else{
			if(file_exists(DOC_ROOT . $content_filepath)){
			    $left_column = file_get_contents(DOC_ROOT . $content_filepath);
			    if(file_exists(DOC_ROOT . $subcontent_filepath)){
				$right_column = file_get_contents(DOC_ROOT . $content_filepath);
				$this->content = array(
				'title' => $title,
				'left_column' => file_get_contents(DOC_ROOT . $content_filepath),
				'right_column' => file_get_contents(DOC_ROOT . $subcontent_filepath),
				'footer' => '',
				'script_filepath' => $script_filepath
				);
			    }
			    else{
				$this->content = array(
				'title' => $title,
				'left_column' => file_get_contents(DOC_ROOT . $content_filepath),
				'right_column' => '',
				'footer' => '',
				'script_filepath' => $script_filepath
				);
			    }
			}
			else{
			    $this->content = array(
				    'title' => $title,
				    'left_column' => $content_filepath,
				    'right_column' => $subcontent_filepath,
				    'footer' => '',
				    'script_filepath' => $script_filepath
			    );
			}
		}
    }
    public function display(){										
		include(DOC_ROOT . 'inc/template.php');
    }
    public function get_content($page){
		$this->database->connect('localhost', 'lite_plate', 'lite_plate');
		$result = $this->database->query("SELECT title, left_column, right_column, footer, script_filepath FROM lite_plate.node1_content WHERE page='$page'");
		$this->database->disconnect();
		if(!$result){
			return false;
		}
		$content = mysql_fetch_array($result);
		return $content;
    }
	public function get_bodyid(){
		if(!empty($_GET['node1'])){
			$this->database->connect('localhost', 'lite_plate', 'lite_plate');
			$node1 = $this->database->sanitize_string($_GET['node1']);
			$result = $this->database->query("SELECT body_id FROM lite_plate.node1_links WHERE body_id='$node1'");
			$this->database->disconnect();
			$row = mysql_fetch_array($result);
			if(isset($row['body_id'])){
				return ' id="' . $row['body_id'] . '"';
			}
		}
		else if(strcasecmp($this->body_id, 'home') == 0){
			return ' id="home"';
		}
	}
	public function get_navigation(){
		if(!empty($_GET['node1'])){
		    $this->database->connect('localhost', 'lite_plate', 'lite_plate');
		    $node1 = Database::sanitize_string($_GET['node1']);
		    $this->database->disconnect();
		}
		else{ $node1 = 'home'; }
		$this->database->connect('localhost', 'lite_plate', 'lite_plate');
		$result = $this->database->query('SELECT name, path, title, body_id FROM lite_plate.node1_links;');
		$this->database->disconnect();
		while($row = mysql_fetch_array($result)){
			?><li><a href="<?php echo WEB_ROOT . $row['path']; ?>" title="<?php
			echo $row['title']; ?>"<?php
			if(strcasecmp($row['body_id'], $node1) == 0 && $this->body_id != null){
				echo ' class="navigation_' . $row['body_id'] . '"';
			}
			?>><?php echo $row['name']; ?></a></li>
			<?php
		}
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
	public static function send_email($to, $from, $subject, $message){
		if(filter_var($from, FILTER_VALIDATE_EMAIL)){
			//$clean_array = array($to, $from, $subject, $message);
			//$clean_array = self::sanitize_strings($clean_array);
			$to = Database::sanitize_string($to);
			$from = Database::sanitize_string($from);
			$subject = Database::sanitize_string($subject);
			$message = Database::sanitize_string($message);
			$from = filter_var($from,FILTER_SANITIZE_EMAIL);
			mail($to, $from, $subject, $message);
			return true;
		}
		else{
			return false;
		}
	}
	public function send_email_validated(){
	    if(!empty($_POST['email_input'])){
		$this->database->connect('localhost', 'lite_plate', 'lite_plate');
		$email = Database::sanitize_string($_POST['email_input']);
		$this->database->disconnect();
		if(strlen(trim($email)) == 0 || strcasecmp($email, 'Your Email') == 0){
		?>
		<h2>Sorry an error has occurred</h2>
		<p>
			You forgot to enter your email address. We can't reply to your email
			if you don't leave a return address! Would you like to <a href="<?php echo WEB_ROOT . 'contact/'; ?>">try again</a>?		
		</p>
		<?php
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			?>
			<h2>Sorry an error has occurred</h2>
			<p>
				The email address you entered does not fit the correct format. Would you like
				to <a href="<?php echo WEB_ROOT . 'contact/'; ?>" title="Would you like to try sending your message again?">try again</a>?		
			</p>
			<?php
		}
		else{
			//email is ok for sending; proceed to check message
			if(!empty($_POST['message_input'])){
				$this->database->connect('localhost', 'lite_plate', 'lite_plate');
				$message = Database::sanitize_string($_POST['message_input']);
				if(strlen(trim($message)) == 0 || strcasecmp($message, 'Ask us anything!') == 0){
					?>
					<h2>Sorry an error has occurred</h2>
					<p>
						You forgot to enter your message. We want to here from you please write us a message! Would you like
						to <a href="<?php echo WEB_ROOT . 'contact/'; ?>" title="Would you like to try sending your message again?">try again</a>?		
					</p>			
					<?php
				}
				else{
					//everything is ok to send; proceed to send message
					Page::send_email('questions@localhost.net', $email, 'Message from lite_plate contact form', $message);
					?>
					<h2>Message sent successfully</h2>
					<p>
						Thanks for sending us your message, we'll be in touch with you shortly. Would
						you like to <a href="<?php echo WEB_ROOT; ?>" title="Would you like to return home?">return home</a>?
					</p>
					<?php
				}
				$this->database->disconnect();
			}
		}
	}
	    
	    
	    
	    
	}
}
?>
