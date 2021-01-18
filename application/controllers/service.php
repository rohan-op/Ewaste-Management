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

	public function updateProfilePhoto()
	{
		$this->load->model('servicemodel');
		$data = $this->servicemodel->getPhoto();
		$this->load->view('service/updateprofilephoto_service',compact('data'));
	}

	public function updatePhoto()
	{
		$config = [
			'upload_path' => './uploads/profilepic/service',
			'allowed_types' => 'jpg|png|jpeg',
			'max_size' => '1000',
			'max_width' => '500',
			'max_height' => '500'
					];
		$this->load->library('upload',$config);
		$this->load->model('servicemodel');
		if($this->upload->do_upload())
		{
			$this->load->helper("file");
			$path = $this->servicemodel->getPhoto();
			unlink(".".substr($path->profile_img,19));
			//print_r(".".substr($path->profile_img,19));exit;
			$data = $this->upload->data();
			$image_path = base_url("uploads/profilepic/service/".$data['file_name']);
			$post['profile_img'] = $image_path;
			$this->_flashNredirect($this->servicemodel->updatePhoto($post),'Profile Photo Updated Successfully','Failed to Update Profile Photo, Please Try Again','profilePage','profilePage');
		}
		else
		{
			$data = $this->servicemodel->getPhoto();
			$upload_error = $this->upload->display_errors();
			$this->load->view('service/updateprofilephoto_service',compact('upload_error','data'));
		}
	}
	//Profile Ends


	//Request
	public function requestPage()
	{
		$this->load->model('servicemodel');
		if(isset($_GET['pageno']))
    	{
    		$pageno=$_GET['pageno'];
    	}
    	else
    	{
    		$pageno=1;
    	}
    	$no_of_records_per_page=4;
    	$offset=($pageno-1)*$no_of_records_per_page;
    	$bool=true;
    	$total_records=$this->servicemodel->request($offset,$no_of_records_per_page,$bool);
    	$bool=false;
		$request=$this->servicemodel->request($offset,$no_of_records_per_page,$bool);
		$total_pages=ceil(count($total_records)/$no_of_records_per_page);

		$this->load->view("service/request_service",compact('request','total_pages','pageno'));

	}
	//Request Ends
    public function accept()
    {
    	$this->load->model('servicemodel');
    	

    	$post=$this->input->post();
    	$this->servicemodel->acceptProduct($post);
    	return redirect('service/requestPage');
    	
    }

	//Status
	public function statusPage()
	{
		$this->load->model('servicemodel');

		if(isset($_GET['pageno']))
    	{
    		$pageno=$_GET['pageno'];
    	}
    	else
    	{
    		$pageno=1;
    	}
    	$no_of_records_per_page=4;
    	$offset=($pageno-1)*$no_of_records_per_page;
    	$bool=true;
    	$total_records=$this->servicemodel->status($offset,$no_of_records_per_page,$bool);
    	$bool=false;
		$status=$this->servicemodel->status($offset,$no_of_records_per_page,$bool);
		$total_pages=ceil(count($total_records)/$no_of_records_per_page);
        
		$this->load->view("service/status_service",compact('status','total_pages','pageno'));

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