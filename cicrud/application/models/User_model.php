<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_model extends CI_Model {
	public function ViewInformation()
	{
		$this->db->where("usernameid", $this->session->userdata('loginid'));
		$query = $this->db->get("tbl_userinformation");
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $data) {
				$data['firstname'] = $data['firstname'];
				$data['middlename'] = $data['middlename'];
				$data['lastname'] = $data['lastname'];
				$data['address'] = $data['address'];
				$data['role'] = $data['role'];
			}
		}
		else
		{
			$data['firstname'] = "";
			$data['middlename'] = "";
			$data['lastname'] = "";
			$data['address'] = "";
			$data['role'] ="";
		}
		return $data;
	}

	public function UpdateInformation()
	{
		$username =  $this->session->userdata('loginid');
		$data = array(
		    'firstname' => $this->input->post('firstname'),
		    'middlename' => $this->input->post('middlename'),
		    'lastname' => $this->input->post('lastname'),
		    'role' => $this->input->post('role'),
		    'address' => $this->input->post('address')
		); 
		$this->db->where("usernameid", $username); 
		$this->db->update("tbl_userinformation", $data);
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function Deactive()
	{
		$usernameid = $this->session->userdata('loginid');
		$this->db->delete("tbl_userinformation", "usernameid = $usernameid");

		$this->db->delete("tbl_login", "loginid = $usernameid");
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function ChangePassword()
	{
		
	}
}