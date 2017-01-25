<?php

class Modules_infograph extends Admin_Controller{
	
	function __construct(){
		parent::__construct();	
	}
	
	function index($id=FALSE)
	{
		
		$data['rs']  = new Model_infograph();
	
		$data['rs']->order_by('id','desc')->get_page();
		
		//$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/modules_infograph_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['rs'] = new Model_infograph($id);
		$this->template->build('admin/modules_infograph_form',$data);
	}
	
	
	function save($topic_id=FALSE,$id=FALSE)
	{
		if($_POST){

				$rs = new Model_infograph($id);
				
				if($_FILES['image']['name'])
				{
					$_POST['image'] = $rs->upload($_FILES['image'],'uploads/modules_infograph/image/');
					
				}
				
				
				if($_FILES['file_pdf']['name'])
				{
					$_POST['file_pdf'] = $rs->upload($_FILES['file_pdf'],'uploads/modules_infograph/pdf/');
					
				}
				
				if(!$id)$_POST['user_id_created'] = $this->session->userdata('id');
				if(!$id)$_POST['created'] = date('Y-m-d H:i:s');
				
				$_POST['user_id_updated'] = $this->session->userdata('id');
				$_POST['updated'] = date('Y-m-d H:i:s');
				
				if(!$id)$_POST['status'] = "approve";
				if(!$id)$_POST['views'] = "1";
				
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
			$ulog->pages = 'infograph';
			
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
			$rs = new Model_infograph($id);
			$rs->delete_file($rs->id,'uploads/modules_infograph/image/','image');
			$rs->delete();
			
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
			$ulog->pages = 'infograph';
			
						$userslogin_id='0';
			$userslogin_id=$this->session->userdata('id');
			$ulog->users_id = $userslogin_id;
			
			$userslogin_name='G';
			$userslogin_name=$user->username;
			$ulog->username = $userslogin_name;
			
			$ulog->save();
			
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('modules_infograph/admin/modules_infograph/index');
	}

}

?>