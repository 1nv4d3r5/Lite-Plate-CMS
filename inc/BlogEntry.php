<?php
class BlogEntry{
	private $title;
	private $date;
	private $body;
	
	public function __construct($title, $date, $body){
		$this->title = $title;
		$this->date = $date;
		$this->body = $body;
	}
	public function __toString(){
		$url_title = str_replace(" ", "-", $this->title);
		return '<h1><a href="' . $url_title  . '/" title="' . $this->title . '">' . $this->title . '</a></h1>' . '<h3>' . $this->date . '</h3><p>' . strip_tags($this->word_trim($this->body, 60, TRUE)) . '</p>';
	}
	public function to_string_full(){
		$url_title = str_replace(" ", "-", $this->title);
		echo '<h1>' . $this->title . '</h1>' . '<h3>' . $this->date . '</h3><p>' . $this->body . '</p>';
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
		return $this->title;
	}
	public function get_date(){
		return $this->date;
	}
	public function get_body(){
		return $this->body;
	}
}
?>