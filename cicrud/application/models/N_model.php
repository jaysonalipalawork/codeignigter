<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class N_model extends CI_Model {
	public function ShowAllNames()
	{
		$query = $this->db->get('tbl_name');
		if($query->num_rows() > 0)
			return $query->result();
		else
			return false;
	}

	public function AddNames()
	{
		$data = array( 
		   'fullname' => $this->input->post('username')
		); 
		$this->db->insert('tbl_name', $data);
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function EditNames()
	{
		$id =  $this->input->post('id');
		$data = array(
		    'fullname' => $this->input->post('newname')
		); 
		$this->db->where("nameid", $id); 
		$this->db->update("tbl_name", $data);
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function DeleteNames()
	{
		$id =  $this->input->post('id');
		$this->db->delete("tbl_name", "nameid = $id");
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
}

