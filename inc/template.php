<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" >
<link rel="stylesheet" type="text/css" href="http://localhost/css/global_style.php">
<link rel="icon" type="image/png" href="http://localhost/img/favicon.php">
<title><?php echo $this->get_page()->get_title(); ?></title>
<meta name="description" content="">
<!--[if gte IE 5]><link rel="stylesheet" type="text/css" href="http://localhost/css/ie_fixes.css"><![endif]-->
<script type="text/javascript">
function downloadJSAtOnload(){
	var element = document.createElement("script");
	element.src = "http://localhost/script/return_to_top_min.php";
	document.body.appendChild(element);
}
if(window.addEventListener){ window.addEventListener("load", downloadJSAtOnload, false); }
else if(window.attachEvent){ window.attachEvent("onload", downloadJSAtOnload); }
else{ window.onload = downloadJSAtOnload; }
</script>
</head>
<body<?php $this->guess_body_id(); ?>>
<div class="global_container">
<div class="header_container">
	<div class="row navigation_container">
		<?php echo $this->get_page()->get_main_navigation(); ?>
	</div>
</div>
<div class="row body_container">
	<div class="column grid_8 content_container">
		<?php
		$content = $this->get_page()->get_content();
		eval('?>' . $content['left_column'] . '<?php ');
		?>
	</div>
	<div class="column grid_4 subcontent_container">
		<?php eval('?>' . $content['right_column'] . '<?php '); ?>
	</div>
</div>
<div class="footer_container">
	<div class="row">
		<div class="column grid_8">
			<div class="row">
				<ul class="column grid_2 footer_list">
					<strong>Lite Plate CMS</strong>
					<?php $this->print_root_links(); ?>
				</ul>
				<ul class="column grid_2 footer_list">
					<strong>Documentation</strong>
					<li><a href="">Installing</a></li>
					<li><a href="">Configuring</a></li>
					<li><a href="">Getting Started</a></li>
					<li><a href="">Troubleshooting</a></li>
					<li><a href="">Wiki Page</a></li>
				</ul>
				<ul class="column grid_2 footer_list">
					<strong>More Info</strong>
					<li><a href="">About Light Plate</a></li>
					<li><a href="">Sitemap</a></li>
					<li><a href="">Changelog</a></li>
					<li><a href="">Source Code</a></li>
					<li><a href="">Github Repo</a></li>
				</ul>
				<ul class="column grid_2 footer_list">
					<strong>Services</strong>
					<li><a href="">Public API</a></li>
					<li><a href="">Membership</a></li>
					<li><a href="">Hosting</a></li>
					<li><a href="">Developers</a></li>	
				</ul>
			</div>
			<small class="copyright"><?php include_once DOC_ROOT . 'inc/copyright.txt'; ?></small>
		</div>
		<div class="column grid_4">
			<div class="return_to_top">Return To Top<strong>&#8593;</strong></div>
		</div>
			
	</div>
</div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<?php
if(!empty($content['script_url'])){
	?><script type="text/javascript" src="<?php echo $content['script_url']; ?>"></script><?php
}
?>
</body>
</html>