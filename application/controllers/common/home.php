<?php
/**
 * Neville Controller Common Home
 *
 * @package		Neville
 * @since		0.1.0
 */
class ControllerCommonHome extends Controller {
	/**
	 * Index
	 */
	public function index() {
		/*if (!$this->user->isLoggedIn()) {
			$this->response->redirect($this->url->link('account/login', '', ''));
		}*/

		$this->document->setTitle('Neville ');
		$this->document->setClass('docs-home');

		$data['menu'] = $this->load->controller('common/menu');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('common/home', $data));
	}
}
