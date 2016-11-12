<?php
	final class Front {
		protected $registry;
		protected $error;

		public function __construct($registry) {
			$this->registry = $registry;
		}

		public function dispatch(Route $route, Route $error) {
			$this->error = $error;

			while ($route instanceof Route) {
				$route = $this->execute($route);
			}
		}

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
?>