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
				$user_query = $this->db->query("SELECT user_id FROM user WHERE user_id = '" . (int)$this->session->data['user_id'] . "' AND status = 1");

				if ($user_query->num_rows) {
					$this->user_id = $user_query->row['user_id'];
					$this->firstname = $user_query->row['firstname'];
					$this->lastname = $user_query->row['lastname'];
					$this->email = $user_query->row['email'];

					$this->db->query("UPDATE user SET ip = '" . $this->request->server['REMOTE_ADDR'] . "' WHERE user_id = '" . (int)$this->session->data['user_id'] . "'");
				} else {
					$this->logout();
				}
			}
		}

		public function login($email, $password) {
			$user_query = $this->db->query("SELECT user_id, firstname, lastname, email FROM user WHERE email = '" . $email . "' AND password = '" . md5($password) . "' AND status = 1");

			if ($user_query->num_rows) {
				$this->session->data['user_id'] = $user_query->row['user_id'];
				$this->session->data['firstname'] = $user_query->row['firstname'];
				$this->session->data['lastname'] = $user_query->row['lastname'];
				$this->session->data['email'] = $user_query->row['email'];

				$this->user_id = $user_query->row['user_id'];
				$this->firstname = $user_query->row['firstname'];
				$this->lastname = $user_query->row['lastname'];
				$this->email = $user_query->row['email'];

				return true;
			} else {
				return false;
			}

		}

		public function logout() {
			unset($this->session->data['user_id']);
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