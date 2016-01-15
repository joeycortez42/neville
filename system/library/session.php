<?php
	class Session {
		public $data = array();

	  	public function __construct() { }

		public function getId() {
			return session_id();
		}

		public function start($session_id = '') {
			if (!session_id()) {
				ini_set('session.use_only_cookies', 'Off');
				ini_set('session.use_cookies', 'On');
				ini_set('session.use_trans_sid', 'Off');
				ini_set('session.cookie_httponly', 'On');

				session_name(SESSION_NAME);

				if ($session_id) {
					session_id($session_id);
				}

				session_set_cookie_params(0, '/');
				session_start();
			}

			if (!isset($_SESSION)) {
				$_SESSION = array();
			}

			$this->data =& $_SESSION;

			return true;
		}

		public function destroy() {
			return session_destroy();
		}
	}
?>
