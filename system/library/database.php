<?php
/**
 * Neville Database Class
 *
 * @package		Neville
 * @since		0.4.4
 */
class Database {
	private $adapter;

	/**
	 * Retrieve values for Database Class
	 *
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param int
	 *
	 * @throws string
	 */
	public function __construct($adapter, $hostname, $username, $password, $database, $port = NULL) {
		$class = 'Database\\' . $adapter;

		if (class_exists($class)) {
			$this->adapter = new $class($hostname, $username, $password, $database, $port);
		} else {
			throw new \Exception('Error: Could not load database adapter ' . $adapter . '!');
		}
	}

	/**
	 * Query statement
	 *
	 * @param string
	 * @param array
	 *
	 * @returns array
	 */
	public function query($sql, $params = array()) {
		return $this->adapter->query($sql, $params);
	}

	/**
	 * Escape values
	 *
	 * @param string
	 *
	 * @returns string
	 */
	public function escape($value) {
		return $this->adapter->escape($value);
	}

	/**
	 * Count of affected rows
	 *
	 * @returns int
	 */
	public function countAffected() {
		return $this->adapter->countAffected();
	}

	/**
	 * Last row id
	 *
	 * @returns int
	 */
	public function getLastId() {
		return $this->adapter->getLastId();
	}

	/**
	 * Check adapter connection
	 *
	 * @returns bool
	 */
	public function connected() {
		return $this->adapter->connected();
	}
}
