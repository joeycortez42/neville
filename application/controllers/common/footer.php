<?php   
	class ControllerCommonFooter extends Controller {
		protected function index() {			
			$this->view = 'common/footer.php';
		 	$this->render();
		} 	
	}
?>