<?php
class Service extends MY_Controller{

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
		$this->load->view("service/home_page");
	}
	//Home Page Ends


	//Profile
	public function profilePage()
	{
		$this->load->model('servicemodel');
	 	$service = $this->servicemodel->profile();
		$this->load->view("service/profile_service",compact('service'));
	}
	//Profile Ends


	//Request
	public function requestPage()
	{
		$this->load->view("service/request_service");
	}
	//Request Ends


	//Status
	public function statusPage()
	{
		$this->load->view("service/status_service");
	}
	//Status Ends
}
?>