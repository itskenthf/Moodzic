<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Login_model', 'DbLogin');
	}

	public function index()
	{
		$data = $this->input->post();
		$user_login = $this->DbLogin->check_user_login($data);

		if ($user_login == false) {
			$this->session->set_flashdata('error', 'Sorry, its look like your username or password is incorrect.');
			redirect();
		} else {
			$sess_data = array(
				'username' 	=> $user_login['username'],
				'user_id' 	=> $user_login['id'],
				'email' 	=> $user_login['email'],
				'role'      => $user_login['role'],
			);
			$this->session->set_userdata($sess_data);

			if ($user_login['role'] == '1') {
				redirect('home');
			} else {
				redirect('admin/allUsers');
			}
		}
	}
}
