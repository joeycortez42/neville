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
		 * Retrieve registry for Front Class
		 *
		 * @param array
		 */
		public function __construct($registry) {
			$this->registry = $registry;
		}

		/**
		 * Dispatch route
		 *
		 * @param string
		 * @param string
		 */
		public function dispatch(Route $route, Route $error) {
			$this->error = $error;

			while ($route instanceof Route) {
				$route = $this->_execute($route);
			}
		}

		/**
		 * Execute route
		 *
		 * @param string
		 *
		 * @retunrs string
		 */
		private function _execute(Route $route) {
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
