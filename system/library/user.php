<?php
/**
 * Neville User Class
 *
 * @package		Neville
 * @since		0.4.0
 */
	class User {
		private $userId;
		private $email;

		/**
		 * Retrieve registry values for User Class
		 *
		 * @param array
		 */
		public function __construct($registry) {
			$this->db = $registry->get('db');
			$this->request = $registry->get('request');
			$this->session = $registry->get('session');

			if (isset($this->session->data['id'])) {
				$userQuery = $this->db->query("SELECT id, email FROM users WHERE id = " . (int)$this->session->data['id'] . " AND status = 1");

				if ($userQuery->num_rows) {
					$this->session->data['id'] = $userQuery->row['id'];
					$this->session->data['email'] = $userQuery->row['email'];

					$this->userId = $userQuery->row['id'];
					$this->email = $userQuery->row['email'];
				} else {
					$this->logout();
				}
			}
		}

		/**
		 * Attempt user log in via email and password
		 *
		 * @param string
		 * @param string
		 *
		 * @returns bool
		 */
		public function login($email, $password) {
			$userQuery = $this->db->query("SELECT id, email FROM users WHERE email = '" . $email . "' AND password = '" . md5($password) . "' AND status = 1");

			if ($userQuery->num_rows) {
				$this->session->data['id'] = $userQuery->row['id'];
				$this->session->data['email'] = $userQuery->row['email'];

				$this->userId = $userQuery->row['id'];
				$this->email = $userQuery->row['email'];

				return true;
			} else {
				return false;
			}
		}

		/**
		 * Log user out
		 */
		public function logout() {
			unset($this->session->data['id']);
			unset($this->session->data['email']);

			$this->userId = '';
			$this->email = '';

			session_destroy();
		}

		/**
		 * Check if user is logged in
		 *
		 * @returns int
		 */
		public function isLoggedIn() {
			return $this->userId;
		}
	}
