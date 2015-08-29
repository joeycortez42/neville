<?php  
	class ControllerDocumentation extends Controller {
		public function index() {
			$this->load->model('common/values');
		
			$this->data['states'] = $this->model_common_values->getStates('full');
			
			$this->view = 'documentation.php';

			$this->children = array(
				'common/header',
				'common/menu',
				'common/footer'
			);

			$this->response->setOutput($this->render());
		}
	}
?>