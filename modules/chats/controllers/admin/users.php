<?php

class Users extends Admin_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		$data['users'] = new User();
		(@$_POST['search'])?$data['users']->like('username',$_POST['search']):'';
		$data['users']->order_by('chat_operator','approve')->get_page();
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/operator_index',$data);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$users = new user($id);
			$users->from_array($_POST);
			$users->save();
		}
	}
	
}

?>