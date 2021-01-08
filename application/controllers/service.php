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

	public function changePassword()
	{
		$this->load->view("service/changepassword_service");
	}

	public function updatePassword()
	{
	 	$this->load->model('servicemodel');
	 	$this->load->library('form_validation');
	 	$this->form_validation->set_rules('password','Password','required|alpha_dash|max_length[50]');
	 	$this->form_validation->set_rules('passwordold','Password','required|alpha_dash|max_length[50]');
	 	$post = $this->input->post();
				unset($post['submit']);
	 	if($this->form_validation->run())
			{
				$password = $this->input->post('password');
				$passwordold = $this->input->post('passwordold');

				$this->_flashNredirect($this->servicemodel->update_password($passwordold,$password,$post),'Password Updated Successfully','Failed to Update Password, Please Try Again','profilePage','profilePage');
			}
		else
			{
				$this->load->view('public/change_password');
			}
	}

	public function editProfile()
	{
		$this->load->model('servicemodel');
		$profile = $this->servicemodel->findProfile();
		$this->load->view('service/editprofile_service',compact('profile'));
	}

	public function updateProfile()
	{
		$this->load->model('servicemodel');
	 	$this->load->library('form_validation');
	 	$this->form_validation->set_rules('email','Email','required|max_length[100]|valid_email');
	 	$this->form_validation->set_rules('contact','Contact No','required|exact_length[10]');
	 	$this->form_validation->set_rules('cname','Company Name','required|max_length[100]');
	 	$this->form_validation->set_rules('address','Address','required|max_length[250]');
	 	$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
	 	$post = $this->input->post();
	 	unset($post['submit']);
	 	if($this->form_validation->run())
	 	{
	 		$this->_flashNredirect($this->servicemodel->editProfile($post),'Profile Updated Successfully','Failed to Update Profile, Please Try Again','profilePage','profilePage');
	 	}
	 	else
	 	{
	 		$profile = $this->servicemodel->findProfile();
	 		$this->load->view('service/editprofile_service',compact('profile'));
	 	}
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


	//FEEDBACK FUNCTION
	private function _flashNredirect($tf,$succm,$errm,$page1,$page2)
	{
		if($tf)
			{
				$this->session->set_flashdata('feedback',$succm);
				$this->session->set_flashdata('class','primary');
				return redirect('service/'.$page1);
			}
			else
			{
				$this->session->set_flashdata('feedback',$errm);
				$this->session->set_flashdata('class','danger');
				return redirect('service/'.$page2);
			}
	}
	//FEEDBACK ENDS
}
?>