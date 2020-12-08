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
}
?>