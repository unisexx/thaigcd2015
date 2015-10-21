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
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function delete($id)
	{
		$agency = new Agency($id);
		$agency->delete();
		set_notify('success', lang('delete_data_complete'));
		redirect('agenies/admin/agenies');
	}
}
?>