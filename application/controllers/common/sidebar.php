<?php
	class ControllerCommonSidebar extends Controller {
		public function index(){
			if ( isset($_GET['route']) ) {
				$data['route'] = $_GET['route'];
			} else {
				$data['route'] = ROUTE_DEFAULT;
			}

			return $this->load->view('common/sidebar', $data);
		}
	}
?>