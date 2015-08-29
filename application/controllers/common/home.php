<?php
	class ControllerCommonHome extends Controller {
		public function index() {
			/*if (!$this->user->isLoggedIn()) {
				$this->response->redirect($this->url->link('account/login', '', ''));
			}*/

			$this->document->setTitle('Neville ');
			$this->document->addStyle('css/home.css');

			$this->view = 'common/home.php';

			$this->children = array(
				'common/header',
				'common/menu',
				'common/footer'
			);

			$this->response->setOutput($this->render());
		}
	}
?>