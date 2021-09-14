<?php

class User_model extends CI_Model {

	public function get_users($user_id,$username) {

		// $this->db->where('id', $user_id);
		// alternate to wehre
		$this->db->where([

			'id' => $user_id,
			'username' => $username

			]);

		$query = $this->db->get('users');

		return $query->result();

		// $config['hostname'] = "localhost";
		// $config['username'] = "root";
		// $config['password'] = "";
		// $config['database'] = "udemy_db";

		// $this->load->database($config);

		// $query = $this->db->query("SELECT * FROM users");

		// return $query->num_fields(); //columns number

		// return $query->num_rows(); //rows number
		// 	$query = $this->db->get('users');

		// 	return $query->result();
	
	}

	public function create_users(){

		$option = ['cost'=> 12];

		$encrypted_pass = password_hash($this->input->post('password'),PASSWORD_BCRYPT,$option);

		$data = array(

				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'email' 	 => $this->input->post('email'),
				'username'   => $this->input->post('username'),
				'password'   => $encrypted_pass

				);

		$insert_data = $this->db->insert('users',$data);

		return $insert_data;
	}

	public function update_users($data,$id) {

		$this->db->where(['id' => $id]);
		$this->db->update('users',$data);
	}

	public function delete_users($id) {

		$this->db->where(['id' => $id]);
		$this->db->delete('users');
	}

	public function login_user($username,$password){

		$this->db->where('username',$username);
		//$this->db->where('password',$password);

		$results = $this->db->get('users');

		$db_password = $results->row(6)->password;

		if(password_verify($password, $db_password)) {

			return $results->row(0)->id;

		}else{

			return false;
		}

	}


}

 ?>