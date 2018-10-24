<?php
/**
 * Neville Controller Common Header
 *
 * @package		Neville
 * @since		0.1.0
 */
class ControllerCommonHeader extends Controller {
	/**
	 * Index
	 *
	 * @returns array
	 */
	public function index() {
		$data['title'] = $this->document->getTitle();
		$data['keywords'] = 'Neville, PHP5, MVC, Framework';
		$data['description'] = 'Neville is a lightweight PHP5 MVC Framework for building web applications.';
		$data['styles'] = $this->document->getStyles();
		$data['class'] = $this->document->getClass();

		return $this->load->view('common/header', $data);
	}
}
