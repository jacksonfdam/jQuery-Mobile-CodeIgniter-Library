<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	
	<title>{page_title}</title>
	
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0b2/jquery.mobile-1.0b2.min.css" />

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0b2/jquery.mobile-1.0b2.min.js"></script>
</head>

<body>

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
