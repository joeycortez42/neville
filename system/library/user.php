<?php
	class User {
		private $user_id;
		private $email;

		public function __construct($registry) {
			$this->db = $registry->get('db');
			$this->request = $registry->get('request');
			$this->session = $registry->get('session');

			if (isset($this->session->data['id'])) {
				$user_query = $this->db->query("SELECT id FROM users WHERE id = '" . (int)$this->session->data['id'] . "' AND status = 1");

				if ($user_query->num_rows) {
					$this->user_id = $user_query->row['id'];
					$this->email = $user_query->row['email'];
				} else {
					$this->logout();
				}
			}
		}

		public function login($email, $password) {
			$user_query = $this->db->query("SELECT id, email FROM users WHERE email = '" . $email . "' AND password = '" . md5($password) . "' AND status = 1");

			if ($user_query->num_rows) {
				$this->session->data['id'] = $user_query->row['id'];
				$this->session->data['email'] = $user_query->row['email'];

				$this->user_id = $user_query->row['id'];
				$this->email = $user_query->row['email'];

				return true;
			} else {
				return false;
			}

		}

		public function logout() {
			unset($this->session->data['id']);
			unset($this->session->data['email']);

			$this->user_id = '';
			$this->email = '';

			session_destroy();
		}

		public function isLoggedIn() {
	    	return $this->user_id;
	  	}
	}
?>