<?php 

class Tasks extends CI_Controller {

	public function display($task_id){

		$data['project_id'] = $this->tasks_model->get_task_project_id($task_id);

		$data['project_name'] = $this->tasks_model->get_task_project_name($data['project_id']);

		$data['task'] = $this->tasks_model->get_task($task_id);
		$data['main_view'] = "tasks/display";
		$this->load->view('layouts/main',$data);

	}

	public function create_task($project_id) {

		$this->form_validation->set_rules('task_name', 'Task Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('task_body', 'Task Description', 'trim|required' );
		$this->form_validation->set_rules('due_date', 'Due Date', 'required' );

		if($this->form_validation->run() == FALSE){

			$data['main_view'] = 'tasks/create_task';
			$this->load->view('layouts/main',$data);
		
		}else{


			$data = array(
					'project_id' => $project_id,
					'task_name' => $this->input->post('task_name'),
					'task_body' => $this->input->post('task_body'),
					'due_date' => $this->input->post('due_date')
					);

			if($this->tasks_model->create_task($data)) {

				$this->session->set_flashdata('task_created', 'Your task has been created');
				redirect("projects/display/". $project_id);

			}
		}

	
	}

	public function edit_task($task_id) {

		$this->form_validation->set_rules('task_name', 'Task Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('task_body', 'Task Description', 'trim|required' );
		$this->form_validation->set_rules('due_date', 'Due Date', 'required' );

		if($this->form_validation->run() == FALSE){

			$data['project_id'] = $this->tasks_model->get_task_project_id($task_id);
			//echo $data['project_id'];
			$data['project_name'] = $this->tasks_model->get_task_project_name($data['project_id']);
			$data['the_task'] = $this->tasks_model->get_task_project_data($task_id);

			$data['main_view'] = 'tasks/edit_task';
			$this->load->view('layouts/main',$data);
		
		}else{


			$data = array(
					'project_id' =>  $this->tasks_model->get_task_project_id($task_id),
					'task_name' => $this->input->post('task_name'),
					'task_body' => $this->input->post('task_body'),
					'due_date' => $this->input->post('due_date')
					);
			echo "hello";
			if($this->tasks_model->edit_task($task_id,$data)) {

				$this->session->set_flashdata('task_updated', 'Your task has been updated');
				redirect("tasks/display/". $task_id);

			}
		}
	}

	public function delete_task($project_id,$task_id){

		$this->tasks_model->delete_task($task_id);
		$this->session->set_flashdata('task_deleted', 'Your Project has been deleted');
		redirect("projects/display/" . $project_id);
	}

	public function mark_complete($task_id){


		if($this->tasks_model->mark_complete($task_id)){

			$project_id = $this->tasks_model-> get_task_project_id($task_id);
			$this->session->set_flashdata('mark_done','This task complete');
			redirect('projects/display/'. $project_id);
		}
	} 

	public function mark_incomplete($task_id){


		if($this->tasks_model->mark_incomplete($task_id)){

			$project_id = $this->tasks_model-> get_task_project_id($task_id);
			$this->session->set_flashdata('unmark_done','This task incomplete');
			redirect('projects/display/'. $project_id);
		}
	} 

}

 ?>