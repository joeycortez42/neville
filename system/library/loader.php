<?php
	final class Loader {
		protected $registry;

		public function __construct($registry) {
			$this->registry = $registry;
		}

		public function controller($route, $data = array()) {
			$route = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route);
			$output = null;

			if (!$output) {
				$final = new Route($route);
				$output = $final->execute($this->registry, array(&$data));
			}

			if ($output instanceof Exception) {
				return false;
			}

			return $output;
		}

		public function model($route) {
			$route = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route);

			$file  = DIR_APP . 'application/models/' . $route . '.php';
			$class = 'Model' . preg_replace('/[^a-zA-Z0-9]/', '', $route);

			if (file_exists($file)) {
				include_once($file);

				$this->registry->set('model_' . str_replace('/', '_', $route), new $class($this->registry));
			} else {
				trigger_error('Error: Could not load model ' . $route . '!');
				exit();
			}
		}

		public function view($route, $data = array()) {
			$output = null;

			if (!$output) {
				$file = DIR_APP . 'application/views/' . $route . '.php';

				if (file_exists($file)) {
					extract($data);
					ob_start();

					require($file);
					$output = ob_get_contents();

					ob_end_clean();
				} else {
					trigger_error('Error: Could not load view ' . $route . '!');
					exit();
				}
			}

			return $output;
		}
	}
?>