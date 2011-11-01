<?php
class BlogEntry{
	private $title;
	private $date;
	private $body;
	private $url_title;
	
	public function __construct($title, $date, $body){
		$this->title = $title;
		$this->date = $date;
		$this->body = $body;
		$this->url_title = str_replace(" ", "-", $title);
	}
	public function __toString(){
		return '<h1><a href="' . $this->url_title  . '/" title="' . $this->title . '">' . $this->title . '</a></h1>' . '<h3>' . $this->date . '</h3><p>' . strip_tags($this->word_trim($this->body, 60, TRUE)) . '</p>';
	}
	public function to_string_full(){
		echo '<h1>' . $this->title . '</h1>' . '<h3>' . $this->date . '</h3>' . $this->body/* . '</p>'*/;
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
	public function get_url_title(){
		return $this->url_title;
	}
}
?>