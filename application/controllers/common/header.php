<?php   
	class ControllerCommonHeader extends Controller {
		protected function index() {
			$this->data['title'] = $this->document->getTitle();
			$this->data['keywords'] = 'Neville, PHP5, MVC, Framework';
			$this->data['description'] = 'Neville is a lightweight PHP5 MVC Framework for building web applications.';
			
			if ($this->request->get['route'] == '') {
				$this->data['bodyClass'] = 'home';
			}

			$this->view = 'common/header.php';
		 	$this->render();
		} 
	}
?>