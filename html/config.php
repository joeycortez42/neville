<?php
	setlocale(LC_MONETARY, 'en_US'); #Optional

	define('DOMAIN', 'neville');
	define('HTTP_SERVER', 'http://neville.blossomers.com/');
	define('DIR_APP', '/Users/nokemono42/Documents/Projects/neville/');

	define('SESSION_NAME', 'neville');

	define('DB_AUTOSTART', true);
	define('DB_TYPE', 'mysql'); // mysql or postgre
	define('DB_SERVER', 'localhost');
	define('DB_DATABASE', '');
	define('DB_USERNAME', '');
	define('DB_PASSWORD', '');
	define('DB_PORT', 3306);

	define('ROUTE_DEFAULT', 'common/home');
	define('ROUTE_ERROR', 'error/not_found');
?>
