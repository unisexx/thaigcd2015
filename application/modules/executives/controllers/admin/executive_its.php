<?php
class Executive_its extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index($id=false)
	{
		$data['info'] = new Executive_it($id);
		$data['infos'] = new Executive_it();
		$data['infos']->order_by('id','desc')->get();
		$this->template->build('admin/its_form',$data);
	}
	
	function save($id=false){
		$info = new Executive_it($id);
		$info->from_array($_POST);
		$info->save();
		set_notify('success', lang('save_data_complete'));
		redirect('executives/admin/executive_its/index');
	}
	
	function delete($id=false){
		$info = new Executive_it($id);
		$info->delete();
		set_notify('success', lang('save_data_complete'));
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>