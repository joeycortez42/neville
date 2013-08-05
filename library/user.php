<?php
	class User {
		private $user_id;
		private $firstname;
		private $lastname;
		private $email;
		private $permissions = array();
	
		public function __construct($registry) {
			$this->db = $registry->get('db');
			$this->request = $registry->get('request');
			$this->session = $registry->get('session');
			
		/*	if (isset($this->session->data['user_id'])) {
				$user_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "user WHERE user_id = '" . (int)$this->session->data['user_id'] . "' AND status = '1'");
				
				if ($user_query->num_rows) {
					$this->user_id = $user_query->row['user_id'];
					$this->username = $user_query->row['username'];
				
					$this->db->query("UPDATE " . DB_PREFIX . "user SET ip = '" . $this->request->server['REMOTE_ADDR'] . "' WHERE user_id = '" . (int)$this->session->data['user_id'] . "'");
				
					$user_group_query = $this->db->query("SELECT permission FROM " . DB_PREFIX . "user_group WHERE user_group_id = '" . (int)$user_query->row['user_group_id'] . "'");
				
					$permissions = unserialize($user_group_query->rows['permission']);
				
					if (is_array($permissions)) {
						foreach ($permissions as $key => $value) {
							$this->permission[$key] = $value;
						}
					}
					//print_r($this->permission[$key]);
				} else {
					$this->logout();
				}
			}*/
		}
	
		public function login($email, $password) {
		/*	$user_query = $this->db->query("SELECT user_id, firstname, lastname, email FROM user WHERE email = '" . $this->db->escape($email) . "' AND password = '" . $this->db->escape(md5($password)) . "' AND status = '1'");

			if ($user_query->num_rows) {
				$this->session->data['user_id'] = $user_query->row['user_id'];
				$this->session->data['firstname'] = $user_query->row['firstname'];
				$this->session->data['lastname'] = $user_query->row['lastname'];
				$this->session->data['email'] = $user_query->row['email'];
				
				$this->user_id = $user_query->row['user_id'];
				$this->firstname = $user_query->row['firstname'];
				$this->lastname = $user_query->row['lastname'];
				$this->email = $user_query->row['email'];			
				
				$user_group_query = $this->db->query("SELECT permission FROM user_group WHERE user_group_id = '" . (int)$user_query->row['user_group_id'] . "'");
				
				$permissions = unserialize($user_group_query->row['permission']);
				
				if (is_array($permissions)) {
					foreach ($permissions as $key => $value) {
						$this->permission[$key] = $value;
					}
				}
			
				return true;
			} else {
				return false;
			}*/
		}
		
		public function logout() {
			unset($this->session->data['user_id']);
	
			$this->user_id = '';
			$this->email = '';
		
			session_destroy();
		}
		
		public function hasPermission($key, $value) {
			if (isset($this->permission[$key])) {
				return in_array($value, $this->permission[$key]);
			} else {
				return false;
			}
		}
		
		public function isLogged() {
	    		return $this->user_id;
	  	}
	}
?>
