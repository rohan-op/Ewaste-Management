<?php
class Usermodel extends MY_Model{

//Profile
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

public function countUserOrders()
{
	$id = $this->session->userdata('id');
	$x = $this->db->select(['o_id'])
				->where('u_id',$id)
				->get('orders');
	return $x->num_rows();
}

public function getUserOrders($limit,$offset)
{
	$id = $this->session->userdata('id');
	$x = $this->db->select(['o_id','amount','date'])
				->where('u_id',$id)
				->limit($limit,$offset)
				->order_by('date','DESC')
				->get('orders');
	return $x->result();	
}

public function getOrderDetails($o_id)
{
	$x = $this->db->select(['quantity','amount','p_name','p_type','products.p_id','p_img1'])
					->where('o_id',$o_id)
					->join('products','products.p_id = order_items.p_id')
					->get('order_items');
	return $x->result();
}

public function gethomeOrderDetails()
{
	$id= $this->session->userdata('id');
	$x = $this->db->select(['quantity','amount','order_items.date','p_name','p_type','products.p_id','p_img1'])
					->where('u_id',$id)
					->limit(4)
					->join('products','products.p_id = order_items.p_id')
					->get('order_items');
	return $x->result();
}
public function countUserDonations()
{
	$id = $this->session->userdata('id');
	$x = $this->db->select(['e_id'])
				->where('u_id',$id)
				->get('ewaste');
	return $x->num_rows();
}

public function getUserDonations($limit,$offset)
{
	$id = $this->session->userdata('id');
	$x = $this->db->select(['e_id','e_name','date'])
				->where('u_id',$id)
				->limit($limit,$offset)
				->order_by('date','DESC')
				->get('ewaste');
	return $x->result();	
}

public function getDonationDetails($e_id)
{
	$x = $this->db->select(['e_type','e_name','e_age','e_quantity','e_img','date','e_specs'])
					->where('e_id',$e_id)
					//->join('service','service.id = ewaste.s_id')
					//->join('recycler','recycler.id = ewaste.r_id')					
					->get('ewaste');
	return $x->result();
} 
public function gethomeDonationDetails()
{
	$id = $this->session->userdata('id');
	$x = $this->db->select(['e_type','e_name','e_quantity','date'])
	->where('u_id',$id)
	->limit(4)
	//->join('service','service.id = ewaste.s_id')
	//->join('recycler','recycler.id = ewaste.r_id')					
	->get('ewaste');
return $x->result();

}

//Profile Ends


// E-waste Donations
public function addEwaste($array)
{
	return $this->db->insert('ewaste',$array);

}
//E-waste Ends


//Buying RF Products
public function countProducts()
{
	$x = $this->db->select('p_id')
					->get('products');
	return $x->num_rows();
}

public function getProducts($limit,$offset)
{
	$products = $this->db->select(['p_id','p_cost','p_img1','p_img2','p_img3','p_name','p_type'])
							->limit($limit,$offset)
							->get('products');
	return  $products->result();
}

public function gethomeProducts()
{
	$products = $this->db->select(['p_id','p_cost','p_img1','p_img2','p_img3','p_name','p_type'])
							->limit(3)
							->get('products');
	return $products->result();
}

public function countSearchProducts($string)
{
	$x = $this->db->select('p_id')
					->like('p_name',$string)
					->or_like('p_type',$string)
					->get('products');
	return $x->num_rows();
}

public function getSearchProducts($limit,$offset,$string)
{
	$products = $this->db->select(['p_id','p_cost','p_img1','p_img2','p_img3','p_name','p_type'])
							->like('p_name',$string)
							->or_like('p_type',$string)
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
	$x = $this->db->select(['p_id','s_id','p_quantity','p_cost','p_name','p_img1','p_type','service.cname'])
					->where('p_id',$p_id)
					->join('service','service.id = products.s_id')
					->get('products');
	return $x->result();
}

public function getDetails($p_id)
{
	$x = $this->db->select(['p_id','p_name','p_quantity','p_cost','p_type','p_img1','p_img2','p_img3','service.cname','p_specs'])
					->join('service','service.id = products.s_id')
					->where('p_id',$p_id)
					->get('products');
	return $x->row();
}
//Buying RF Ends


//Orders
	public function addOrderTable($data1)
	{
		$this->db->insert('orders',$data1);
		return $this->db->insert_id();
	}

	public function addOrderItems($data2 = array())
	{
		return $this->db->insert_batch('order_items',$data2);
	}
//End Orders
}
?>