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
	 * Get values
	 *
	 * @param	string	$key
	 *
	 * @return	mixed
	 */
	public function get($key) {
		return (isset($this->data[$key]) ? $this->data[$key] : NULL);
	}

	/**
	 * Set values
	 *
	 * @param	string	$key
	 * @param	string	$value
	 */
	public function set($key, $value) {
		$this->data[$key] = $value;
	}

	/**
	 * Check values
	 *
	 * @param	string	$key
	 *
	 * @return	bool
	 */
	public function has($key) {
		return isset($this->data[$key]);
	}
}
