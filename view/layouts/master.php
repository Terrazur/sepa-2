<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link href='https://fonts.googleapis.com/css?family=Jura' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="assets/css/master.css">
	<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
	<?php
		if (function_exists('css')) {
			css();
		}
	?>
</head>
<body>
	<?php
		if (function_exists('nav')) {
			nav();
		}
		if (function_exists('content')) {
			content();
		}
		if (function_exists('footer')) {
			footer();
		}
	?>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/master.js"></script>
	<?php
		if (function_exists('js')) {
			js();
		}
	?>
</body>
</html>