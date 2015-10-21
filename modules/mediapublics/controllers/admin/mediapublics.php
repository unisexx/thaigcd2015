<?php
class Mediapublics extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['mediapublics'] = new Mediapublic();
		if(@$_POST['search'])$data['mediapublics']->where("title like '%".$_POST['search']."%'");
		if(@$_POST['category_id'])$data['mediapublics']->where("category_id = ".$_POST['category_id']);
		$data['mediapublics']->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/mediapublic_index',$data);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$mediapublic = new Mediapublic($id);
			$mediapublic->approve_date = date("Y-m-d H:i:s");
			$mediapublic->from_array($_POST);
			$mediapublic->save();
		}
		echo $_POST['status'];
	}
	
	function form($id=FALSE)
	{
		$data['mediapublics'] = new Mediapublic($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/mediapublic_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$mediapublic = new Mediapublic($id);
			$_POST['title'] = lang_encode($_POST['title']);
			$_POST['detail'] = lang_encode($_POST['detail']);
			$_POST['user_id'] = $this->session->userdata('id');
			$mediapublic->from_array($_POST);
			$mediapublic->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('mediapublics/admin/mediapublics');
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$mediapublic = new Mediapublic($id);
			$mediapublic->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('mediapublics/admin/mediapublics');
	}
	
}
?>