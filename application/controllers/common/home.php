<?php
	class ControllerCommonHome extends Controller {
		public function index() {
			/*if (!$this->user->isLoggedIn()) {
				$this->response->redirect($this->url->link('account/login', '', ''));
			}*/

			$this->document->setTitle('Neville ');
			$this->document->addStyle('css/home.css');

			$data['menu'] = $this->load->controller('common/menu');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('common/home', $data));
		}
	}
?>