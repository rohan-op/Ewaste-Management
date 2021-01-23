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
						->get('user');
	$pold = $check->row();
	if($pold->pword == $passwordold)
	{
		unset($user['passwordold']);
		unset($user['password']);
		$user['pword'] = $password;
		return $this->db->where('id',$id)
						->update('user',$user);
	}
	else
	{
		return FALSE;
	}
}


public function findProfile()
{
	$id = $this->session->userdata('id');
	$q = $this->db->select(['cname','contact','email','address'])
					->where('id',$id)
					->get('user');
	return $q->row();
}

public function editProfile($user)
{
	$id = $this->session->userdata('id');
	return $this->db->where('id',$id)
						->update('user',$user);
}


public function getPhoto()
{
	$id = $this->session->userdata('id');
	$data = $this->db->select('profile_img')
				->where('id',$id)
				->get('user');
	return $data->row();
}

public function updatePhoto($post)
{
	$id = $this->session->userdata('id');
	return $this->db->where('id',$id)
						->update('user',$post);
}

public function addEwaste($array)
{
	return $this->db->insert('ewaste',$array);

}

public function countProducts()
{
	$x = $this->db->select('p_id')
					->get('products');
	return $x->num_rows();
}

public function getProducts($limit,$offset)
{
	$products = $this->db->select(['p_id','p_price','photo1','photo2','photo3','p_name','p_type'])
							->limit($limit,$offset)
							->get('products');
	return  $products->result();
}

public function buy($offset,$limit,$bool)
{
	
	if($bool==true)
			 {
			 	$query=$this->db->get_where('ewaste',array('buy_nobuy'=>'1'));
			 }
			 else
			 {
			 	$this->db->limit($limit, $offset);
			 	$query=$this->db->get_where('ewaste',array('buy_nobuy'=>'1'));
			 }
			
			return $query->result();
	return $query->result();
}

public function getProduct($p_id)
{
	$x = $this->db->select(['p_id','p_quantity','p_price','p_name'])
					->where('p_id',$p_id)
					->get('products');
	return $x->result();
}



}
?>