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

	public function updateProfilePhoto()
	{
		$this->load->model('usermodel');
		$data = $this->usermodel->getPhoto();
		$this->load->view('user/updateprofilephoto_user',compact('data'));
	}

	public function updatePhoto()
	{
		$config = [
			'upload_path' => './uploads/profilepic/user',
			'allowed_types' => 'jpg|png|jpeg',
			'max_size' => '1000',
			'max_width' => '500',
			'max_height' => '500'
					];
		$this->load->library('upload',$config);
		$this->load->model('usermodel');
		if($this->upload->do_upload())
		{
			$this->load->helper("file");
			$path = $this->usermodel->getPhoto();
			unlink(".".substr($path->profile_img,19));
			//print_r(".".substr($path->profile_img,19));exit;
			$data = $this->upload->data();
			$image_path = base_url("uploads/profilepic/user/".$data['file_name']);
			$post['profile_img'] = $image_path;
			$this->_flashNredirect($this->usermodel->updatePhoto($post),'Profile Photo Updated Successfully','Failed to Update Profile Photo, Please Try Again','profilePage','profilePage');
		}
		else
		{
			$data = $this->usermodel->getPhoto();
			$upload_error = $this->upload->display_errors();
			$this->load->view('user/updateprofilephoto_user',compact('upload_error','data'));
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
 	public function buyPage($pageno)
 	{
 		$this->load->model('usermodel');
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
    	$total_records=$this->usermodel->buy($offset,$no_of_records_per_page,$bool);
    	$bool=false;
		$buy=$this->usermodel->buy($offset,$no_of_records_per_page,$bool);
		$total_pages=ceil(count($total_records)/$no_of_records_per_page);
 		$this->load->view("user/buy_user",compact('buy','total_pages','pageno'));
 	}
 	//Buy RF Product Ends


 	//CART
 	public function cartPage()
 	{
 		$this->load->view("user/cart_user");
 	}
 	//CART Ends
    
    public function addToCart($pageno)
    {
    	if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_POST["addCart"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_POST["hidden_id"],
				'item_name'			=>	$_POST["hidden_name"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_POST["hidden_id"],
			'item_name'			=>	$_POST["hidden_name"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
  return redirect("user/buyPage/$pageno");
    }

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

}
?>