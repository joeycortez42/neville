<?php  
	class ControllerGettingstarted extends Controller {
		public function index() {
			$this->load->model('common/values');
			
			$this->view = 'getting-started.php';

			$this->children = array(
				'common/header',
				'common/menu',
				'common/footer'
			);

			$this->response->setOutput($this->render());
		}
	}
?>