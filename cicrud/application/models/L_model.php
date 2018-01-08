<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class L_model extends CI_Model {

	public function CheckUser()
	{
		if($this->session->userdata('username') !== null)
			return TRUE;
		else
			return FALSE;
	}

	public function Register()
	{
		$this->load->model("PasswordHash_model", "ph");
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->ph->HashPassword($this->input->post('password'))
		);
		$this->db->insert('tbl_login', $data);

		
		$this->db->order_by("loginid", "desc");
		$query = $this->db->get('tbl_login', 1); 
		if($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $data) 
			{
				$data1 = array(
					'usernameid' => $data['loginid']
				);
				$this->db->insert('tbl_userinformation', $data1);
			}
		}		
	}

	public function AuthenticateUser()
	{
		$this->load->model("PasswordHash_model", "ph");
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->db->where('username', $username);
		$result = $this->db->get('tbl_login');
		if($result->num_rows() > 0)
		{
			foreach ($result->result_array() as $data) {
				if($this->ph->CheckPassword($password, $data['password']))
				{
					$this->session->set_userdata('username',$data['username']);
					$this->session->set_userdata('loginid',$data['loginid']);
					redirect('user/profile');
				}
				else
				{
					redirect('/');
				}
			}	
		}
		else
		{
			redirect('/');
		}
	}

	public function ChangePassword()
	{
		$id =  $this->session->userdata('loginid');
		$old = $this->input->post('old');
		$n = $this->input->post('newpass');
		// $cn = $this->input->post('cnewpass');
		$this->load->model("PasswordHash_model", "ph");
		$this->db->where('loginid', $id);
		$query = $this->db->get('tbl_login');
		if($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $data)
			{
				if($this->ph->CheckPassword($old, $data['password']))
				{
					$data = array(
					    'password' =>  $this->ph->HashPassword($n)
					); 
					$this->db->where('loginid', $id);
					$this->db->update("tbl_login", $data);
					return TRUE;
				}
				else
				{
					return FALSE;
				}
			}
		}
	}
}