<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	
	<title>{page_title}</title>
	
	<?php $this->mobile->load(); ?>
	
	<link href="<?=base_url()?>static/default.style.css?v=<?=rand()?>" rel="stylesheet" />
	
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-touch-fullscreen" content="yes" />
	
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
</head>

<body data-base-url="<?=base_url()?>">

<div data-role="page" data-theme="{global_theme}"> 

	{header}
	
	{navbar}
	
	<div data-role="content" data-theme="{global_theme}">
	
		<?php $this->load->view($view); ?>
		
	</div>
		
	{footer}
	
</div>

</body>
</html>
