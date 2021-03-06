<?php
class Servicemodel extends MY_Model{
     
		public function profile()
		{
			$id = $this->session->userdata('id');
			$service = $this->db->select(['fname','cname','contact','email','address','profile_img'])
							->where('id',$id)
							->get('service');
			return $service->row();
		}

		public function update_password($passwordold,$password,Array $service)
		{
			$id = $this->session->userdata('id');
			$check = $this->db->select(['pword'])
								->where('id',$id)
								->get('service');
			$pold = $check->row();
			if($pold->pword == $passwordold)
			{
				unset($service['passwordold']);
				unset($service['password']);
				$service['pword'] = $password;
				return $this->db->where('id',$id)
								->update('service',$service);
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
							->get('service');
			return $q->row();
		}

		public function editProfile($service)
		{
			$id = $this->session->userdata('id');
			return $this->db->where('id',$id)
								->update('service',$service);
		}

		public function getPhoto()
		{
			$id = $this->session->userdata('id');
			$data = $this->db->select('profile_img')
						->where('id',$id)
						->get('service');
			return $data->row();
		}

		public function updatePhoto($post)
		{
			$id = $this->session->userdata('id');
			return $this->db->where('id',$id)
								->update('service',$post);
		}

		public function request($limit,$offset)
		{
			 
			 	$this->db->limit($limit, $offset);
			 	$query=$this->db->get_where('ewaste',array('s_id'=>'0'));
			
			return $query->result();
		}
		public function status($limit,$offset)
		{
			
			 	$this->db->limit($limit, $offset);
			 	$query=$this->db->get_where('ewaste',array('s_id'=>$this->session->userdata('id'),'buy_nobuy'=>'1'));
			
			return $query->result();
		}
		public function acceptProduct($post)
		{
			 $this->db->update('ewaste',
        array('s_id'=>$this->session->userdata('id')),array('e_id'=>$post['hiddenAccept'])) ;
		}
		public function requestForward($post)
		{
			$this->db->update('ewaste',array('buy_nobuy'=>'0'),array('e_id'=>$post['forward']));
		}
		public function countProducts()
        {
	        $x = $this->db->get_where('ewaste',array('s_id'=>'0'));
	        return $x->num_rows();
        }
        public function countProductsStatus()
        {
	        $x = $this->db->get_where('ewaste',array('s_id'=>$this->session->userdata('id'),'buy_nobuy'=>'1'));
	        return $x->num_rows();
        }

}
?>