<?php
/**
 * Neville Request Class
 *
 * @package		Neville
 * @since		0.1.0
 */
class Request {
	public $get = array();
	public $post = array();
	public $request = array();
	public $cookie = array();
	public $files = array();
	public $server = array();

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->get = $this->clean($_GET);
		$this->post = $this->clean($_POST);
		$this->request = $this->clean($_REQUEST);
		$this->cookie = $this->clean($_COOKIE);
		$this->files = $this->clean($_FILES);
		$this->server = $this->clean($_SERVER);
	}

	/**
	 * Clean data
	 *
	 * @param	string	$data
	 *
	 * @return	array
	 */
	private function clean($data) {
		if (is_array($data)) {
			foreach ($data as $key => $value) {
				unset($data[$key]);

				$data[$this->clean($key)] = $this->clean($value);
			}
		} else {
			$data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
		}

		return $data;
	}
}
