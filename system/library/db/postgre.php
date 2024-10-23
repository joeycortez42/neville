<?php
/**
 * Neville Postgre Class
 *
 * @package		Neville
 * @since		0.4.4
 */
namespace Database;
final class Postgre {
	private $connection;
	private $affected_rows;

	/**
	 * Constructor
	 *
	 * @param	string	$hostname
	 * @param	string	$username
	 * @param	string	$password
	 * @param	string	$database
	 * @param	int		$port
	 */
	public function __construct($hostname, $username, $password, $database, $port = '5432') {
		$this->connection = @pg_connect('host=' . $hostname . ' port=' . $port .  ' user=' . $username . ' password='	. $password . ' dbname=' . $database);

		if (!$this->connection) {
			throw new \Exception('Error: Could not make a database link using ' . $username . '@' . $hostname);
		}

		pg_query($this->connection, "SET CLIENT_ENCODING TO 'UTF8'");
	}

	/**
	 * Query statement
	 *
	 * @param string
	 *
	 * @throws string
	 *
	 * @returns array/bool
	 */
	public function query($sql) {
		$resource = pg_query($this->connection, $sql);

		if ($resource) {
			pg_affected_rows($resource);

			if (is_resource($resource)) {
				$i = 0;

				$data = array();

				while ($result = pg_fetch_assoc($resource)) {
					$data[$i] = $result;

					$i++;
				}

				pg_free_result($resource);

				$query = new \stdClass();
				$query->row = isset($data[0]) ? $data[0] : array();
				$query->rows = $data;
				$query->num_rows = $i;

				unset($data);

				return $query;
			} else {
				return true;
			}
		} else {
			throw new \Exception('Error: ' . pg_result_error($this->connection) . '<br />' . $sql);
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
		return pg_escape_string($this->connection, $value);
	}

	/**
	 * Count of affected rows
	 *
	 * @return	int
	 */
	public function countAffected() {
		return $this->affected_rows;
	}

	/**
	 * Last row id
	 *
	 * @return	int
	 */
	public function getLastId() {
		$query = $this->query("SELECT LASTVAL() AS id");

		return $query->row['id'];
	}

	/**
	 * Check database connection
	 *
	 * @return	bool
	 */
	public function isConnected() {
		if (pg_connection_status($this->connection) === PGSQL_CONNECTION_OK) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Closes database connection
	 */
	public function __destruct() {
		pg_close($this->connection);
	}
}
