<?php
/**
 * Neville Controller Account Logout
 *
 * @package		Neville
 * @since		0.8.0
 */
class ControllerAccountLogout extends Controller {
	/**
	 * Index
	 */
	public function index() {
		$this->user->logout();

		if (!$this->user->isLoggedIn()) {
			$this->response->redirect($this->url->link('account/login', '', ''));
		}
	}
}
