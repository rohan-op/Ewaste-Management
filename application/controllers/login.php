<?php  
class Login extends MY_Controller{


	public function index()
		{
			if($this->session->userdata('id'))
			{
				return redirect('user/dashboard');
			}
			$this->load->helper('form');
			$this->load->view('public/home_page');
		}

	public function publicLogin()
		{
			if($this->session->userdata('id'))
			{
				return redirect('user/dashboard');
			}
			$this->load->helper('form');
			$this->load->view('public/public_login');
		}

	public function publicSignup()
		{
			if($this->session->userdata('id'))
			{
				return redirect('user/dashboard');
			}
			$this->load->helper('form');
			$this->load->view('public/public_signup');
		}

	public function testing()
		{
			$this->load->view('recycler/homepag');
		}


	public function verifyLogin()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email','Email','required|max_length[100]|valid_email');
			$this->form_validation->set_rules('pword','Password','required|max_length[50]');
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

			if($this->form_validation->run())
			{
				$role = $this->input->post('role');
				$email = $this->input->post('email');
				$password = $this->input->post('pword');
				$this->load->model('loginmodel');

				$id = $this->loginmodel->validate_user_login($role,$email,$password);
				if( $id )
					{
						//$this->session->set_userdata('id',$id);
						if($role='User')
						{
							echo "success";
							//return redirect('user/dashboard');
						}

						else if($role='Service')
						{
							return redirect('service/dashboard');
						}

						else
						{
							return redirect('recycler/dashboard');
						}
					}
				else
					{
						$this->_flashNredirect(0,'Accounted Created Successfully ,Try Logging In','Username or Password did not match, Please Try Again');
						//$this->session->set_flashdata('feedback','Username or Password did not match');
						return redirect('login');
					} 
			}
			else
			{
				$this->load->view('public/public_login');
			}
		}

	public function verifySignUp()
	{
		$config = [
			'upload_path' => './uploads/profilepic',
			'allowed_types' => 'jpg|png|jpeg'
		];

		$this->load->library('upload',$config);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname','Fullname','required|alpha_numeric_spaces|max_length[100]');
		$this->form_validation->set_rules('pword','Password','required|max_length[50]');
		$this->form_validation->set_rules('cname','Company Name','required|max_length[100]');
		$this->form_validation->set_rules('role','Role','required|max_length[10]');
		$this->form_validation->set_rules('email','Email ID','required|max_length[100]|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('contact','Contact Number','required|exact_length[10]|is_unique[users.contact]');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		$post = $this->input->post();
		unset($post['submit']);
		if($this->form_validation->run() && $this->upload->do_upload())
		{
			$this->load->model('loginmodel');
			$data = $this->upload->data();
			$image_path = base_url("uploads/profilepic/".$data['orig_name']);
			$post['profile_img'] = $image_path;
			$this->_flashNredirect($this->loginmodel->add_user($post),'Accounted Created Successfully ,Try Logging In','Failed to Create Account, Please Try Again');
		}
		else
		{
			$upload_error = $this->upload->display_errors();
			$this->load->view('public/public_signup',compact('upload_error'));
		}
	}

	public function logout()
	{
		$this->load->helper('url');
		$this->session->unset_userdata('id');
		return redirect('login');
	}

	private function _flashNredirect($tf,$succm,$errm)
	{
		if($tf)
			{
				$this->session->set_flashdata('feedback',$succm);
				$this->session->set_flashdata('class','success');
				return redirect('login/index');
			}
			else
			{
				$this->session->set_flashdata('feedback',$errm);
				$this->session->set_flashdata('class','danger');
				return redirect('login/index');
			}
	}
}
?>