<?php

class Auth extends Public_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		if(is_login('Administrator')) redirect('users/admin/profiles');
		$this->template->title('Administator');
		$this->template->set_theme('admin');
		$this->template->set_layout('blank');
		$this->template->build('admin/login');
	}
	
	function signin()
	{
		if($_POST)
		{
			if(login($_POST['username'], $_POST['password']))
			{
				if(is_login('Administrator'))
				{
					set_notify('success', 'ยินดีต้อนรับเข้าสู่ระบบค่ะ');
					redirect('users/admin/profiles');
				}
				else
				{
					set_notify('error', 'คุณไม่มีสิทธิ์เข้าใช้ในส่วนนี้ค่ะ');
					redirect('admin');
				}
			}
			else
			{
				set_notify('error', 'ชื่อผู้ใช้หรือรหัสผ่านผิดพลาดค่ะ');
				redirect('admin');
			}	
		}
		else
		{
			set_notify('error', 'กรุณาทำการล็อคอินค่ะ');
			redirect('admin');
		}
	}
	
	function signout($id=FALSE)
	{
		logout();
		redirect('users/admin/auth');
	}
	
	function fail($id=FALSE)
	{
		$this->template->set_theme('admin');
		$this->template->set_layout('layout');
		$this->template->build('admin/fail');
	}
}

?>