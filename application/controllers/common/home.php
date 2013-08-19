<?php  
	class ControllerCommonHome extends Controller {
		public function index() {		
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