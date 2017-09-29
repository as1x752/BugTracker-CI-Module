<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bugtracker extends MX_Controller {
	
function __construct() {
parent::__construct();
}

	function view() {
		
		$this->load->model('mdl_bugtracker');
		$data['query'] = $this->mdl_bugtracker->get('ID');
		
		
		$data['module'] = "bugtracker";
		$data['view_file'] = "display";
		echo Modules::run('templates/new_spitfire', $data);
		
	}
	
	function create() {
		$update_id = $this->uri->segment(3);
		
		$submit = $this->input->post('submit', TRUE);
		
		if (!isset($update_id)) {
			$update_id = $this->input->post('update_id', TRUE);
		}
		
		if ($submit=="Submit")
		{
				//get the variables
				$data = $this->get_data_from_post();

				if (is_numeric($update_id))
				{
					//update the item details
					$query = $this->get_where($update_id);
					$num_rows = $query->num_rows();
					
					$this->_update($update_id,$data);
					$flash_msg = "The bug details were successfully updated!";
					$value = "<div class='alert alert-success' role='alert'>".$flash_msg."</div>";
					$this->session->set_flashdata('item', $value);
					redirect('bugtracker/view/');
				}
				else
				{
					//insert a new item
					$this->_insert($data);
					$update_id = $this->get_max(); //get the ID of the new item
					$flash_msg = "The bug was successfully added!";
					$value = "<div class='alert alert-success' role='alert'>".$flash_msg."</div>";
					$this->session->set_flashdata('item', $value);
					redirect('bugtracker/view');
				}
		} 
		elseif ($submit=="Cancel") 
		{
			redirect('bugtracker/view');
		}
		
		if (is_numeric($update_id)) {
			$data = $this->get_data_from_db($update_id);
			$data['$update_id'] = $update_id;
		}else{
			$data = $this->get_data_from_post();
		}
	
		$data['module'] = "bugtracker";
		$data['view_file'] = "form";
		echo Modules::run('templates/spitfire', $data);
	}
	
	function get_data_from_post() {
		$data['TechName'] = $this->input->post('TechName', TRUE);
		$data['BugInfo'] = $this->input->post('BugInfo', TRUE);
		$data['Comments'] = $this->input->post('Comments', TRUE);
		return $data;
	}
	
	function get_data_from_db($update_id) {
		$query = $this->get_where($update_id);
		foreach($query->result() as $row) {
			$data['TechName' ]= $row->TechName;
			$data['BugInfo'] = $row->BugInfo;
			$data['Comments'] = $row->Comments;
		}
		return $data;
	}
	
	function delete($data) {
		$delete_id = $this->uri->segment(3);
		
		if (is_numeric($delete_id)) {
			$this->_delete($delete_id);
		}
		redirect('bugtracker/view');
	}

	//function get($order_by) {
		//$this->load->model('mdl_bugtracker');
		//$query = $this->mdl_bugtracker->get($order_by);
		//return $query;
	//}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model('mdl_bugtracker');
		$query = $this->mdl_bugtracker->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id) {
		$this->load->model('mdl_bugtracker');
		$query = $this->mdl_bugtracker->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value) {
		$this->load->model('mdl_bugtracker');
		$query = $this->mdl_bugtracker->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data) {
		$this->load->model('mdl_bugtracker');
		$this->mdl_bugtracker->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model('mdl_bugtracker');
		$this->mdl_bugtracker->_update($id, $data);
	}

	function _delete($id) {
		$this->load->model('mdl_bugtracker');
		$this->mdl_bugtracker->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('mdl_bugtracker');
		$count = $this->mdl_bugtracker->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model('mdl_bugtracker');
		$max_id = $this->mdl_bugtracker->get_max();
		return $max_id;
	}

	//function _custom_query($mysql_query) {
		//$this->load->model('mdl_bugtracker');
		//$query = $this->mdl_bugtracker->_custom_query($mysql_query);
		//return $query;
	//}
}