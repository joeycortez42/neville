<?php
/**
 * Neville Front Class
 *
 * @package		Neville
 * @since		0.1.0
 */
final class Front {
	protected $registry;
	protected $error;

	/**
	 * Constructor
	 *
	 * @param	object	$registry
	 */
	public function __construct($registry) {
		$this->registry = $registry;
	}

	/**
	 * Dispatch route
	 *
	 * @param	object	$route
	 * @param	object	$error
	 */
	public function dispatch(Route $route, Route $error) {
		$this->error = $error;

		while ($route instanceof Route) {
			$route = $this->execute($route);
		}
	}

	/**
	 * Execute route
	 *
	 * @param	object	$route
	 *
	 * @return	object
	 */
	private function execute(Route $route) {
		$result = $route->execute($this->registry);

		if ($result instanceof Route) {
			return $result;
		}

		if ($result instanceof Exception) {
			$route = $this->error;

			$this->error = null;

			return $route;
		}
	}
}
