<?php

class Indicators extends Admin_Controller{
	
	function __construct(){
		parent::__construct();	
	}
	
	function index($id=FALSE)
	{
		if(!is_login('Administrator')) redirect('users/admin/auth');
		$data['rs']  = new Indicator();
	
		//$data['rs']->order_by('id','desc')->get_page();
		$data['rs']->where('status','0')->order_by('id','desc')->get_page();
		
		//$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['rs'] = new Indicator($id);
		
		$data['rs_type'] = new Indicator_type();
		$data['rs_type']->order_by('id','desc')->get_page();
		
		$this->template->build('admin/indicators_form',$data);
	}
	

	
	function save($topic_id=FALSE,$id=FALSE)
	{
		if($_POST){

				$rs = new Indicator($id);
				

				if($_FILES['files']['name'])
				{
					$_POST['files'] = $rs->upload($_FILES['files'],'uploads/indicators/');
					
				}
				
				if(!$id)$_POST['user_id_created'] = $this->session->userdata('id');
				if(!$id)$_POST['created'] = date('Y-m-d H:i:s');
				
				$_POST['user_id_updated'] = $this->session->userdata('id');
				$_POST['updated'] = date('Y-m-d H:i:s');
				
				if(!$id)$_POST['views'] = '1';
				if(!$id)$_POST['downloads'] = '1';
				if(!$id)$_POST['status'] = '0';
				
				$rs->from_array($_POST);
				$rs->save();
				
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
			$ulog->pages = 'indicators';
			
			
			$userslogin_id='0';
			$userslogin_id=$this->session->userdata('id');
			$ulog->users_id = $userslogin_id;
			
			$userslogin_name='G';
			$userslogin_name=$user->username;
			$ulog->username = $userslogin_name;
			
			$ulog->save();
				
				set_notify('success', lang('save_data_complete'));
			
			redirect($_POST['referer']);
		}
			
		
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
/*			$rs = new Indicator($id);
			$rs->delete_file($rs->id,'uploads/indicators/','files');
			$rs->delete();*/
			
			$rs = new Indicator($id);
			
			$rs->status = '1';
			
			$rs->save();
			
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
			$ulog->pages = 'indicators';
			
						$userslogin_id='0';
			$userslogin_id=$this->session->userdata('id');
			$ulog->users_id = $userslogin_id;
			
			$userslogin_name='G';
			$userslogin_name=$user->username;
			$ulog->username = $userslogin_name;
			
			$ulog->save();
			
			
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('indicators/admin/indicators/index');
	}

}

?>