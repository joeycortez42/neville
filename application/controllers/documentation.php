<?php
	class ControllerDocumentation extends Controller {
		public function index() {
			$this->load->model('common/values');

			$data['states'] = $this->model_common_values->getStates('full');

			$data['menu'] = $this->load->controller('common/menu');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('documentation', $data));
		}
	}
?>