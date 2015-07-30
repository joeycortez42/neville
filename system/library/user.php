<?php
	class User {
		private $user_id;
		private $firstname;
		private $lastname;
		private $email;

		public function __construct($registry) {
			$this->db = $registry->get('db');
			$this->request = $registry->get('request');
			$this->session = $registry->get('session');

			if (isset($this->session->data['user_id'])) {
				$user_query = $this->db->query("SELECT COLUMNS FROM " . DB_DATABASE . ".`ut_" . $table_name . "`;");

				if ($user_query->num_rows) {
					$this->user_id = $user_query->row['user_id'];
					$this->username = $user_query->row['username'];

				} else {
					$this->logout();
				}
			}
		}

		public function login($email, $password) {
			$user_query;

			if ($user_query->num_rows) {
				return true;
			} else {
				return false;
			}

		}

		public function logout() {
			unset($this->session->data['user_id']);

			$this->user_id = '';
			$this->email = '';

			session_destroy();
		}

		public function isLoggedIn() {
	    	return $this->user_id;
	  	}
	}
?>