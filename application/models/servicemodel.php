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
}
?>