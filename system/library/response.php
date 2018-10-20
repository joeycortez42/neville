<?php
/**
 * Neville Response Class
 *
 * Used to generate and output HTML
 *
 * @package		Neville
 * @since		0.1.0
 */
class Response {
	private $headers = array();
	private $output;

	/**
	 * Assign header
	 *
	 * @param array
	 */
	public function addHeader($header) {
		$this->headers[] = $header;
	}

	/**
	 * Redirect to URL before content output
	 *
	 * @param string
	 */
	public function redirect($url) {
		header('Location: ' . $url);
		exit();
	}

	/**
	 * Set content output
	 *
	 * @param string
	 */
	public function setOutput($output) {
		$this->output = $output;
	}

	/**
	 * Echo output content
	 */
	public function output() {
		if ($this->output) {
			$ouput = $this->output;

			if (!headers_sent()) {
				foreach ($this->headers as $header) {
					header($header, true);
				}
			}

			echo $ouput;
		}
	}
}
