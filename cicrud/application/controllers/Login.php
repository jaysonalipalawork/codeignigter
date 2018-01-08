<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model("L_model", "m");
	}

	function index(){
		if($this->m->CheckUser())
		{
			redirect('/Names');
		}
		else
		{
			$data['title'] = "Login";
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('includes/header');
				$this->load->view('Login_page',$data);
			} else{
				$this->m->AuthenticateUser();
			}
		}
	}

	public function Register()
	{
		$data['title'] = "Register";
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2','Confirm Password','required','matches[password]' );

		if($this->form_validation->run() === FALSE){
			$this->load->view('includes/header');
			$this->load->view('Register_page', $data);
		} else{
			$this->m->Register();
			redirect('/');
		}
	}

	public function ChangePassword()
	{
		$result = $this->m->ChangePassword();
		$msg['success'] = false;
		if($result)
			$msg['success'] = true;

		echo $result;
	}
}