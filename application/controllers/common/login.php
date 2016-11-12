<?php  
	class ControllerCommonLogin extends Controller {
		public function index() {	
			$this->view = 'common/login.php';

			$this->children = array(
				'common/header',
				'common/footer'
			);

			$this->response->setOutput($this->render());
		}
	}
?>