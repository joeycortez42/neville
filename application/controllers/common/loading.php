<?php
/**
 * Neville Controller Common Loading
 *
 * @package		Neville
 * @since		0.8.0
 */
class ControllerCommonLoading extends Controller {
	/**
	 * Index
	 *
	 * @returns array
	 */
	public function index() {
		return $this->load->view('common/loading');
	}
}
