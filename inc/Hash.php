<?php
class Hash{  
	private static $_algorithm = '$2a';  
	private static $_cost = '$10';
	
	public static function unique_salt() {  
		return substr(sha1(mt_rand()),0,22);  
	}  
	public static function hash_string($password){  
		return crypt($password, '$2a$10$' . self::uniqueSalt());
	}
	public static function hash_string_salt($password, $salt){  
		return crypt($password, '$2a$10$' . self::$_cost . $salt);
	}
	public static function check_password($hash, $password){  
		$full_salt = substr($hash, 0, 29);
		$new_hash = crypt($password, $full_salt);
		return strcmp($hash, $new_hash) == 0;
	}
}
?>