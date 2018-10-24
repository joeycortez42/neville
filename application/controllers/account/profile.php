<?php
/**
 * Neville Controller Account Profile
 *
 * @package		Neville
 * @since		0.8.0
 */
class ControllerAccountProfile extends Controller {
	/**
	 * Index
	 */
	public function index() {
		if (!$this->user->isLoggedIn()) {
			$this->response->redirect($this->url->link('account/login', '', ''));
		}

		$data['error'] = '';
		$data['user'] = $this->model_account_user->getUser($this->user->isLoggedIn());

		if ($this->request->post) {
			$firstname = $this->request->post['firstname'];
			$lastname = $this->request->post['lastname'];

			$this->model_account_user->editUser($this->user->isLoggedIn());
		}

		$this->load->model('account/user');
		$this->load->model('account/group');

		$this->document->setTitle('Profile | ');
		$data['group'] = $this->model_account_group->getGroup($this->data['user']['groups']);

		$data['menu'] = $this->load->controller('common/menu');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('account/profile', $data));
	}
}
