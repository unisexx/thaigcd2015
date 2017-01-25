<?php
class Executives extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['executives'] = new Executive();
		if(isset($_GET['search']))$data['executives']->where('title like \'%'.$_GET['search'].'%\'');
		if(@$_GET['status'])$data['executives']->where('status',$_GET['status']);
		auth_filter($data['executives'])->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/executive_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['executive'] = new Executive($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/executive_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$executive = new Executive($id);
			$_POST['title'] = lang_encode($_POST['title']);
			$_POST['intro'] = lang_encode($_POST['intro']);
			$_POST['detail'] = lang_encode($_POST['detail']);
			$_POST['start_date'] = Date2DB($_POST['start_date']);
			$_POST['end_date'] = Date2DB($_POST['end_date']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$executive->from_array($_POST);
			$executive->save();
			set_notify('success', lang('save_data_complete'));
			redirect($_POST['referer']);
		}
		
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$executive = new Executive($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$executive->approve_date = date("Y-m-d H:i:s");
			$executive->from_array($_POST);
			$executive->save();
			echo approve_comment($executive);
		}
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$executive = new Executive($id);
			$executive->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function history_form()
	{
		$this->template->build('admin/history_form');
	}
	
	function index_polls()
	{
		if(!is_login('Administrator')) redirect('users/admin/auth');
		
		$data['rs']  = new Poles();
	
		$data['rs']->where('status','0')->order_by('id','desc')->get_page();
		
		$this->template->build('admin/poles_index',$data);
	}
	
	function form_pole($id=FALSE)
	{
		$data['poles'] = new Poles($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/poles_form',$data);
	}
	
/*	function save_pole($id=FALSE)
	{
		if($_POST)
		{
			$poles = new Poles($id);

			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$poles->from_array($_POST);
			$poles->save();
			set_notify('success', lang('save_data_complete'));
			redirect($_POST['referer']);
		}
		
	}*/
	
	
	function delete_pole($id=FALSE)
	{
		if($id)
		{
			$poles = new Poles($id);
			
			$poles->status = '1';
			
			$poles->save();
			
			
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
			$ulog->pages = 'รับเรื่องร้องเรียน';
			
						$userslogin_id='0';
			$userslogin_id=$this->session->userdata('id');
			$ulog->users_id = $userslogin_id;
			
			$userslogin_name='G';
			$userslogin_name=$user->username;
			$ulog->username = $userslogin_name;
			
			$ulog->save();
			
			
			//$poles->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}
?>