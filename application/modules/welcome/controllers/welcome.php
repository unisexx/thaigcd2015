<?php

class Welcome extends Public_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		$users = new User();
		$data['users'] = $users->order_by('id','desc')->get_page();
		$this->template->build('index',$data);
	}
	
	function form()
	{
		$user = new User(1);
		$user->upload($_FILES['img']);
		$user->thumb('uploads/thumbs/', 30, 30);
	}
}

?>