<?php
	class ControllerCommonMenu extends Controller {
		protected function index(){
			$this->data['route'] = $this->request->get['route'];

			$this->data['url_signout'] = $this->url->link('account/logout', '', '');

			$this->view = 'common/menu.php';
			$this->render();
		}
	}
?>