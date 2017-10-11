<?php
	class Session {
		public $session_id = '';
		public $data = array();

	  	public function __construct() {
		  	ini_set('session.use_only_cookies', 'Off');
			ini_set('session.use_cookies', 'On');
			ini_set('session.use_trans_sid', 'Off');
			ini_set('session.cookie_httponly', 'On');

		  	session_set_cookie_params(0, '/');
		  	session_start();
	  	}

		public function start($key = SESSION_NAME) {
			if (isset($_COOKIE[$key])) {
				$this->session_id = $_COOKIE[$key];
			} else {
				$this->session_id = $this->createId();
			}

			if (!isset($_SESSION[$this->session_id])) {
				$_SESSION[$this->session_id] = array();
			}

			$this->data = &$_SESSION[$this->session_id];

			if ($key != 'PHPSESSID') {
				setcookie($key, $this->session_id, ini_get('session.cookie_lifetime'), ini_get('session.cookie_path'), ini_get('session.cookie_domain'), ini_get('session.cookie_secure'), ini_get('session.cookie_httponly'));
			}

			return $this->session_id;
		}

		public function getId() {
			return $this->session_id;
		}

		public function createId() {
			return substr(bin2hex(random_bytes(26)), 0, 26);
		}

		public function destroy() {
			return session_destroy();
		}
	}
?>