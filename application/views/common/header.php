<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="generator" content="Neville <?php echo VERSION;?>" />
		<meta http-equiv="keywords" content="<?php echo $keywords;?>" />
		<meta http-equiv="description" content="<?php echo $description;?>" />
		<base href="<?php echo HTTP_SERVER;?>">
		<title><?php echo $title;?></title>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,500,700">
<?php
	if ($styles) {
		foreach ($styles as $style) {
?>
		<link rel="<?php echo $style['rel']; ?>" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
<?php
		}
	}
?>
		<script async defer src="https://buttons.github.io/buttons.js"></script>
	</head>
<body class="<?php echo $class; ?>">
