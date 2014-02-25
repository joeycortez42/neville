<?php
final class Front {
	protected $registry;
	protected $error;

	public function __construct($registry) {
		$this->registry = $registry;
	}

	public function dispatch($route, $error) {
		$this->error = $error;

		while ($route) {
			$route = $this->execute($route);
		}
	}

	private function execute($route) {
		if (file_exists($route->getFile())) {
			require_once($route->getFile());

			$class = $route->getClass();
			$controller = new $class($this->registry);

			if (is_callable(array($controller, $route->getMethod()))) {
				$route = call_user_func_array(array($controller, $route->getMethod()), $route->getArgs());
			} else {
				$route = $this->error;
				$this->error = '';
			}
		} else {
			$route = $this->error;
			$this->error = '';
		}

		return $route;
	}
}
?>