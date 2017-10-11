<?php
	class ControllerCommonFooter extends Controller {
		public function index() {
			$this->document->addScript('js/neville.js');

			$data['scripts'] = $this->document->getScripts();

			return $this->load->view('common/footer', $data);
		}
	}
?>
