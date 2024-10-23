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
	 * Constructor
	 *
	 * @param	string	$adapter
	 * @param	string	$hostname
	 * @param	string	$username
	 * @param	string	$password
	 * @param	string	$database
	 * @param	int		$port
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
	 * @param	string	$sql
	 *
	 * @return	array
	 */
	public function query($sql) {
		return $this->adapter->query($sql);
	}

	/**
	 * Escape values
	 *
	 * @param	string	$value
	 *
	 * @return	string
	 */
	public function escape($value) {
		return $this->adapter->escape($value);
	}

	/**
	 * Count of affected rows
	 *
	 * @return	int
	 */
	public function countAffected() {
		return $this->adapter->countAffected();
	}

	/**
	 * Get last row id
	 *
	 * @return	int
	 */
	public function getLastId() {
		return $this->adapter->getLastId();
	}

	/**
	 * Check adapter connection
	 *
	 * @return	bool
	 */
	public function connected() {
		return $this->adapter->isConnected();
	}
}
