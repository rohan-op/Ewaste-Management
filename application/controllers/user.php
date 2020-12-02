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

	//Profile
	public function profilePage()
	{
		$this->load->model('usermodel');
	 	$user = $this->usermodel->profile();
		$this->load->view("user/profile_user",compact('user'));
	}
	//Profile Ends
 









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

	//USER PROFILE STARTS
	public function profile()
	{
	 	$this->load->model('usermodel');
	 	$user = $this->usermodel->profile();
	 	$this->load->view('public/user_profile',compact('user'));
	}

	public function change_password()
	{
	 	$this->load->view('public/change_password');
	}

	public function update_password()
	{
	 	$this->load->model('usermodel');
	 	$this->load->library('form_validation');
	 	$this->form_validation->set_rules('password','Password','required|alpha_dash|max_length[20]');
	 	$this->form_validation->set_rules('passwordold','Password','required|alpha_dash|max_length[20]');
	 	$post = $this->input->post();
				unset($post['submit']);
	 	if($this->form_validation->run())
			{
				$password = $this->input->post('password');
				$passwordold = $this->input->post('passwordold');

				$this->_flashNredirect2($this->usermodel->update_password($passwordold,$password,$post),'Password Updated Successfully','Failed to Update Password, Please Try Again');
			}
		else
			{
				$this->load->view('public/change_password');
			}
	}
	//USER PROFILE ENDS

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