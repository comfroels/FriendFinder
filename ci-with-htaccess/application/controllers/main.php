<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');
class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('main_view');
	}
	public function register()
	{
		$this->load->model('user');
		$name = $this->input->post('name');
		$alias = $this->input->post('alias');
		$password = $this->input->post('password');
		$confirm = $this->input->post('confirm');
		$email = $this->input->post('email');
		$date = $this->input->post('date');
		$checkEmail = $this->user->get_by_email($email);
		$newDate = strtotime($date);

		if ($checkEmail)
		{
			$this->session->set_flashdata('error','That email already exists!');
			redirect('/');
		}
		else
		{
			if ($password == $confirm){
				if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
						$arr = array(
							'name'=>$name,
							'alias'=>$alias,
							'password'=>md5($password),
							'email'=>$email,
							'date'=>date('Y-m-d H:i:s',$newDate)
							);
						$this->user->create($arr);
					
				}
				else {
					$this->session->set_flashdata('error','That is not a valid email!');
					redirect('/');
				}
			}
			else {
				$this->session->set_flashdata('error','Passwords do not match!');
				redirect('/');
			}
		}
	}
	public function login()
	{
		$this->load->model('user');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$checkPassword = md5($password);
		$checkEmail = $this->user->get_by_email($email);
		if ($checkEmail) {

			if ($checkPassword == $checkEmail['password']){
				$arr = array(
					'id'=>$checkEmail['id'],
					'name'=>$checkEmail['name'],
					'email'=>$checkEmail['email'],
					'birth'=>$checkEmail['birthdate'],
					'alias'=>$checkEmail['alias'],
					'logged_in'=>TRUE
					);
				$this->session->set_userdata($arr);
				redirect('/friends');
			}
			else {
				$this->session->set_flashdata('login_error','Invalid email/password');
				redirect('/');
			}
		}
		else {
			$this->session->set_flashdata('login_error','Invalid email/password');
			redirect('/');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}