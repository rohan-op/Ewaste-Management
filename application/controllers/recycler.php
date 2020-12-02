<?php
class Recycler extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
		if(! $this->session->userdata('id') )
			{
				return redirect('login');
			}
		$this->load->helper('form');
	}

	//Profile
	public function profilePage()
	{
		$this->load->model('recyclermodel');
	 	$recycler = $this->recyclermodel->profile();
		$this->load->view("recycler/profile_recycler",compact('recycler'));
	}

}
?>