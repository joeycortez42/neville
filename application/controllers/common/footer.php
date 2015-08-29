<?php
	class ControllerCommonFooter extends Controller {
		protected function index() {
			$data['scripts'] = $this->document->getScripts();

			$this->view = 'common/footer.php';
			$this->render();
		}
	}
?>
