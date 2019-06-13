<?php
    class user_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function register($enc_password){
            $data = array(
                'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $enc_password
            );

            return $this->db->insert('users', $data);
		}
		
		public function login($username, $password){
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$query = $this->db->get('users');
			return empty($query->row_array()) ? false : $query->row(0)->id;
		}

		public function user_check($product_id ,$user_id){
			$query = $this->db->get_where('products', array(
				'id' => $product_id,
				'user_id' => $user_id
			));

			return empty($query->row_array()) ? false : true;
		}

		//callbacks
        public function email_check($email){
            $query = $this->db->get_where('users', array('email'=> $email));
            return empty($query->row_array()) ? false : true;
        }

        public function username_check($username){
            $query = $this->db->get_where('users', array('username'=> $username));
			return empty($query->row_array()) ? false : true;
		}
    }
