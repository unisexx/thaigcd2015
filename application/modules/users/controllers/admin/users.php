<?php

class Users extends Admin_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		$data['users'] = new User();
		if(@$_GET['first_name'])$data['users']->like_related_profile('first_name',$_GET['first_name']);
		if(@$_GET['last_name'])$data['users']->like_related_profile('last_name',$_GET['last_name']);
		if(@$_GET['email'])$data['users']->like('username',$_GET['email']);
		if(@$_GET['level_id'])$data['users']->where('level_id',$_GET['level_id']);
		
		if(user()->level->view == 2)
		{
			$data['users']->where('group_id',user()->group_id);
		}
		elseif(user()->level->view == 3)
		{
			$data['users']->where('id',user()->id);
		}
		
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
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/user_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$user = new User($id);
			$user->from_array($_POST);
			$user->save();
			$_POST['birth_day'] = Date2DB($_POST['birth_day']);
			$user->profile->from_array($_POST);
			$user->profile->user_id = $user->id;
			$user->profile->save();
			
			
						//savelogs
			$remote=getenv("REMOTE_ADDR");
			$refer=@$_SERVER['HTTP_REFERER'];
			$d=date('Y-m-d H:i:s');
			
			
			$userslogin='G';
			$user = new User($this->session->userdata('id'));
			$userslogin=$user->display;
			
			$event='add';
			if($id)$event='edit';
			
			$ulog = new Userslog();
			$ulog->ip = $remote;
			$ulog->refer = $refer;
			$ulog->usersname = $userslogin;
			$ulog->updated = $d;
			$ulog->events = $event;
			$ulog->pages = 'users';
			
						$userslogin_id='0';
			$userslogin_id=$this->session->userdata('id');
			$ulog->users_id = $userslogin_id;
			
			$userslogin_name='G';
			$userslogin_name=$user->username;
			$ulog->username = $userslogin_name;
			
			$ulog->save();
			
			set_notify('success','บันทึกข้อมูลเรียบร้อยแล้วค่ะ');
			redirect($_POST['referer']);
		}
	}
	
	function delete($id=FALSE)
	{
		$user = new User($id);
		$user->delete();
		
										//savelogs
			$remote=getenv("REMOTE_ADDR");
			$refer=@$_SERVER['HTTP_REFERER'];
			$d=date('Y-m-d H:i:s');
			
			
			$userslogin='G';
			$user = new User($this->session->userdata('id'));
			$userslogin=$user->display;
			
			$event='delete';
			
			$ulog = new Userslog();
			$ulog->ip = $remote;
			$ulog->refer = $refer;
			$ulog->usersname = $userslogin;
			$ulog->updated = $d;
			$ulog->events = $event;
			$ulog->pages = 'users';
			
						$userslogin_id='0';
			$userslogin_id=$this->session->userdata('id');
			$ulog->users_id = $userslogin_id;
			
			$userslogin_name='G';
			$userslogin_name=$user->username;
			$ulog->username = $userslogin_name;
			
			$ulog->save();
		
		set_notify('success','ลบข้อมูลเรียบร้อยแล้วค่ะ');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	
	
}

?>