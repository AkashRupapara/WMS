<?php

class Users extends CI_Controller {
	
	public function show($user_id) {

		// $this->load->model("user_model");

		

		$data['results'] = $this->user_model->get_users($user_id,'jinisha');

		$this->load->view('user_view',$data);

		// foreach ($result as $object ) {

		// 	echo $object->id . "<br>";
		// 	# code...
		// }
	}

	public function insert(){

		$username = "peter";
		$password = "secret";

		$this->user_model->create_users([

			'username' => $username,
			'password' => $password

			]);
	}

	public function update() {

		$id = 3;

		$username = "pony";
		$password = "bekar";

		$this->user_model->update_users([

			'username' => $username,
			'password' => $password

			],$id);
	}

	public function delete(){

		$id = 3;

		$this->user_model->delete_users($id);
	}

	public function login(){

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');

		if($this->form_validation->run() == FALSE) {

			$data = array(

				'errors' => validation_errors()
				);

			$this->session->set_flashdata($data);
			redirect('home');
		}else{

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user_id = $this->user_model->login_user($username,$password);

			if($user_id){

				$user_data = array(

					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true
				);

			$this->session->set_userdata($user_data);

			$this->session->set_flashdata('login_success','U r now logged in');

			// $data['main_view'] = "home_view";
			// $this->load->view('layouts/main', $data,$user_data);

			 redirect('home/index');
			}else{

				$this->session->set_flashdata('login_failed','Not logged in');

				redirect('home/index');

			}
		}
	}

	public function logout(){

		$this->session->sess_destroy();

		redirect('home');

	}

	public function register(){

		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');

		if($this->form_validation->run() == FALSE){

			$data['main_view'] = 'users/register_view';
			$this->load->view('layouts/main',$data);
			// $data = array(
			// 		'errors' => validation_errors()
			// 		);
			// echo $data['errors'];
		}else{

			if($this->user_model->create_users()) {

				$this->session->Set_flashdata('user_registration','User has been registered');
				redirect('home/index');
			}else{

				echo "User not created";
			}

		}
	}

}


 ?>