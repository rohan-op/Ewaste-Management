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

	//testing
	public function page()
	{
		$this->load->view("service/profile_service");
	}

}
?>