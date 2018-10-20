<?php
namespace Database;
/**
 * Neville MySQL Class
 *
 * @package		Neville
 * @since		0.4.4
 */
final class MySQL {
	private $connection = null;
	private $statement = null;

	/**
	 * Retrieve connection values for MySQL PDO Class
	 *
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param int
	 *
	 * @throws string
	 */
	public function __construct($hostname, $username, $password, $database, $port = '3306') {
		try {
			$this->connection = new \PDO("mysql:host=" . $hostname . ";port=" . $port . ";dbname=" . $database,
				$username, $password, array(\PDO::ATTR_PERSISTENT => true));
		} catch (\PDOException $e) {
			throw new \Exception('Failed to connect to database. Reason: ' . $e->getMessage());
		}

		$this->connection->exec("SET NAMES 'utf8'");
		$this->connection->exec("SET CHARACTER SET utf8");
		$this->connection->exec("SET CHARACTER_SET_CONNECTION=utf8");
		$this->connection->exec("SET SQL_MODE = ''");
	}

	/**
	 * Prepare SQL statement
	 *
	 * @param string
	 */
	public function prepare($sql) {
		$this->statement = $this->connection->prepare($sql);
	}

	/**
	 * Bind SQL statement
	 *
	 * @param string
	 * @param string
	 * @param string
	 * @param int
	 */
	public function bindParam($parameter, $variable, $dataType = \PDO::PARAM_STR, $length = 0) {
		if ($length) {
			$this->statement->bindParam($parameter, $variable, $dataType, $length);
		} else {
			$this->statement->bindParam($parameter, $variable, $dataType);
		}
	}

	/**
	 * Execute SQL statement
	 *
	 * @throws string
	 */
	public function execute() {
		try {
			if ($this->statement && $this->statement->execute()) {
				$data = array();

				while ($row = $this->statement->fetch(\PDO::FETCH_ASSOC)) {
					$data[] = $row;
				}

				$result = new \stdClass();
				$result->row = (isset($data[0])) ? $data[0] : array();
				$result->rows = $data;
				$result->num_rows = $this->statement->rowCount();
			}
		} catch (\PDOException $e) {
			throw new \Exception('Error: ' . $e->getMessage() . ' Error Code : ' . $e->getCode());
		}
	}

	/**
	 * Query statement
	 *
	 * @param string
	 * @param array
	 *
	 * @throws string
	 *
	 * @returns array
	 */
	public function query($sql, $params = array()) {
		$this->statement = $this->connection->prepare($sql);

		$result = false;

		try {
			if ($this->statement && $this->statement->execute($params)) {
				$data = array();

				while ($row = $this->statement->fetch(\PDO::FETCH_ASSOC)) {
					$data[] = $row;
				}

				$result = new \stdClass();
				$result->row = (isset($data[0]) ? $data[0] : array());
				$result->rows = $data;
				$result->num_rows = $this->statement->rowCount();
			}
		} catch (\PDOException $e) {
			throw new \Exception('Error: ' . $e->getMessage() . ' Error Code : ' . $e->getCode() . ' <br />' . $sql);
		}

		if ($result) {
			return $result;
		} else {
			$result = new \stdClass();
			$result->row = array();
			$result->rows = array();
			$result->num_rows = 0;
			return $result;
		}
	}

	/**
	 * Escape values
	 *
	 * @param string
	 *
	 * @returns string
	 */
	public function escape($value) {
		return str_replace(array("\\", "\0", "\n", "\r", "\x1a", "'", '"'), array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"'), $value);
	}

	/**
	 * Count of affected rows
	 *
	 * @returns int
	 */
	public function countAffected() {
		if ($this->statement) {
			return $this->statement->rowCount();
		} else {
			return 0;
		}
	}

	/**
	 * Last row id
	 *
	 * @returns int
	 */
	public function getLastId() {
		return $this->connection->lastInsertId();
	}

	/**
	 * Check database connection
	 *
	 * @returns bool
	 */
	public function isConnected() {
		if ($this->connection) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Closes database connection
	 */
	public function __destruct() {
		unset($this->connection);
		$this->connection = null;
	}
}
