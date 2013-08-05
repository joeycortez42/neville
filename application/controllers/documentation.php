<?php  
	class ControllerDocumentation extends Controller {
		public function index() {
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