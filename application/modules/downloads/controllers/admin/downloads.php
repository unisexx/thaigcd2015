<?php
class Downloads extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['downloads'] = new Download();
		if(@$_GET['search'])$data['downloads']->where("title like '%".$_GET['search']."%'");
		if(@$_GET['status'])$data['downloads']->where('status',$_GET['status']);
		if(@$_GET['category_id'])$data['downloads']->where("category_id = ".$_GET['category_id']);
		auth_filter($data['downloads'])->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/download_index',$data);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$mediapublic = new Mediapublic($id);
			$mediapublic->approve_date = date("Y-m-d H:i:s");
			$mediapublic->approve_id = $this->session->userdata('id');
			$mediapublic->from_array($_POST);
			$mediapublic->save();
			echo approve_comment($mediapublic);
		}
	}
	
	function form($id=FALSE)
	{
		$data['downloads'] = new Download($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/download_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
        {
            $download = new Download($id);
			

			$_POST['title'] = lang_encode($_POST['title']);
			$_POST['intro'] = lang_encode($_POST['intro']);
			$_POST['detail'] = lang_encode($_POST['detail']);
			$_POST['start_date'] = Date2DB($_POST['start_date']);
			$_POST['end_date'] = Date2DB($_POST['end_date']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			if($_FILES['image']['name'])
			{
				if($id)$download->delete_file('uploads/download/thumbnail','image');
                $download->image = $download->upload($_FILES['image'],'uploads/download/thumbnail',238,150);
				//$information->image = $information->upload($_FILES['image'],'uploads/information/thumbnail',77,64);
			}
			
			
           
            $download->from_array($_POST);
            $download->save();
			
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
			$ulog->pages = 'download';
			
			
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
			//$mediapublic = new Mediapublic($id);
			//$mediapublic->delete();
			
			$download = new Download($id);
			$download->delete();
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
			$ulog->pages = 'downloads';
			
			
			$userslogin_id='0';
			$userslogin_id=$this->session->userdata('id');
			$ulog->users_id = $userslogin_id;
			
			$userslogin_name='G';
			$userslogin_name=$user->username;
			$ulog->username = $userslogin_name;
			
			$ulog->save();
			
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}
?>