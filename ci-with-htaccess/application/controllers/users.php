<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function profile($id)
	{
		$this->load->model('user');
		$user = $this->user->get_by_id($id);
		$this->load->view('profile_view',array('user'=>$user));
	}
	
}