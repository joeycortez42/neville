<?php
/**
 * Neville Controller Class
 *
 * @package		Neville
 * @since		0.1.0
 */
abstract class Controller {
	protected $registry;

	/**
	 * Constructor
	 *
	 * @param	array	$registry
	 */
	public function __construct($registry) {
		$this->registry = $registry;
	}

	/**
	 * Get value
	 *
	 * @param	string	$key
	 *
	 * @return	mixed
	 */
	public function __get($key) {
		return $this->registry->get($key);
	}

	/**
	 * Set value
	 *
	 * @param	string	$key
	 * @param	string	$value
	 */
	public function __set($key, $value) {
		$this->registry->set($key, $value);
	}
}
