<?php

class Indicators_types extends Admin_Controller{
	
	function __construct(){
		parent::__construct();	
	}
	
	function index($id=FALSE)
	{
		
		$data['rs']  = new Indicator_type();
	
		$data['rs']->order_by('id','desc')->get_page();
		
		//$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['rs'] = new Indicator_type($id);
		
		$this->template->build('admin/indicators_types_form',$data);
	}
	

	
	function save($topic_id=FALSE,$id=FALSE)
	{
		if($_POST){

				$rs = new Indicator_type($id);
				
				
				if(!$id)$_POST['created'] = date('Y-m-d H:i:s');
				
				$_POST['updated'] = date('Y-m-d H:i:s');
				
				if(!$id)$_POST['status'] = "approve";
				
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
			$ulog->pages = 'indicator type';
			
			
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
			$rs = new Indicator_type($id);
			$rs->delete_file($rs->id,'uploads/indicators_types/','files');
			$rs->delete();
			set_notify('success', lang('delete_data_complete'));
		}
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
			$ulog->pages = 'indicator type';
			
			
						$userslogin_id='0';
			$userslogin_id=$this->session->userdata('id');
			$ulog->users_id = $userslogin_id;
			
			$userslogin_name='G';
			$userslogin_name=$user->username;
			$ulog->username = $userslogin_name;
			
			$ulog->save();
			
		
		redirect('indicators_types/admin/indicators_types/index');
	}

}

?>