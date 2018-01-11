<?php
	class ControllerAccountLogin extends Controller {
		public function index() {
			if ($this->user->isLoggedIn()) {
				$this->response->redirect($this->url->link('', '', ''));
			}

			$data['error'] = '';

			if ($this->request->post) {
				$email = $this->request->post['email'];
				$password = $this->request->post['password'];

				if ($email && $password) {
					$this->user->login($email, $password);


					if ($this->user->isLoggedIn()) {
						$this->response->redirect($this->url->link('', '', ''));
					}
				} else {
					$data['error'] = 'Email and password combination is invalid.';
				}
			}

			$this->document->setTitle('Login');
			$this->document->setClass('login');

			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('account/login', $data));
		}
	}
?>