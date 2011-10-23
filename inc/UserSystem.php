<?php

include_once DOC_ROOT . 'inc/Database.php';
include_once DOC_ROOT . 'inc/Hash.php';
class UserSystem{
	private $database;
	
	public function __construct(){
		$this->database = new Database();
	}
	public function add_user($username, $password){
		$this->database->connect('localhost', 'lite_plate', 'lite_plate');
		$username = Database::sanitize_string($username);
		$password = Database::sanitize_string($password);
		if($this->find_user($username)){
			return false;
		}
		$salt = Hash::unique_salt();
		$password = Hash::hash_string_salt($password, $salt);
		$result = $this->database->query("INSERT INTO lite_plate.users (username,password,salt) VALUES ('$username','$password','$salt')");
		$this->database->disconnect();
		if(!$result){
			return false;
		}
		else{
			return true;
		}
	}
	public function find_user($username){
		$this->database->connect('localhost', 'lite_plate', 'lite_plate');
		$username = Database::sanitize_string($username);
		$result = $this->database->query("SELECT username FROM lite_plate.users WHERE username ='" . $username . "' LIMIT 1");
		$this->database->disconnect();
		$row_count = mysql_numrows($result);
		$row = mysql_fetch_array($result);
		if($row_count == 0){ return false; }
		else return ($row_count == 1) && strcasecmp($row['username'], $username) == 0;
	}
	public function verify_user($username, $password){
		$this->database->connect('localhost', 'lite_plate', 'lite_plate');
		$username = Database::sanitize_string($username);
		$password = Database::sanitize_string($password);
		$result = $this->database->query("SELECT password FROM lite_plate.users WHERE username ='" . $username . "' LIMIT 1");
		$this->database->disconnect();
		$row_count = mysql_numrows($result);
		$row = mysql_fetch_array($result);
		if($row_count > 0){
			return Hash::check_password($row['password'], $password);
		}
		else return false;
	}
	public function attempt_login(){
		$this->database->connect('localhost', 'lite_plate', 'lite_plate');
		$email = Database::sanitize_string($_POST['login_email_input']);
		$password = Database::sanitize_string($_POST['login_password_input']);
		$this->database->disconnect();
		if(!filter_var($email, FILTER_VALIDATE_EMAIL) && strcasecmp($email, 'admin') != 0){
			?>
			<h2>Thats not how you do it!</h2>
			<p>
				The email address you entered isn't in the right format.
				<br>
				Would you like to <a href="<?php echo WEB_ROOT . 'login/' ?>" title="Try to sign in again?">try again</a>?
			</p>		
			<?php
		}
		else if(strlen(trim($_POST['login_email_input'])) == 0){
			?>
			<h2>You're doing it wrong!</h2>
			<p>
				We can't log you in if you don't enter you email address!
				<br>
				Would you like to <a href="<?php echo WEB_ROOT . 'login/' ?>" title="Try to sign in again?">try again</a>?
			</p>		
			<?php
		}
		else if($this->find_user($_POST['login_email_input'])){
			if($this->verify_user($_POST['login_email_input'], $_POST['login_password_input'])){
				self::redirect(0, WEB_ROOT . 'blog/');
				return true;
			}
			else{
				?>
				<h2>Oh no! Something went wrong!</h2>
				<p>
					The password you entered does not match any registered user account.
					<br>
					Would you like to <a href="<?php echo WEB_ROOT . 'login/' ?>" title="Try to sign in again?">try again</a>?
				</p>		
				<?php
				return false;
			}
		}
		else{
			?>
			<h2>Sorry an error occured!</h2>
			<p>
				None of our registered accounts match the email address you entered.
				<br>
				Would you like to <a href="<?php echo WEB_ROOT . 'login/' ?>" title="Try to sign in again?">try again</a>?
			</p>
			<?php
			return false;
		}
	}
	public static function is_logged_in(){
		if(!empty($_SESSION)){
			return $_SESSION['logged_in'] == 1;
		}
		else return false;
	}
	public static function login_user($username){
		$this->database->connect('localhost', 'lite_plate', 'lite_plate');
		$username = Database::sanitize_string($username);
		$this->database->disconnect();
		$_SESSION['logged_in'] = 1;
		$_SESSION['user'] = $username;
	}
	public static function logout_user(){
		if(!empty($_SESSION) && $_SESSION['logged_in'] == 1){
			$_SESSION['logged_in'] = 0;
			$_SESSION['user'] = null;
			session_unset();
			session_destroy();
			return true;
		}
		else{
			return false;
		}
	}
	public static function redirect($wait_time, $url){
		header('Refresh: ' . $wait_time . '; URL=' . $url);
	}
}
?>