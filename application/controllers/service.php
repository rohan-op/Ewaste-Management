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

	//Profile
	public function profilePage()
	{
		$this->load->model('servicemodel');
	 	$service = $this->servicemodel->profile();
		$this->load->view("service/profile_service",compact('service'));
	}

}
?>