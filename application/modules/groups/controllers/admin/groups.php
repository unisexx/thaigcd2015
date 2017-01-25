<?php
class Groups extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		if(!is_login('Administrator')) redirect('users/admin/auth');
		
		$data['groups'] = new Group();
		//$data['groups']->order_by('id','asc')->get_page(limit());
		
		$data['groups']->where('status','0')->order_by('id','asc')->get_page(limit());
		
		
		$this->template->build('admin/group_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['group'] = new Group($id);
		$this->template->build('admin/group_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$group = new Group($id);
			$_POST['name'] = lang_encode($_POST['name']);
			$_POST['detail'] = lang_encode($_POST['detail']);
			$_POST['aboutus'] = lang_encode($_POST['aboutus']);
			$_POST['intro'] = lang_encode($_POST['intro']);
			$_POST['status'] = '0';
			
			if($_FILES['image']['name'])
			{
				if($id)$group->delete_file('uploads/group','image');
				$group->image = $group->upload($_FILES['image'],'uploads/group',656,254);
			}
			$group->from_array($_POST);
			$group->save();
			
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
			$ulog->pages = 'group';
			
			
						$userslogin_id='0';
			$userslogin_id=$this->session->userdata('id');
			$ulog->users_id = $userslogin_id;
			
			$userslogin_name='G';
			$userslogin_name=$user->username;
			$ulog->username = $userslogin_name;
			
			$ulog->save();
			
			set_notify('success', lang('save_data_complete'));
		}
		redirect('groups/admin/groups');
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$group = new Group($id);
			//$group->delete();
			$group->status = '1';
			
			$group->save();
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
			$ulog->pages = 'group';
			
						$userslogin_id='0';
			$userslogin_id=$this->session->userdata('id');
			$ulog->users_id = $userslogin_id;
			
			$userslogin_name='G';
			$userslogin_name=$user->username;
			$ulog->username = $userslogin_name;
			
			
			$ulog->save();
			
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('groups/admin/groups');
	}
	


}
?>