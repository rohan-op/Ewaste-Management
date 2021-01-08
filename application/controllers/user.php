<?php
class User extends MY_Controller{

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
		$this->load->view("user/home_page");
	}
	//Home Page Ends

	//Profile
	public function profilePage()
	{
		$this->load->model('usermodel');
	 	$user = $this->usermodel->profile();
		$this->load->view("user/profile_user",compact('user'));
	}

	public function changePassword()
	{
		$this->load->view("user/changepassword_user");
	}

	public function updatePassword()
	{
	 	$this->load->model('usermodel');
	 	$this->load->library('form_validation');
	 	$this->form_validation->set_rules('password','Password','required|alpha_dash|max_length[50]');
	 	$this->form_validation->set_rules('passwordold','Password','required|alpha_dash|max_length[50]');
	 	$post = $this->input->post();
				unset($post['submit']);
	 	if($this->form_validation->run())
			{
				$password = $this->input->post('password');
				$passwordold = $this->input->post('passwordold');

				$this->_flashNredirect($this->usermodel->update_password($passwordold,$password,$post),'Password Updated Successfully','Failed to Update Password, Please Try Again','profilePage','profilePage');
			}
		else
			{
				$this->load->view('public/change_password');
			}
	}

	public function editProfile()
	{
		$this->load->model('usermodel');
		$profile = $this->usermodel->findProfile();
		$this->load->view('user/editprofile_user',compact('profile'));
	}

	public function updateProfile()
	{
		$this->load->model('usermodel');
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
	 		$this->_flashNredirect($this->usermodel->editProfile($post),'Profile Updated Successfully','Failed to Update Profile, Please Try Again','profilePage','profilePage');
	 	}
	 	else
	 	{
	 		$profile = $this->usermodel->findProfile();
	 		$this->load->view('user/editprofile_user',compact('profile'));
	 	}
	}
	//Profile Ends
 	

 	//Donate E-waste
	public function donatePage()
	{
		$this->load->view("user/donate_user");	
	}

	public function donateEwaste()
	{
		$this->load->model('usermodel');
		$config = [
				'upload_path' => './uploads/ewaste',
				'allowed_types' => 'jpg|gif|png|jpeg'
			];
			$this->load->library('upload',$config);
			$this->load->library('form_validation');
			$this->form_validation->set_rules('e_type','Type','required');
			$this->form_validation->set_rules('e_name','Model Name','required|max_length[100]');
			$this->form_validation->set_rules('e_age','Age of E-waste','required|is_natural_no_zero');
			$this->form_validation->set_rules('e_quantity','Quantity of E-waste','required|is_natural_no_zero');
			$this->form_validation->set_rules('e_specs','Specification','required|max_length[400]');
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
			$post = $this->input->post();
			unset($post['submit']);
			if($this->form_validation->run() && $this->upload->do_upload())
			{
				$data = $this->upload->data();
				$id = $this->session->userdata('id');
				//$data['orig_name'] = $post['date'].$id.$data['file_ext'];
				//$data['file_name'] = $post['date'].$id.$data['file_ext'];
				//file name problem to be solved
				$image_path = base_url("uploads/ewaste/".$data['file_name']);
				$post['e_img'] = $image_path;
				$post['u_id'] = $this->session->userdata('id');
				$this->_flashNredirect($this->usermodel->addEwaste($post),'Congratulations! E-waste Uploaded Successfully','Oh Snap! Failed to Upload E-waste, Please Try Again','donatePage','donatePage');
			}
			else
			{
				$upload_error = $this->upload->display_errors();
				$this->load->view('user/donate_user',compact('upload_error'));
			}
	}
 	//Donate E-waste Ends


 	//Buy RF Products
 	public function buyPage()
 	{
 		$this->load->view("user/buy_user");
 	}
 	//Buy RF Product Ends


 	//CART
 	public function cartPage()
 	{
 		$this->load->view("user/cart_user");
 	}
 	//CART Ends


	//FEEDBACK FUNCTION
	private function _flashNredirect($tf,$succm,$errm,$page1,$page2)
	{
		if($tf)
			{
				$this->session->set_flashdata('feedback',$succm);
				$this->session->set_flashdata('class','primary');
				return redirect('user/'.$page1);
			}
			else
			{
				$this->session->set_flashdata('feedback',$errm);
				$this->session->set_flashdata('class','danger');
				return redirect('user/'.$page2);
			}
	}
	//FEEDBACK ENDS




	//SHOW ARTICLES STARTS
	public function dashboard()
	{
	 	$this->load->helper('form');
	 	$this->load->library('pagination');
			$config = [
						'base_url' => base_url('user/dashboard'),
						'per_page' => 5,
						'total_rows' => $this->articlesmodel->count_all_articles(),
						'full_tag_open' => "<ul class='pagination'>",
						'full_tag_close' => "</ul>",
						'first_tag_open' => "<li class='page-item'>",
						'first_tag_close' => "</li>",
						'last_tag_open' => "<li class='page-item'>",
						'last_tag_close' => "</li>",
						'next_tag_open' => "<li class='page-item'>",
						'next_tag_close' => "</li>",
						'prev_tag_open' => "<li class='page-item'>",
						'prev_tag_close' => "</li>",
						'num_tag_open' => "<li class='page-item'>",
						'num_tag_close' => "</li>",
						'cur_tag_open' => "<li class='page-item active'><a class='page-link'>",
						'cur_tag_close' => "</a></li>",
						'attributes' => array('class' => 'page-link'),
			];
		$this->pagination->initialize($config);
		$articles = $this->articlesmodel->all_articles_list($config['per_page'],$this->uri->segment(3));
	 	$this->load->view("public/articles_list",compact('articles'));
	}

	public function search()
	{
	 	$this->load->library('form_validation');
	 	$this->form_validation->set_rules('search','Search','required');
	 	if(!$this->form_validation->run())
	 	{
	 		$this->index();
	 	}
	 	else
	 	{
	 		$query = $this->input->post('search');
	 		return redirect("user/search_results/$query");
	 	}
	}

	public function search_results($query)
	{
	 	$this->load->helper('form');
	 	$this->load->model('articlesmodel');
	 	$this->load->library('pagination');
			$config = [
						'base_url' => base_url("user/search_results/$query"),
						'per_page' => 5,
						'total_rows' => $this->articlesmodel->count_search_results($query),
						'full_tag_open' => "<ul class='pagination'>",
						'full_tag_close' => "</ul>",
						'first_tag_open' => "<li class='page-item'>",
						'first_tag_close' => "</li>",
						'last_tag_open' => "<li class='page-item'>",
						'last_tag_close' => "</li>",
						'next_tag_open' => "<li class='page-item'>",
						'next_tag_close' => "</li>",
						'prev_tag_open' => "<li class='page-item'>",
						'prev_tag_close' => "</li>",
						'num_tag_open' => "<li class='page-item'>",
						'num_tag_close' => "</li>",
						'cur_tag_open' => "<li class='page-item active'><a class='page-link'>",
						'cur_tag_close' => "</a></li>",
						'attributes' => array('class' => 'page-link'),
			];
		$this->pagination->initialize($config);
		$articles = $this->articlesmodel->search($query,$config['per_page'],$this->uri->segment(4));
		$this->load->view('public/search_results',compact('articles'));
	}

	public function view_article($id)
	{
	 	$this->load->helper('form');
	 	$this->load->model('articlesmodel');
	 	$article = $this->articlesmodel->find($id);
	 	$this->load->view('public/article_detail',compact('article'));
	}
	//SHOW ARTICLES ENDS



	//MAINTENANCE LIST STARTS
		public function maintenancelist()
		{
		 	$this->load->helper('form');
		 	$this->load->library('pagination');
		 	$this->load->model('maintenancemodel');
		 	$this->load->model('usermodel');
		 	$sqfeet = $this->usermodel->get_sq_feet();
		 	//print_r(array($sqfeet));exit();
				$config = [
							'base_url' => base_url('user/dashboard'),
							'per_page' => 5,
							'total_rows' => $this->maintenancemodel->num_rows_users(),
							'full_tag_open' => "<ul class='pagination'>",
							'full_tag_close' => "</ul>",
							'first_tag_open' => "<li class='page-item'>",
							'first_tag_close' => "</li>",
							'last_tag_open' => "<li class='page-item'>",
							'last_tag_close' => "</li>",
							'next_tag_open' => "<li class='page-item'>",
							'next_tag_close' => "</li>",
							'prev_tag_open' => "<li class='page-item'>",
							'prev_tag_close' => "</li>",
							'num_tag_open' => "<li class='page-item'>",
							'num_tag_close' => "</li>",
							'cur_tag_open' => "<li class='page-item active'><a class='page-link'>",
							'cur_tag_close' => "</a></li>",
							'attributes' => array('class' => 'page-link'),
				];
			$this->pagination->initialize($config);
			$bills = $this->maintenancemodel->bill_list_users($config['per_page'],$this->uri->segment(3));
			//print_r($bills);exit();
		 	$this->load->view("public/maintenance_list",compact('bills','sqfeet'));
		}
	//MAINTENANCE LIST ENDS

	//FEEDBACK FUNCTION
	private function _flashNredirect2($tf,$succm,$errm)
	{
		if($tf)
			{
				$this->session->set_flashdata('feedback',$succm);
				$this->session->set_flashdata('class','success');
				return redirect('user/profile');
			}
			else
			{
				$this->session->set_flashdata('feedback',$errm);
				$this->session->set_flashdata('class','danger');
				return redirect('user/profile');
			}
	}
	//FEEDBACK ENDS
}
?>