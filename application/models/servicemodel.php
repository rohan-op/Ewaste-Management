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
}
?>