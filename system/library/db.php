<?php
	class DB extends mysqli {
		/*private $driver; */
		private $hostname;
		private $username;
		private $password;
		private $database;
		
		public function __construct() {
			// Initialize object with database constants
			$this->hostname = DB_HOST;
			$this->username = DB_USERNAME;
			$this->password = DB_PASSWORD;
			$this->database = DB_DATABASE; 
			
			// Open database connection
			parent::__construct(
				$this->hostname, $this->username, $this->password, $this->database
			);

			if (mysqli_connect_error()) {
				trigger_error('Error: Could not make a database link (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
			}
			
			//$this->query("SET NAMES 'utf8'");
			//$this->query("SET CHARACTER SET utf8");
			//$this->query("SET CHARACTER_SET_CONNECTION=utf8");
			//$this->query("SET SQL_MODE = ''");
		}
			
	  	public function query($sql) {
			$query = parent::query($sql);
			
			if ($query === TRUE) {
			} else {
				$return = new stdClass(); $i = 0;
				
				while ($result = $query->fetch_assoc() ) {
					$data[] = $result;
					if ($i == 0) { $return->row = $result; }
					$i++;
				}
				$return->rows = $data;
				
				$return->num_rows = $query->num_rows;
				$query->free();
			}
			
			return ( (isset($return)) ? $return : false );
	  	}
	  	
	  	public function multiquery($sql) {
			if (parent::multi_query($sql)) {
				do {
					if ($result = parent::store_result()) {
						while ($row = $result->fetch_assoc()) {
							$return = $row;
						}
						$result->free();
					}
				} while(parent::more_results() && parent::next_result());
			}
			return $return;
		}
		
		public function escape($value) {
			return $this->real_escape_string($value);
		}
		
	  	public function affected() {
			return $this->affected_rows;
	  	}
	
	  	/*public function getLastId() {
			return $this->insert_id;
	  	}*/
		
		public function __destruct() {
			$this->close();
		}
	}
?>