<?php
/**
 * Neville Registry Class
 *
 * @package		Neville
 * @since		0.1.0
 */
final class Registry {
	private $data = array();

	/**
	 * Retrieve values
	 *
	 * @param string
	 *
	 * @returns array/null
	 */
	public function get($key) {
		return (isset($this->data[$key]) ? $this->data[$key] : NULL);
	}

	/**
	 * Set values
	 *
	 * @param string
	 * @param string
	 */
	public function set($key, $value) {
		$this->data[$key] = $value;
	}

	/**
	 * Check values
	 *
	 * @param string
	 *
	 * @returns bool
	 */
	public function has($key) {
		return isset($this->data[$key]);
	}
}
