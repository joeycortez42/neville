<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="UTF-8">
		<meta name="language" content="en-us" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title;?></title>
		<!--<base href="<?=HTTP_SERVER;?>">-->
		<meta name="generator" content="Neville <?php echo VERSION;?>" />
		<meta http-equiv="keywords" content="<?php echo $keywords;?>" />
		<meta http-equiv="description" content="<?php echo $description;?>" />
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Neville CSS -->
		<link rel="stylesheet" href="css/neville.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,500,700">
<?php if ($styles) foreach ($styles as $style) { ?>
		<link rel="<?php echo $style['rel']; ?>" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
	</head>
<body>
	<div class="site-wrapper">
		<div class="site-wrapper-inner">