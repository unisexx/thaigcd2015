<?php
class Profiles extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['user'] = new User($this->session->userdata('id'));
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/user_profile',$data);
	}
	
	function save()
	{
		if($_POST)
		{
			$user = new User($this->session->userdata('id'));
			$user->from_array($_POST);
			$user->save();
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
			set_notify('success', lang('save_data_complete'));
		}
		redirect('users/admin/profiles');
	}
	
	function remove_image()
	{
		$user = new User($this->session->userdata('id'));
		$user->profile->delete_file($user->profile->id,'uploads/users/','avatar');
		$user->profile->avatar = NULL;
		$user->profile->save();
		set_notify('success', lang('remove_image_complete'));
		redirect('users/admin/profiles');	
	}

}
?>