<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="generator" content="Neville <?php echo VERSION;?>" />
		<meta http-equiv="keywords" content="<?php echo $keywords;?>" />
		<meta http-equiv="description" content="<?php echo $description;?>" />
		<base href="<?php echo HTTP_SERVER;?>">
		<title><?php echo $title;?></title>
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Neville -->
		<link href="css/neville.css" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,500,700">
<?php if ($styles) foreach ($styles as $style) { ?>
		<link rel="<?php echo $style['rel']; ?>" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
	</head>
<body class="<?=$class;?>">
