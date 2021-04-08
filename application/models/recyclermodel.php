<?php
class Recyclermodel extends MY_Model{

		public function profile()
		{
			$id = $this->session->userdata('id');
			$recycler = $this->db->select(['fname','cname','contact','email','address','profile_img'])
							->where('id',$id)
							->get('recycler');
			return $recycler->row();
		}

		public function update_password($passwordold,$password,Array $recycler)
		{
			$id = $this->session->userdata('id');
			$check = $this->db->select(['pword'])
								->where('id',$id)
								->get('recycler');
			$pold = $check->row();
			if($pold->pword == $passwordold)
			{
				unset($recycler['passwordold']);
				unset($recycler['password']);
				$recycler['pword'] = $password;
				return $this->db->where('id',$id)
								->update('recycler',$recycler);
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
							->get('recycler');
			return $q->row();
		}

		public function editProfile($recycler)
		{
			$id = $this->session->userdata('id');
			return $this->db->where('id',$id)
								->update('recycler',$recycler);
		}

		public function getPhoto()
		{
			$id = $this->session->userdata('id');
			$data = $this->db->select('profile_img')
						->where('id',$id)
						->get('recycler');
			return $data->row();
		}

		public function updatePhoto($post)
		{
			$id = $this->session->userdata('id');
			return $this->db->where('id',$id)
								->update('recycler',$post);
		}

        public function getDetails($e_id,$table)
        {
		   	if( $table=='ewaste'  )
		   	{
			     $x = $this->db->select(['e_id','e_name','e_quantity','e_age','e_type','e_img','e_specs','service_feedback'])
							->where('e_id',$e_id)
							->get('ewaste');
				}
				// else
				// {
				// 	$x=$this->db->select(['order_items.p_id','p_name','amount','p_type','p_img1','p_specs'])
				// 			->where('order_items.p_id',$e_id)
				// 			->join('products','products.p_id=order_items.p_id')
				// 			->get('order_items');
				// }

			  return $x->row();
         }
		public function request($limit,$offset)
		{
			$this->db->limit($limit, $offset);
			$query=$this->db->get_where('ewaste',array('r_id'=>'0','buy_nobuy'=>'0'));
			return $query->result();
		}

		public function acceptProduct($post)
        {
        	$this->db->update('ewaste',
        array('r_id'=>$this->session->userdata('id')),array('e_id'=>$post['accept'])) ;
        }


		public function status($limit,$offset)
		{
			$this->db->limit($limit, $offset);
			$query=$this->db->get_where('ewaste',array('r_id'=>$this->session->userdata('id'),'recycler_feedback'=>''));
			return $query->result();
		}

		public function getUserID($eid)
		{
			$id = $this->db->select('u_id')
							->where('e_id',$eid)
							->get('ewaste');
			return $id->row()->u_id;
			//print_r($id->row()->u_id); exit;
		}

		public function addStatus($post,$eid,$u_id)
		{

			$points = $this->db->select('creditpoints')
						->where('id', $u_id)
						->get('user');
			$total = $points->row()->creditpoints + $post['creditpoints'];
			$user = array('creditpoints' => $total);
			//print_r($user); exit;

			$this->db->where('id',$u_id)
						->update('user',$user);
			return $this->db->where('e_id',$eid)
								->update('ewaste',array('recycler_feedback'=>$post['recycler_feedback'],'r_creditpoints'=>$post['creditpoints']));
		}
		public function countProducts()
        {
	        $x = $this->db->get_where('ewaste',array('r_id'=>'0','buy_nobuy'=>'0'));
	        return $x->num_rows();
        }
        public function countProductsStatus()
        {
	        $x = $this->db->get_where('ewaste',array('r_id'=>$this->session->userdata('id'),'recycler_feedback'=>''));
	        return $x->num_rows();
        }

        public function countRecycledProducts()
        {
        	 $x = $this->db->get_where('ewaste',array('r_id'=>$this->session->userdata('id'),'recycler_feedback !='=>''));
	        return $x->num_rows();
        }

        public function recycled($limit,$offset)
		{
			$this->db->limit($limit, $offset);
			$query=$this->db->get_where('ewaste',array('r_id'=>$this->session->userdata('id'),'recycler_feedback !='=>''));
			return $query->result();
		}

        
}
?>