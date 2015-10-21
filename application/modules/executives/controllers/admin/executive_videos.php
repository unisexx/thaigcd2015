<?php
class Executive_videos extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index($id=false)
	{
		$data['video'] = new Executive_video($id);
		$data['videos'] = new Executive_video();
		$data['videos']->order_by('id','desc')->get();
		$this->template->build('admin/video_form',$data);
	}
	
	function save($id=false){
		$video = new Executive_video($id);
		$video->from_array($_POST);
		$video->save();
		set_notify('success', lang('save_data_complete'));
		redirect('executives/admin/executive_videos/index');
	}
	
	function delete($id=false){
		$video = new Executive_video($id);
		$video->delete();
		set_notify('success', lang('save_data_complete'));
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>