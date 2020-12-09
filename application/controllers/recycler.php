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


	//Home Page
	public function homePage()
	{
		$this->load->view("recycler/home_page");
	}
	//Home Page Ends

	//Profile
	public function profilePage()
	{
		$this->load->model('recyclermodel');
	 	$recycler = $this->recyclermodel->profile();
		$this->load->view("recycler/profile_recycler",compact('recycler'));
	}
	//Profile Ends


	//Request
	public function requestPage()
	{
		$this->load->view("recycler/request_recycler");
	}
	//Request Ends


	//Status
	public function statusPage()
	{
		$this->load->view("recycler/status_recycler");
	}
	//Status Ends
}
?>