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
			user_log($this->db->insert_id(),$_POST['name']); // content_id,content_title
			
			set_notify('success', lang('save_data_complete'));
		}
		redirect('groups/admin/groups');
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$group = new Group($id);
			
			//savelogs
			user_log($id,$group->name); // content_id,content_title
			
			//$group->delete();
			$group->status = '1';
			
			$group->save();
			
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('groups/admin/groups');
	}
	


}
?>