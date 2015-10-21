<?php

class Users extends Public_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		$users = new User();
		$data['users'] = $users->order_by('id','desc')->get_page();
		$this->template->build('admin/user_index',$data);
	}
	
	function inc_left()
	{
		if(is_login())
		{
			$data['user'] = new User($this->session->userdata('id'));
			$this->load->view('inc_member',$data);
		}
		else
		{
			$this->load->view('inc_signin');
		}
		
	}
	
	function form($id=FALSE)
	{
		$data['user'] = new User($id);
		$levels = new Level();
		$data['levels'] = $levels->get();
		$this->template->build('admin/user_form',$data);
	}
	
	function register()
	{
		//$this->template->append_metadata(js_datepicker());
		$this->template->build('register');
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$user = new User($id);
			$user->from_array($_POST);
			$user->save();
			set_notify('success','บันทึกข้อมูลเรียบร้อยแล้วค่ะ');
			redirect('users/admin/users');
		}
	}
	
	function signup()
	{
		if($_POST)
		{	
			$user = new User();
			$user->from_array($_POST);
			$user->save();
			$_POST['user_id'] = $user->id;
			$user->profile->from_array($_POST);
			$user->profile->save();
			email_login($_POST['email'], $_POST['password']);
			redirect('home');
		}
	}
	
	function signin()
	{
		if($_POST)
		{
			if(email_login($_POST['username'], $_POST['password']))
			{
				set_notify('success', 'ยินดีต้อนรับเข้าสู่ระบบค่ะ');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				set_notify('error', 'ชื่อผู้ใช้หรือรหัสผ่านผิดพลาดค่ะ');
				redirect($_SERVER['HTTP_REFERER']);
			}	
		}
		else
		{
			set_notify('error', 'กรุณาทำการล็อคอินค่ะ');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	function signout()
	{
		logout();
		set_notify('error', 'ออกจากระบบเรียบร้อยแล้วค่ะ');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function check_email()
	{
		$user = new User();
		$user->get_by_email($_GET['email']);
		echo ($user->email)?"false":"true";
	}
	
	function check_captcha()
	{
		if($this->session->userdata('captcha')==$_GET['captcha'])
		{
			echo "true";
		}
		else
		{
			echo "false";
		}
	}
	
	function profile($id){
		$data['user'] = new User($id);
		$this->template->set_layout('layout_user_profile');
		$this->template->build('user_profile',$data);
	}
	
	function profile_save($id=FALSE)
	{
		if($_POST)
		{
			$user = new User($this->session->userdata('id'));
			$_POST['user_id'] = $user->id;
			if($_FILES['image']['name'])
			{
				$user->profile->delete_file($user->profile->id,'uploads/users/','avatar');
				$_POST['avatar'] = $user->profile->upload($_FILES['image'],'uploads/users/',140,140);
				$user->profile->thumb('uploads/users/thumbs/',100,100);
				$user->profile->thumb('uploads/users/thumbs50x50/',50,50);
			}
			$user->profile->from_array($_POST);
			$user->profile->save();
			set_notify('success','บันทึกข้อมูลเรียบร้อยแล้วค่ะ');
		}
		redirect('users/profile/'.$id);
	}
	
	function forgot()
	{
		if($_POST)
		{
			
		}
		else
		{
			$this->template->build("user_forgot");
		}
	}
	
	function sig_save($id=FALSE){
		if($_POST)
		{
			$user = new User($id);
			$user->profile->from_array($_POST);
			$user->profile->save();
			set_notify('success','บันทึกข้อมูลเรียบร้อยแล้วค่ะ');
			redirect('users/profile/'.$id);
		}
	}
	
	function sidebar($id){
		$data['user'] = new User($id);
		$this->load->view("user_sidebar",$data);
	}
}

?>