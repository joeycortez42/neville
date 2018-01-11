<?php
/**
 * Neville Controller Common Footer
 *
 * @package		Neville
 * @since		0.1.0
 */
	class ControllerCommonFooter extends Controller {
		/**
		 * Index
		 *
		 * @returns array
		 */
		public function index() {
			$this->document->addScript('js/neville.js');

			$data['scripts'] = $this->document->getScripts();

			return $this->load->view('common/footer', $data);
		}
	}
