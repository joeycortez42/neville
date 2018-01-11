<?php
/**
 * Neville Account User
 *
 * @package		Neville
 * @since		0.8.0
 */
	class ModelAccountUser extends Model {
		/**
		 * Retrieve user by id
		 *
		 * @param int
		 *
		 * @returns array
		 */
		public function getUser($userId) {
			$query = $this->db->query("SELECT id, email, firstname, lastname, api_key, avatar FROM users WHERE id = " . (int)$userId);

			return $query->row;
		}

		/**
		 * Edit user
		 *
		 * @param int
		 * @param string
		 * @param string
		 *
		 * @returns array
		 */
		public function editUser($userId, $firstname, $lastname) {
			$query = $this->db->query("SELECT id, email, firstname, lastname, api_key, avatar FROM users WHERE id = " . (int)$userId);

			return $query->row;
		}
	}
