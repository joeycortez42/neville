<?php   
	class ControllerCommonMenu extends Controller {
		protected function index() {			
			$this->view = 'common/menu.php';
		 	$this->render();
		} 	
	}
?>