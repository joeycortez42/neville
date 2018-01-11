<?php
/**
 * Neville Request Class
 *
 * Seems broken!
 *
 * @package		Neville
 * @since		0.1.0
 */
	class Request {
		public $get = array();
		public $post = array();
		public $cookie = array();
		public $files = array();
		public $server = array();

		/**
		 * Assign values for Request Class
		 */
		public function __construct() {
			$this->get = $this->_clean($_GET);
			$this->post = $this->_clean($_POST);
			$this->request = $this->_clean($_REQUEST);
			$this->cookie = $this->_clean($_COOKIE);
			$this->files = $this->_clean($_FILES);
			$this->server = $this->_clean($_SERVER);
		}

		/**
		 * Clean data
		 *
		 * @param string
		 *
		 * @returns array
		 */
		private function _clean($data) {
			if (is_array($data)) {
				foreach ($data as $key => $value) {
					unset($data[$key]);
					$data[$this->_clean($key)] = $this->_clean($value);
				}
			} else {
				$data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
			}

			return $data;
		}
	}
