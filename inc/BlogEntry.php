<?php
class BlogEntry{
	private $_title;
	private $_date;
	private $_body;
	private $_url_title;
	
	public function __construct($title, $date, $body){
		$this->_title = $title;
		$this->_date = $date;
		$this->_body = $body;
		$this->_url_title = str_replace(" ", "-", $title);
	}
	public function __toString(){
		return '<h1><a href="' . $this->_url_title  . '/" title="' . $this->_title . '">' . $this->_title . '</a></h1>' . '<h3>' . $this->_date . '</h3><p>' . strip_tags($this->word_trim($this->_body, 60, TRUE)) . '</p>';
	}
	public function to_string_full(){
		echo '<h1>' . $this->_title . '</h1>' . '<h3>' . $this->_date . '</h3>' . $this->_body/* . '</p>'*/;
	}
	public static function word_trim($string, $word_count, $ellipsis = FALSE){
		$words = explode(' ', $string);
		if (count($words) > $word_count){
			array_splice($words, $word_count);
			$string = implode(' ', $words);
			if (is_string($ellipsis)){
				$string .= $ellipsis;
			}
			elseif ($ellipsis){
				$string .= '&#8230;';
			}
		}
		return $string;
	}
	
	public function get_title(){
		return $this->_title;
	}
	public function get_date(){
		return $this->_date;
	}
	public function get_body(){
		return $this->_body;
	}
	public function get_url_title(){
		return $this->_url_title;
	}
}
?>