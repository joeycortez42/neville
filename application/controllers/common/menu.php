<?php
	class ControllerCommonMenu extends Controller {
		public function index(){
			//$data['url_signout'] = $this->url->link('account/logout', '', '');

			if (isset($request->get['route'])) {
				$data['route'] = $this->request->get['route'];
			} else {
				$data = array();
			}

			return $this->load->view('common/menu', $data);
		}
	}
?>