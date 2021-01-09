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
}
?>