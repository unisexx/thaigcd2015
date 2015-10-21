<?php

class Users extends Admin_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		$data['users'] = new User();
		if(isset($_POST['search']))$data['users']->where('display like \'%'.$_POST['search'].'%\' or email like \'%'.$_POST['search'].'%\'');
		$data['users']->order_by('id','desc')->get_page(limit());
		$this->template->build('admin/user_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['user'] = new User($id);
		$data['levels'] = new Level();
		$data['levels']->get();
		$data['groups'] = new Group();
		$data['groups']->get();
		$this->template->build('admin/user_form',$data);
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
	
	function delete($id=FALSE)
	{
		$user = new User($id);
		$user->delete();
		set_notify('success','ลบข้อมูลเรียบร้อยแล้วค่ะ');
		redirect('users/admin/users');
	}
}

?>