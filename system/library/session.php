<?php
	class Session {
		public $data = array();

	  	public function __construct() { }

		public function getId() {
			return session_id();
		}

		public function start($session_id = '') {
			if (!session_id()) {
				session_name(SESSION_NAME);

				if ($session_id) {
					session_id($session_id);
				}

				session_start();
				setcookie(session_name(), session_id(), strtotime('+30 days'), '', '', FALSE, TRUE);
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