<?php

	Class Login_Database extends CI_Model {

	// Insert registration data in database
		public function registration_insert($data) {

			// Query to check whether username already exist or not
			$condition = "user_login =" . "'" . $data['userlogin'] . "'";
			$this->db->select('*');
			$this->db->from('m_user');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 0) {

					// Query to insert data in database
					$this->db->insert('m_user', $data);
					if ($this->db->affected_rows() > 0) {
						return true;
					}
				} else {
					return false;
				}
		}

			// Read data using username and password
		public function login($data) {

			$condition = "user_login =" . "'" . $data['userlogin'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
			$this->db->select('*');
			$this->db->from('m_user');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return true;
			} else {
				return false;
			}
		}
		
		public function login_agent($data) {
			$condition = "agent_login =" . "'" . $data['userlogin'] . "' AND " . "agent_password =" . "'" . $data['password'] . "'";
			$this->db->select('*');
			$this->db->from('m_agent');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return true;
			} else {
				return false;
			}
		}

			// Read data from database to show data in admin page
		public function read_user_information($userlogin) {
			$condition = "user_login =" . "'" . $userlogin . "'";
			$this->db->select('*');
			$this->db->from('m_user');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
				return false;
			}
		}
		
		public function read_user_information_agent($userlogin) {
			$condition = "agent_login =" . "'" . $userlogin . "'";
			$this->db->select('*');
			$this->db->from('m_agent');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
				return false;
			}
		}
		
		public function get_user_name($userlogin){
			$condition = "user_login =" . "'" . $userlogin . "'";
			$this->db->select('user_name');
			$this->db->from('m_user');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
				return false;
			}
		}

	}

?>