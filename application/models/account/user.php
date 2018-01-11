<?php
	class ModelAccountUser extends Model {
		public function getUser($user_id) {
			$query = $this->db->query("SELECT id, email, firstname, lastname, api_key, avatar FROM users WHERE id = " . (int)$user_id);

			return $query->row;
		}

		public function editUser($user_id, $firstname, $lastname) {
			$query = $this->db->query("SELECT id, email, firstname, lastname, api_key, avatar FROM users WHERE id = " . (int)$user_id);

			return $query->row;
		}
	}
?>