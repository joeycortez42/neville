<?php
namespace Database;
/**
 * Neville SQLite Class
 *
 * @package		Neville
 * @since		0.8.1
 */
final class SQLite3 {
	private $connection = null;
	
	/**
	 * Retrieve connection values for SQLite Class
	 *
	 * @param string
	 *
	 * @throws string
	 */
    public function __construct($hostname) {        
        try {
			$this->connection = new \PDO("sqlite:" . $hostname);
		} catch(\PDOException $e) {
			throw new \Exception('Failed to connect to database. Reason: \'' . $e->getMessage() . '\'');
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
	 * Closes database connection
	 */
    public function __destruct() {
        unset($this->connection);
		$this->connection = null;
	}
}
