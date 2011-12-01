<?php
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);
include_once '/var/www/inc/constants.php';
include_once DOC_ROOT . 'inc/GlobalController.php';
$title = 'test title';
$date = date('F d, Y');
$entry = 'fart entry';
$db = new Database();
$db->connect('localhost', 'root', 'vagina12');
$result = $db->query("INSERT INTO lite_plate.blog_entries (title, date, entry) VALUES ('$title', '$date', '$entry')");
$result = $db->query('SELECT title, date FROM lite_plate.blog_entries');
$db->disconnect();
while($row = mysql_fetch_array($result)){
	echo '<pre>' . $row['title'] . ' <b>' . $row['date'] . '</b>
	</pre>';
}
?>