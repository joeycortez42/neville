<?php
	class ControllerCommonMenu extends Controller {
		protected function index(){
			$this->data['route'] = $this->request->get['route'];

			$this->view = 'common/menu.php';
			$this->render();
		}
	}
?>