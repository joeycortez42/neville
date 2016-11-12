<?php
	class Route {
		public $id;
		private $route;
		private $method = 'index';

		public function __construct($route) {
			$this->id = $route;

			$file = DIR_APP . 'application/controllers/' . $route . '.php';

			if (is_file($file)) {
				$this->route = $route;
			}

		}

		public function getId() {
			return $this->id;
		}

		public function execute($registry, array $args = array()) {
			$file = DIR_APP . 'application/controllers/' . $this->route . '.php';
			$class = 'Controller' . preg_replace('/[^a-zA-Z0-9]/', '', $this->route);

			if (is_file($file)) {
				include_once($file);

				$controller = new $class($registry);
			} else {
				return new \Exception('Error: Could not call ' . $this->route . '/' . $this->method . '!');
			}

			return call_user_func_array(array($controller, $this->method), $args);
		}
	}
?>
