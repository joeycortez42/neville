<?php
	class ControllerAccountLogout extends Controller {
		public function index() {
			$this->user->logout();

			if (!$this->user->isLoggedIn()) {
				$this->response->redirect($this->url->link('account/login', '', ''));
			}
		}
	}
?>