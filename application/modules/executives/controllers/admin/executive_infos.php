<?php
class Executive_infos extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index($id=false)
	{
		$data['info'] = new Executive_info($id);
		$data['infos'] = new Executive_info();
		$data['infos']->order_by('id','desc')->get();
		$this->template->build('admin/info_form',$data);
	}
	
	function save($id=false){
		$info = new Executive_info($id);
		$info->from_array($_POST);
		$info->save();
		set_notify('success', lang('save_data_complete'));
		redirect('executives/admin/executive_infos/index');
	}
	
	function delete($id=false){
		$info = new Executive_info($id);
		$info->delete();
		set_notify('success', lang('save_data_complete'));
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>