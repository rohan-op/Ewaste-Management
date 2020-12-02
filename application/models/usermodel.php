<?php
class Usermodel extends MY_Model{

public function profile()
{
	$id = $this->session->userdata('id');
	$user = $this->db->select(['fname','cname','contact','email','address','profile_img'])
					->where('id',$id)
					->get('user');
					//print_r($user->result());exit;
	return $user->row();
}

public function update_password($passwordold,$password,Array $user)
{
	$id = $this->session->userdata('id');
	$check = $this->db->select(['pword'])
						->where('id',$id)
						->get('users');
	$pold = $check->row();
						//print_r($password);exit();
	if($pold->pword == $passwordold)
	{
		unset($user['passwordold']);
		unset($user['password']);
		$user['pword'] = $password;
		return $this->db->where('id',$id)
						->update('users',$user);
	}
	else
	{
		return FALSE;
	}
}

public function get_sq_feet()
{
	$id = $this->session->userdata('id');
	$sqfeet = $this->db->select('sqfeet')
						->where('id',$id)
						->get('users');
	return $sqfeet->row();
}


}
?>