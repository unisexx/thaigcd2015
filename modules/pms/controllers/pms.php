<?php
class Pms extends Public_Controller {

	function __construct()
	{
		parent::__construct();
		$this->template->set_layout('layout_user_profile');
	}
	
	function index($id){
		$data['user'] = new User($id);
		$this->template->build('pm_index',$data);
	}
	
	function save($id){
		if($_POST){
			$pm = new Pm();
			$_POST['from_user_id'] = $this->session->userdata('id');
			$pm->from_array($_POST);
			$pm->save();
			set_notify('success', 'ส่งข้อความส่วนตัวเรียบร้อยแล้ว');
		}
		redirect('users/profile/'.$id);
	}
	
	function delete($id){
		if($id)
		{
			$pm = new Pm($id);
			$pm->delete();
			set_notify('success', 'ลบข้อความส่วนตัวเรียบร้อย');
		}
		redirect('pms/inbox');
	}
	
	function inbox(){
		$data['user'] = new User($this->session->userdata('id'));
		$this->template->build('pm_inbox',$data);
	}
	
	function view_message($id){
		$data['user'] = new User($this->session->userdata('id'));
		$data['pm'] = new Pm($id);
		$data['pm']->status = 1;
		$data['pm']->save();
		$data['from_user'] = new user($data['pm']->from_user_id);
		$this->template->build('pm_view_message',$data);
	}
	
	function sidebar($id){
		$data['user'] = new User($id);
		$this->load->view("user_sidebar",$data);
	}
	
	function reply($id){
		$data['user'] = new User($id);
		$this->load->view("reply_form",$data);
	}
}