<?php
	abstract class Controller {
		protected $registry;	
		protected $id;
		protected $layout;
		protected $view;
		protected $children = array();
		protected $data = array();
		protected $output;
		
		public function __construct($registry) {
			$this->registry = $registry;
		}
		
		public function __get($key) {
			return $this->registry->get($key);
		}
		
		public function __set($key, $value) {
			$this->registry->set($key, $value);
		}
				
		protected function forward($route, $args = array()) {
			return new Route($route, $args);
		}
	
		protected function redirect($url, $status = 302) {
			header('Status: ' . $status);
			header('Location: ' . str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $url));
			exit();				
		}
		
		protected function getChild($child, $args = array()) {
			$action = new Route($child, $args);
		
			if (file_exists($action->getFile())) {
				require_once($action->getFile());
	
				$class = $action->getClass();
				$controller = new $class($this->registry);
				$controller->{$action->getMethod()}($action->getArgs());
				
				return $controller->output;
			} else {
				trigger_error('Error: Could not load controller ' . $child . '!');
				exit();					
			}		
		}
		
		protected function render() {
			foreach ($this->children as $child) {
				$this->data[basename($child)] = $this->getChild($child);
			}
			
			if (file_exists(DIR_APP . 'application/views/' . $this->view)) {
				extract($this->data);
	      		ob_start();
		  		require(DIR_APP . 'application/views/' . $this->view);
		  		$this->output = ob_get_contents();
	      		ob_end_clean();
	      		
				return $this->output;
	    		} else {
				trigger_error('Error: Could not load view ' . DIR_VIEW . $this->view . '!');
				exit();				
	    		}
		}
	}
?>