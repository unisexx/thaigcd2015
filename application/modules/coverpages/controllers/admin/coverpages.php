<?php
class Coverpages extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index(){
		$coverpages = new Coverpage();
		$data['coverpages'] = $coverpages->order_by('id','desc')->get_page();

		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/cover_index',$data);
	}
	
	function form($id=false){
		$data['coverpage'] = new Coverpage($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/cover_form',$data);
	}
	
	function save($id=false){
		if($_POST){
			
			$coverpage = new Coverpage($id);
			
			if($_FILES['image']['name'])
			{
				$_POST['image'] = $coverpage->upload($_FILES['image'],'uploads/coverpages/');
				
			}
				
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			
			if(!$id)$_POST['status'] = "approve";
			if(!$id)$_POST['active'] = "1";
			
			$_POST['start_date'] = Date2DB($_POST['start_date']);
			$_POST['end_date'] = Date2DB($_POST['end_date']);
			$coverpage->from_array($_POST);
			$coverpage->save();
			
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
			$ulog->pages = 'coverpage';
			
						$userslogin_id='0';
			$userslogin_id=$this->session->userdata('id');
			$ulog->users_id = $userslogin_id;
			
			$userslogin_name='G';
			$userslogin_name=$user->username;
			$ulog->username = $userslogin_name;
			
			$ulog->save();
			
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function delete($id){
		if($id)
		{
			$coverpage = new Coverpage($id);
			$coverpage->delete();
			
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
			$ulog->pages = 'coverpage';
			
						$userslogin_id='0';
			$userslogin_id=$this->session->userdata('id');
			$ulog->users_id = $userslogin_id;
			
			$userslogin_name='G';
			$userslogin_name=$user->username;
			$ulog->username = $userslogin_name;
			
			$ulog->save();
			
			set_notify('success', lang('delete_data_complete'));
		} 
		redirect('coverpages/admin/coverpages');
	}
	
	function approve($id)
	{
		if($_POST)
		{
			//$this->db->query("update coverpages set status = '".$id."'")->result();
			$coverpages = new Coverpage();
			$coverpages->get();
			foreach($coverpages as $item){
				$coverpage = new Coverpage($item->id);
				$coverpage->from_array($_POST);
				$coverpage->save();
			}
		}
	}
	
	function approve2($id)
	{
		if($_POST)
		{
			$coverpage = new Coverpage($id);
			$coverpage->from_array($_POST);
			$coverpage->save();
			$coverpage->clear();
			$coverpage->where('id <>', $id)->get();
			$coverpage->update_all('active',0);
		}
	}
	
}
?>