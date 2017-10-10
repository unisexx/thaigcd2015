<?php

class Users extends Public_Controller {

	function __construct()
	{
		parent::__construct();
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



	// function register()
	// {
	// 	//$this->template->append_metadata(js_datepicker());
	// 	$this->template->build('register');
	// }


	// function signup()
	function signup_disabled()
	{
		if($_POST)
		{
			// if(((@$_POST['level_id']==4)&&(@$_POST['code']=="6880"))||(@$_POST['level_id']==5)||(@$_POST['level_id']==7)){
				// $user = new User();
//
				// $user->from_array($_POST);
				// $user->last_login = date('Y-m-d H:i:s');
				// if(isset($_POST['newsletters'])){
					// $user->newsletter = implode(',',$_POST['newsletters']);
				// }
					// $user->save();
					// $_POST['user_id'] = $user->id;
					// $_POST['birth_day'] = Date2DB($_POST['birth_day']);
					// $_POST['permission_id']=4;
					// $user->profile->from_array($_POST);
					// $user->profile->save();
//
					// login($_POST['username'], $_POST['password']);
//
			// }else{
//
				// if((@$_POST['level_id']==4)&&(@$_POST['code']<>"6880"))
				// {
					// set_notify('error','รหัสเจ้าหน้าที่ไม่ถูกต้อง');
				// }
			// }



			$captcha = $this->session->userdata('captcha');
      if(($_POST['captcha'] == $captcha) && !empty($captcha)){

				$user = new User();

				$user->from_array($_POST);
				$user->last_login = date('Y-m-d H:i:s');
				$user->m_status = 'wait';
				if(isset($_POST['newsletters'])){
					$user->newsletter = implode(',',$_POST['newsletters']);
				}
					$user->save();
					$_POST['user_id'] = $user->id;
					$_POST['birth_day'] = Date2DB($_POST['birth_day']);
					$_POST['permission_id']=4;
					$user->profile->from_array($_POST);
					$user->profile->save();

					login($_POST['username'], $_POST['password']);

			}else{
          set_notify('error','กรอกรหัสไม่ถูกต้อง');
          redirect($_SERVER['HTTP_REFERER']);
      }

			set_notify('success', 'ลงทะเบียนสำเร็จ รอการตรวจสอบจากเจ้าหน้าที่');
			redirect('home');
		}
	}



	function signin()
	{
		if($_POST)
		{
			if(login($_POST['username'], $_POST['password']))
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
		redirect('home');
	}

	function check_email()
	{
		$user = new User();
		$user->get_by_username($_GET['username']);
		echo ($user->username)?"false":"true";
	}

	function check_display()
	{
		$user = new User();
		$user->get_by_display($_GET['display']);
		echo ($user->username)?"false":"true";
	}

	function admin_check_email()
	{
		$user = new User();
		$user->where_not_in('username',user()->username);
		$user->where('username',$_GET['username']);
		$user->get();
		echo ($user->exists())?"false":"true";
	}

	function admin_check_display()
	{
		$user = new User();
		$user->where_not_in('display',user()->display);
		$user->where('display',$_GET['display']);
		$user->get();
		echo ($user->exists())?"false":"true";
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
			$_POST['birth_day'] = Date2DB($_POST['birth_day']);
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
