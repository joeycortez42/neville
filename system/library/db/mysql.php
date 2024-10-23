<?php
/**
 * Neville MySQL Class
 *
 * @package		Neville
 * @since		0.4.4
 */
namespace Database;
final class MySQL {
	private $connection;
	private $statement;

	/**
	 * Constructor
	 *
	 * @param	string	$hostname
	 * @param	string	$username
	 * @param	string	$password
	 * @param	string	$database
	 * @param	int		$port
	 */
	public function __construct($hostname, $username, $password, $database, $port = '3306') {
		try {
			$this->connection = @new \PDO("mysql:host=" . $hostname . ";port=" . $port . ";dbname=" . $database,
				$username, $password, array(\PDO::ATTR_PERSISTENT => true));
		} catch (\PDOException $e) {
			throw new \Exception('Error: Could not make a database link using ' . $username . '@' . $hostname . '!');
		}

		$this->connection->exec("SET NAMES 'utf8'");
		$this->connection->exec("SET CHARACTER SET utf8");
		$this->connection->exec("SET CHARACTER_SET_CONNECTION=utf8");
		$this->connection->exec("SET SQL_MODE = ''");
	}

	/**
	 * Execute SQL statement
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
	 * Bind SQL statement
	 *
	 * @param	string	$parameter
	 * @param	string	$variable
	 * @param	string	$data_type
	 * @param	int		$length
	 */
	public function bindParam($parameter, $variable, $data_type = \PDO::PARAM_STR, $length = 0) {
		if ($length) {
			$this->statement->bindParam($parameter, $variable, $data_type, $length);
		} else {
			$this->statement->bindParam($parameter, $variable, $data_type);
		}
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
