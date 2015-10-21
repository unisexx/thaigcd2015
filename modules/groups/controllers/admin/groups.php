<?php
class Groups extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['groups'] = new Group();
		$data['groups']->order_by('id','asc')->get_page(limit());
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
			$group->from_array($_POST);
			$group->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('groups/admin/groups');
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$group = new Group($id);
			$group->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('groups/admin/groups');
	}
	


}
?>