<?php
/**
 * Neville Session Class
 *
 * @package		Neville
 * @since		0.1.0
 */
class Session {
	protected $session_id = '';
	public $data = array();

	/**
	 * Constructor
	 */
	public function __construct() {
		ini_set('session.use_only_cookies', 'Off');
		ini_set('session.use_cookies', 'On');
		ini_set('session.use_trans_sid', 'Off');
		ini_set('session.cookie_httponly', 'On');

		session_set_cookie_params(0, '/');
	}

	/**
	 * Retrieve session id
	 *
	 * @return	string
	 */
	public function getId() {
		return $this->session_id;
	}

	/**
	 * Start session
	 *
	 * @param	string	$session_id
	 *
	 * @return	string
	 */
	public function start($session_id = '') {
		if (!$session_id) {
			if (function_exists('random_bytes')) {
				$session_id = substr(bin2hex(random_bytes(26)), 0, 26);
			} else {
				$session_id = substr(bin2hex(openssl_random_pseudo_bytes(26)), 0, 26);
			}
		}

		if (preg_match('/^[a-zA-Z0-9,\-]{22,52}$/', $session_id)) {
			$this->session_id = $session_id;
		} else {
			throw new \Exception('Error: Invalid session ID!');
			exit();
		}

		setcookie(SESSION_NAME, $session_id, time()+(60*60*24*30), ini_get('session.cookie_path'),
			ini_get('session.cookie_domain'), ini_get('session.cookie_secure'), TRUE);

		session_start();

		return $session_id;
	}

	/**
	 * Destory session
	 */
	public function destroy() {
		session_destroy();

		setcookie($key, '', time() - 42000, ini_get('session.cookie_path'), ini_get('session.cookie_domain'));
	}
}
