{doctype}
<html>
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<link rel="stylesheet" type="text/css" href="{global_style}">
<link rel="icon" type="image/png" href="{favicon}">
<title>{title}</title>
{preload_script}
</head>
<body{body_id}>
<div class="global_container">
<div class="header_container">
    <div class="row navigation_container">
    {menu}
    </div>
</div>
<div class="row body_container">
    <div class="column grid_8 content_container">
    {content}    
    </div>
    <div class="column grid_4 subcontent_container">
    {subcontent}
    </div>
</div>
<div class="footer_container">
    <div class="row">
        <div class="column grid_8">
            <div class="row">
                <?php include_once DOC_ROOT . 'inc/footer_content.php'; ?>
            </div>
            <small class="copyright">{copyright}</small>
        </div>
        <div class="column grid_4">
            <div class="return_to_top">Return To Top<strong>&#8593;</strong></div>
        </div>
    </div>
</div>
</div>
{jquery}
{include_jqueryui}
{page_script}
</body>
</html>