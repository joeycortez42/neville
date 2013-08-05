<?php   
	class ControllerCommonHeader extends Controller {
		protected function index() {
			
			if ($this->request->get['route'] == 'common/login' || $this->request->get['route'] == '') {
				$this->data['title'] = 'Neville PHP Framework';
			} else {
				$title_array = explode('/', $this->request->get['route']);
				$title_page_name = explode('_', $title_array[1]);
				$this->data['title'] = 'Neville | ' . ucfirst($title_page_name[0]) . ' ' . ucfirst($title_page_name[1]);
			}

			$this->view = 'common/header.php';
		 	$this->render();
		} 
	}
?>