<?php

class User extends CI_Model {
	public function create($data)
	{
		$query = "INSERT INTO users (name,email,password,alias,birthdate,created_at) VALUES(?,?,?,?,?,NOW())";
		$arr = array(
			'name'=>$data['name'],
			'email'=>$data['email'],
			'password'=>$data['password'],
			'alias'=>$data['alias'],
			'birthdate'=>$data['date']
			);
		$this->db->query($query,$arr);
		$this->session->set_flashdata('success','You have registered!');
		redirect('/');
	}
	public function get_by_email($email)
	{
		$query = "SELECT * FROM users WHERE email=?";
		$arr = array('email'=>$email);
		return $this->db->query($query,$arr)->row_array();
	}
	public function get_by_id($id)
	{
		$query = "SELECT * FROM users WHERE id=?";
		$arr = array('id'=>$id);
		return $this->db->query($query,$arr)->row_array();
	}
	public function get_friends()
	{
		$query = "SELECT friends_tbl.friend,users.alias,users.id FROM users INNER JOIN friends_tbl ON users.id = friends_tbl.friend WHERE friends_tbl.user = ?";
		$arr = array('friends_tbl.user'=>$this->session->userdata('id'));
		return $this->db->query($query,$arr)->result_array();
	}
	public function get_others()
	{
		$query = "SELECT users.alias,users.id FROM users WHERE users.id NOT IN(SELECT friends_tbl.friend 		FROM friends_tbl WHERE friends_tbl.user = ?) AND users.id != ?";
		$arr = array('friends_tbl.user'=>$this->session->userdata('id'),'users.id'=>$this->session->userdata('id'));
		return $this->db->query($query,$arr)->result_array();
	}
	public function add_friend($id)
	{
		$query = "INSERT INTO friends_tbl (user,friend,created_at) VALUES(?,?,NOW())";
		$arr = array('user'=> $this->session->userdata('id'),'friend'=>$id);
		return $this->db->query($query,$arr);
	}
	public function rem_friend($id)
	{
		$query = "DELETE FROM friends_tbl WHERE user = ? AND friend = ?";
		$arr = array('user'=>$this->session->userdata('id'),'friend'=>$id);
		return $this->db->query($query,$arr);
	}
}

?>