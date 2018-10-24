<?php
/**
 * Neville Controller Documentation
 *
 * @package		Neville
 * @since		0.4.0
 */
class ControllerGettingstarted extends Controller {
	public function index() {
		$this->load->model('common/values');

		$data['menu'] = $this->load->controller('common/menu');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('getting-started', $data));
	}
}