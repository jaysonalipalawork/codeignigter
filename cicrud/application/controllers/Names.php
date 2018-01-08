<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Names extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("N_model", "m");

		$this->load->model("L_model", "l");
	}

	public function index()
	{
		if($this->l->CheckUser())
		{
			$this->load->view('includes/header');
			$this->load->view('home');
		}
		else
		{
			redirect('/');
		}
	}

	public function ShowAllNames()
	{
		$result = $this->m->ShowAllNames();
		echo json_encode($result);
	}

	public function AddNames()
	{
		$result = $this->m->AddNames();
		$msg['success'] = false;
		if($result)
			$msg['success'] = true;

		echo json_encode($msg);
	}

	public function EditNames()
	{
		$result = $this->m->EditNames();
		$msg['success'] = false;
		if($result)
			$msg['success'] = true;

		echo json_encode($result);
	}

	public function DeleteNames()
	{
		$result = $this->m->DeleteNames();
		$msg['success'] = false;
		if($result)
			$msg['success'] = true;

		echo json_encode($result);
	}

	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
