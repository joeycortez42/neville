<?php
	class Database {
		public $connection = NULL;

		public function __construct() {
			try {
				$this->connection = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
				$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
			try {
				$statement = $this->connection->prepare($sql);
				$statement->execute();
			} catch (PDOException $e) {
				die('Error: ' . $e->getMessage());
			}
		}
		
		public function select($sql) {
			//echo $sql;
			try {
				$statement = $this->connection->prepare($sql);
				$statement->execute();
				$statement->setFetchMode(PDO::FETCH_ASSOC);
				return $statement->fetchAll();
			} catch (PDOException $e) {
				die('Error: ' . $e->getMessage());
			}
		}
	}
?>