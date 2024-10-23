<?php
// Configuration
if (file_exists('config.php')) {
	require_once('config.php');
} else {
	exit('Error: config.php does not exist.');
}

// Startup
if (file_exists(DIR_APP . 'system/startup.php')) {
	require_once(DIR_APP . 'system/startup.php');
} else {
	exit('Error: startup.php does not exist. What happened to Neville?!');
}
