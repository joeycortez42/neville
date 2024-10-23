<?php
/**
 * Neville SQLite Class
 *
 * @package		Neville
 * @since		0.8.1
 */
namespace Database;
final class SQLite3 {
	private $connection;
	private $statement;

	/**
	 * Constructor
	 *
	 * @param	string	$hostname
	 */
		public function __construct($hostname) {
			try {
				$this->connection = @new \PDO("sqlite:" . $hostname, null, null, array(\PDO::ATTR_PERSISTENT => true));
			} catch(\PDOException $e) {
				throw new \Exception('Failed to connect to database. Reason: \'' . $e->getMessage() . '\'');
			}
		}

	/**
	 * Query statement
	 *
	 * @param	string	$sql
	 * @param	array	$params
	 *
	 * @return	array
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
	 * Prepare SQL statement
	 *
	 * @param	string	$sql
	 */
	public function prepare($sql) {
		$this->statement = $this->connection->prepare($sql);
	}

	/**
	 * Escape values
	 *
	 * @param	string	$value
	 *
	 * @return	string
	 */
	public function escape($value) {
		return str_replace(array("\\", "\0", "\n", "\r", "\x1a", "'", '"'), array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"'), $value);
	}

	/**
	 * Count of affected rows
	 *
	 * @return	int
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
	 * @return	int
	 */
	public function getLastId() {
		return $this->connection->lastInsertId();
	}

	/**
	 * Check database connection
	 *
	 * @return	bool
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
		$this->connection = null;
	}
}
