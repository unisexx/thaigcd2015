<?php
class Histories extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$users = new User();
		$data['execusive_user'] = $users->where("level_id = 6")->order_by('id','desc')->get(1);
		$this->template->build('admin/history_form',$data);
	}
	
	function save($id=false){
		$user = new User($id);
		$_POST['short_history'] = lang_encode($_POST['short_history']);
		$_POST['long_history'] = lang_encode($_POST['long_history']);
		$user->profile->from_array($_POST);
		$user->profile->save();
		set_notify('success', lang('save_data_complete'));
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>