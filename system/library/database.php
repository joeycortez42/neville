<?php
	class Database {
		public $connection = NULL;

		public function __construct() {
			try {
				$this->connection = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
				$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$this->connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET CHARSET UTF-8');
				return $this->connection;
			} catch (PDOException $e) {
				die('Error: ' . $e->getMessage());
			}
		}

		public function __destruct() {
			$this->connection = NULL;
		}

		public function query($sql) {
			$result = false;

			try {
				$query = $this->connection->query($sql);
				$query->setFetchMode(PDO::FETCH_ASSOC);
				$data = array();

				// fetch
				while($row = $query->fetch()){
					$data[] = $row;
				}

				$result = new stdClass();
				$result->row = (isset($data[0]) ? $data[0] : array());
				$result->rows = $data;
				$result->num_rows = $query->rowCount();
			} catch (PDOException $e) {
				die('Error: ' . $e->getMessage());
			}

			if ($result) {
				return $result;
			} else {
				$result = new stdClass();
				$result->row = array();
				$result->rows = array();
				$result->num_rows = 0;
				return $result;
			}
		}

		/*public function select($sql) {
			//echo $sql;
			try {
				$statement = $this->connection->prepare($sql);
				$statement->execute();
				$statement->setFetchMode(PDO::FETCH_ASSOC);
				return $statement->fetchAll();
			} catch (PDOException $e) {
				die('Error: ' . $e->getMessage());
			}
		}*/
	}
?>
