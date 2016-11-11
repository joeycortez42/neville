<?php
	class Database {
		public $connection = NULL;
		private $statement = null;

		public function __construct() {
			try {
				$this->connection = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_PERSISTENT => true));
				return $this->connection;
			} catch (PDOException $e) {
				die('Error: ' . $e->getMessage() . ' Error Code : ' . $e->getCode());
			}

			$this->connection->exec("SET NAMES 'utf8'");
			$this->connection->exec("SET CHARACTER SET utf8");
			$this->connection->exec("SET CHARACTER_SET_CONNECTION=utf8");
			$this->connection->exec("SET SQL_MODE = ''");
		}

		public function prepare($sql) {
			$this->statement = $this->connection->prepare($sql);
		}

		public function bindParam($parameter, $variable, $data_type = PDO::PARAM_STR, $length = 0) {
			if ($length) {
				$this->statement->bindParam($parameter, $variable, $data_type, $length);
			} else {
				$this->statement->bindParam($parameter, $variable, $data_type);
			}
		}

		public function execute() {
			try {
				if ($this->statement && $this->statement->execute()) {
					$data = array();

					while ($row = $this->statement->fetch(PDO::FETCH_ASSOC)) {
						$data[] = $row;
					}

					$result = new stdClass();
					$result->row = (isset($data[0])) ? $data[0] : array();
					$result->rows = $data;
					$result->num_rows = $this->statement->rowCount();
				}
			} catch(PDOException $e) {
				die('Error: ' . $e->getMessage() . ' Error Code : ' . $e->getCode());
			}
		}

		public function query($sql, $params = array()) {
			$this->statement = $this->connection->prepare($sql);
			$result = false;

			try {
				if ($this->statement && $this->statement->execute($params)) {
					$data = array();

					while ($row = $this->statement->fetch(PDO::FETCH_ASSOC)) {
						$data[] = $row;
					}

					$result = new stdClass();
					$result->row = (isset($data[0]) ? $data[0] : array());
					$result->rows = $data;
					$result->num_rows = $this->statement->rowCount();
				}
			} catch (PDOException $e) {
				die('Error: ' . $e->getMessage() . ' Error Code : ' . $e->getCode());
				exit();
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

		public function escape($string) {
			return $this->connection->quote(trim($string));
		}

		public function countAffected() {
			if ($this->statement) {
				return $this->statement->rowCount();
			} else {
				return 0;
			}
		}

		public function getLastId() {
			return $this->connection->lastInsertId();
		}

		public function __destruct() {
			$this->connection = NULL;
		}
	}
?>
