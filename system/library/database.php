<?php
	class Database {
		private $adapter;

		public function __construct($adapter, $hostname, $username, $password, $database, $port = NULL) {
			$class = 'Database\\' . $adapter;

			if (class_exists($class)) {
				$this->adapter = new $class($hostname, $username, $password, $database, $port);
			} else {
				throw new \Exception('Error: Could not load database adapter ' . $adapter . '!');
			}
		}

		public function query($sql, $params = array()) {
			return $this->adapter->query($sql, $params);
		}

		public function escape($value) {
			return $this->adapter->escape($value);
		}

		public function countAffected() {
			return $this->adapter->countAffected();
		}

		public function getLastId() {
			return $this->adapter->getLastId();
		}

		public function connected() {
			return $this->adapter->connected();
		}
	}
?>