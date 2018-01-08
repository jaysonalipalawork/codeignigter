<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("L_model", "l");
		$this->load->model("User_model", "user");
	}

	function index()
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

	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function Profile()
	{
		if($this->l->CheckUser())
		{
			$data = $this->user->ViewInformation();
			$this->load->view('includes/header');
			$this->load->view('profile', $data);
		}
		else
		{
			redirect('/');
		}
	}

	public function UpdateInformation()
	{
		$result = $this->user->UpdateInformation();
		$msg['success'] = false;
		if($result)
			$msg['success'] = true;
		redirect(base_url()."User/Profile");
	}

	public function Deactive()
	{
		$result = $this->user->Deactive();
		$msg['success'] = false;
		if($result)
			$msg['success'] = true;

		$this->Logout();
	}
}