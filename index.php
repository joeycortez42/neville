<?php
	// Version
	define('VERSION', '0.4');
	// Configuration
	require_once('config.php');

	error_reporting(E_ALL ^ E_NOTICE);
	ini_set('error_reporting', E_ALL ^ E_NOTICE);
	ini_set("display_errors", 1);
	
	ini_set('session.use_cookies', 'On');
	ini_set('session.use_trans_sid', 'Off');
		
	session_set_cookie_params(0, '/');
	session_start();
	session_name(SESSION_NAME);
	session_save_path(DIR_ROOT . 'sessions');
	
	// Engine
	foreach (glob(DIR_ROOT . 'library/*.php') as $file) {
		require_once($file);
    }
	
	// Registry
	$registry = new Registry();
	
	// Loader
	$loader = new Loader($registry);
	$registry->set('load', $loader);
	
	// Database 
	$db = new db();
	$registry->set('db', $db);

	// Url
	$url = new Url(HTTP_SERVER, HTTP_SERVER ? HTTP_SERVER : HTTP_SERVER);	
	$registry->set('url', $url);
	
	// Request
	$request = new Request();
	$registry->set('request', $request);
	
	// Response
	$response = new Response();
	$response->addHeader('Content-Type: text/html; charset=utf-8');
	$registry->set('response', $response); 
	
	// Session
	$session = new Session();
	$registry->set('session', $session);

	// Document
	$registry->set('document', new Document()); 
	
	// Login
	$registry->set('user', new User($registry));
	
	// Front Controller 
	$controller = new Front($registry);
	
	// Router
	if (isset($request->get['route'])) {
		$route = new Route($request->get['route']);
	} else {
		$route = new Route('common/home');
	}
	
	// Dispatch
	$controller->dispatch($route, new Route('error/not_found'));

	// Output
	$response->output();
?>