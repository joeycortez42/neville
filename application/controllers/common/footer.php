<?php
	class ControllerCommonFooter extends Controller {
		public function index() {
			$data['scripts'] = $this->document->getScripts();

			return $this->load->view('common/footer', $data);
		}
	}
?>
