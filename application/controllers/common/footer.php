<?php
	class ControllerCommonFooter extends Controller {
		protected function index() {
			$this->data['route'] = $this->request->get['route'];

			$this->view = 'common/footer.php';
			$this->render();
		}
	}
?>