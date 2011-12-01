<?php
class Database{
    private $_connection;
    
    public function query($query_string){
        $result = mysql_query($query_string, $this->_connection);
		if(!$result){
            die('Error: ' . mysql_error());					
    	}
        return $result;
    }
    public function select_database($database_name){
        mysql_selectdb($database_name, $this->_connection);
    }
    public function connect($hostname, $username, $password){
        $this->_connection = mysql_connect($hostname, $username, $password);
    }
    public function disconnect(){
        mysql_close($this->_connection);
    }
	public static function sanitize_string(&$string){
		mysql_real_escape_string($string);
		addcslashes($string, "\x00\n\r\'\x1a\x25");
	}
//	public static function sanitize_string_legacy($string){
//		$clean_string = mysql_real_escape_string($string);
//		$clean_string = addcslashes($clean_string, "\x00\n\r\'\x1a\x25");
//		return $clean_string;
//    }
}
?>