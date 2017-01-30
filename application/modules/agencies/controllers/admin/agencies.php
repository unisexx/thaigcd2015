<?php
class Agencies extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['agencies'] = new Agency();
		$data['agencies']->order_by('id','desc')->get_page();
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['agency'] = new Agency($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$agency = new Agency($id);
			$agency->from_array($_POST);
			$agency->save();
			
			//savelogs
			user_log($this->db->insert_id(),$_POST['name']); // content_id,content_title
			
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function delete($id)
	{
		$agency = new Agency($id);
		
		//savelogs
		user_log($id,$agency->name); // content_id,content_title
			
		$agency->delete();
		
		set_notify('success', lang('delete_data_complete'));
		redirect('agencies/admin/agencies');
	}
}
?>