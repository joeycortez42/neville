<?php
	namespace Database;
/**
 * Neville Postgre Class
 *
 * @package		Neville
 * @since		0.4.4
 */
	final class Postgre {
		private $link;

		/**
		 * Retrieve connection values for Postgre Class
		 *
		 * @param string
		 * @param string
		 * @param string
		 * @param string
		 * @param int
		 *
		 * @throws string
		 */
		public function __construct($hostname, $username, $password, $database, $port = '5432') {
			if (!$this->link = pg_connect('host=' . $hostname . ' port=' . $port .  ' user=' . $username . ' password='	. $password . ' dbname=' . $database)) {
				throw new \Exception('Error: Could not make a database link using ' . $username . '@' . $hostname);
			}

			if (!pg_ping($this->link)) {
				throw new \Exception('Error: Could not connect to database ' . $database);
			}

			pg_query($this->link, "SET CLIENT_ENCODING TO 'UTF8'");
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
			$resource = pg_query($this->link, $sql);

			if ($resource) {
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
				throw new \Exception('Error: ' . pg_result_error($this->link) . '<br />' . $sql);
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
			return pg_escape_string($this->link, $value);
		}

		/**
		 * Count of affected rows
		 *
		 * @returns int
		 */
		public function countAffected() {
			return pg_affected_rows($this->link);
		}

		/**
		 * Last row id
		 *
		 * @returns int
		 */
		public function getLastId() {
			$query = $this->query("SELECT LASTVAL() AS `id`");

			return $query->row['id'];
		}

		/**
		 * Closes database connection
		 */
		public function __destruct() {
			pg_close($this->link);
		}
	}
