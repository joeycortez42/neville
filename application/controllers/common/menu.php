<?php
	class ControllerCommonMenu extends Controller {
		public function index(){
			//$data['url_signout'] = $this->url->link('account/logout', '', '');

			if ( isset($_GET['route']) ) {
				$data['route'] = $_GET['route'];
			} else {
				$data['route'] = ROUTE_DEFAULT;
			}

			return $this->load->view('common/menu', $data);
		}
	}
?>
