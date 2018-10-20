<?php
/**
 * Neville Session Class
 *
 * @package		Neville
 * @since		0.1.0
 */
class Session {
	public $sessionId = '';
	public $data = array();

	/**
	 * Set values for Session Class and start PHP session
	 */
	public function __construct() {
		ini_set('session.use_only_cookies', 'Off');
		ini_set('session.use_cookies', 'On');
		ini_set('session.use_trans_sid', 'Off');
		ini_set('session.cookie_httponly', 'On');

		session_set_cookie_params(0, '/');
		session_start();
	}

	/**
	 * Start session
	 *
	 * @param string
	 *
	 * @returns string
	 */
	public function start($key = SESSION_NAME) {
		if (isset($_COOKIE[$key])) {
			$this->sessionId = $_COOKIE[$key];
		} else {
			$this->sessionId = $this->_createId();
		}

		if (!isset($_SESSION[$this->sessionId])) {
			$_SESSION[$this->sessionId] = array();
		}

		$this->data = &$_SESSION[$this->sessionId];

		if ($key !== 'PHPSESSID') {
			setcookie($key, $this->sessionId, ini_get('session.cookie_lifetime'), ini_get('session.cookie_path'),
				ini_get('session.cookie_domain'), ini_get('session.cookie_secure'), ini_get('session.cookie_httponly'));
		}

		return $this->sessionId;
	}

	/**
	 * Retrieve session id
	 *
	 * @returns string
	 */
	public function getId() {
		return $this->sessionId;
	}

	/**
	 * Create session id
	 *
	 * @returns string
	 */
	private function _createId() {
		if (function_exists('random_bytes')) {
			$sessionId = substr(bin2hex(random_bytes(26)), 0, 26);
		} else {
			$sessionId = substr(bin2hex(openssl_random_pseudo_bytes(26)), 0, 26);
		}

		return $sessionId;
	}

	/**
	 * Destory session
	 */
	public function destroy() {
		session_destroy();

		setcookie($key, '', time() - 42000, ini_get('session.cookie_path'), ini_get('session.cookie_domain'));
	}
}
