<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" >
<link rel="stylesheet" type="text/css" href="http://localhost/css/global_style.php">
<link rel="icon" type="image/png" href="http://localhost/img/favicon.php">
<title><?php echo $this->content['title'] . ' | Lite Plate'; ?></title>
<meta name="description" content="">
<!--[if gte IE 5]><link rel="stylesheet" type="text/css" href="http://localhost/css/ie_fixes.css"><![endif]-->
</head>
<body<?php echo $this->body_id; ?>>
<div class="global_container">
<div class="header_container">
	<div class="navigation_container">
		<ul class="column grid_8 main_navigation">
			<?php Page::get_navigation(); ?>
		</ul>
		<ul class="column grid_4 login_navigation">
			<li><a href="http://localhost/login.php" title="Sign in to your account" class="first-child">Sign In</a></li>
			<li><a href="http://localhost/register.php" title="Sign up for a free user account!" class="last-child">Sign Up</a></li>
		</ul>
	</div>
</div>
<div class="row body_container">
	<div class="column grid_8 content_container">
		<?php eval('?>' . $this->content['left_column'] . '<?php '); ?>
	</div>
	<div class="column grid_4 subcontent_container">
		<?php eval('?>' . $this->content['right_column'] . '<?php '); ?>
	</div>
</div>
<div class="footer_container">
	<div class="row">
		<small class=column grid_8">
			Copyright &#169; 2011 Lite Plate CMS
			<?php echo $this->content['footer']; ?>
		</small>
	</div>
</div>
</div>
<?php
if(!empty($this->content['script_filepath'])){
	?>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo WEB_ROOT . $this->content['script_filepath']; ?>"></script>
	<?php
}
?>
</body>
</html>