<?php
/**
 * Neville Loader Class
 *
 * @package		Neville
 * @since		0.1.0
 */
final class Loader {
	protected $registry;

	/**
	 * Constructor
	 *
	 * @param	object	$registry
	 */
	public function __construct($registry) {
		$this->registry = $registry;
	}

	/**
	 * Load controller
	 *
	 * @param	string	$route
	 *
	 * @return	mixed
	 */
	public function controller($route) {
		$args = func_get_args();
		array_shift($args);

		// Sanitize the call
		$route = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route);

		$action = new Route($route);
		$output = $action->execute($this->registry, $args);

		if (!$output instanceof Exception) {
			return $output;
		}
	}

	/**
	 * Load model
	 *
	 * @param	string	$route
	 */
	public function model($route) {
		// Sanitize the call
		$route = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route);

		if (!$this->registry->has('model_' . str_replace('/', '_', $route))) {
			$file = DIR_APP . 'application/models/' . $route . '.php';
			$class = 'Model' . preg_replace('/[^a-zA-Z0-9]/', '', $route);

			if (is_file($file)) {
				include_once($file);

				$this->registry->set('model_' . str_replace('/', '_', $route), new $class($this->registry));
			} else {
				throw new \Exception('Error: Could not load model ' . $route . '!');
			}
		}
	}

	/**
	 * Load view
	 *
	 * @param	string	$route
	 * @param	array	$data
	 *
	 * @return	mixed
	 */
	public function view($route, $data = array()) {
		// Sanitize the call
		$route = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route);
		
		$file = DIR_APP . 'application/views/' . $route . '.php';

		if (is_file($file)) {
			ob_start();

			extract($data);
			include_once($file);
			$output = ob_get_contents();

			ob_end_clean();
		} else {
			throw new \Exception('Error: Could not load view ' . $route . '!');
			exit();
		}

		return $output;
	}
}
