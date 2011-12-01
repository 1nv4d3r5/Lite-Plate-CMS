<?php
class Template
{
	public static function load($file_path, &$output_template){
		$output_template = file_get_contents(DOC_ROOT . $file_path);
	}
	public static function output(&$template){
		eval('?>' . $template . '<?php ');	
	}
	public static function replace_content(&$template, $content, $subcontent=NULL){
		self::replace('content', $content, $template);
		if($subcontent != NULL){
			self::replace('subcontent', $subcontent, $template);
		}
	}
	public static function replace_title(&$template, $title){
		self::replace('title', $title . TITLE_SUFFIX, $template);
	}
	public static function replace($string_find, $string_replace, &$template){
		$template = str_replace('{' . $string_find . '}', $string_replace, $template);
	}
}
?>