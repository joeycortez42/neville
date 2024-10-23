<?php
/**
 * Neville Route Class
 *
 * @package		Neville
 * @since		0.1.0
 */
class Route {
	private $id;
	private $route;
	private $method = 'index';

	/**
	 * Constructor
	 *
	 * @param	string	$route
	 */
	public function __construct($route) {
		$this->id = $route;

		$parts = explode('/', preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route));

		// Break apart the route
		while ($parts) {
			$file = DIR_APP . 'application/controllers/' . implode('/', $parts) . '.php';

			if (is_file($file)) {
				$this->route = implode('/', $parts);

				break;
			} else {
				$this->method = array_pop($parts);
			}
		}
	}

	/**
	 * Get route id
	 *
	 * @return	string
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Execute routing
	 *
	 * @param	object	$registry
	 * @param	array	$args
	 *
	 * @return	array
	 */
	public function execute($registry, array $args = array()) {
		// Stop any magical methods being called
		if (substr($this->method, 0, 2) == '__') {
			return new \Exception('Error: Calls to magic methods are not allowed!');
		}
		
		$file = DIR_APP . 'application/controllers/' . $this->route . '.php';
		$class = 'Controller' . preg_replace('/[^a-zA-Z0-9]/', '', $this->route);

		// Initialize the class
		if (is_file($file)) {
			include_once($file);

			$controller = new $class($registry);
		} else {
			return new \Exception('Error: Could not call ' . $this->route . '/' . $this->method . '!');
		}

		return call_user_func_array(array($controller, $this->method), $args);
	}
}
