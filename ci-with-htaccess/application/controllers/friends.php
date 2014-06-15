<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friends extends CI_Controller {

	public function index()
	{
		$this->load->model('user');
		$friends = $this->user->get_friends();
		$others = $this->user->get_others();
		$data = array('friends'=>$friends,'others'=>$others); 
		$this->load->view('friends_view',$data);
	}
	public function add($id)
	{
		$this->load->model('user');
		$this->user->add_friend($id);
		redirect('/friends');
	}
	public function delete($id)
	{
		$this->load->model('user');
		$this->user->rem_friend($id);
		redirect('/friends');
	}

}
