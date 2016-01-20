<?php
	// Configuration
	if (file_exists('config.php')) {
		require_once('config.php');
	} else {
		exit('<b>Error</b>: <b>config.php</b> does not exist.');
	}

	// Startup
	if (file_exists(DIR_APP . 'system/startup.php')) {
		require_once(DIR_APP . 'system/startup.php');
	} else {
		exit('<b>Error</b>: <b>startup.php</b> does not exist.');
	}

?>