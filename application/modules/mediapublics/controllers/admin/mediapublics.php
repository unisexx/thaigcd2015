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
		if(@$_GET['search'])$data['mediapublics']->where("title like '%".$_GET['search']."%'");
		if(@$_GET['status'])$data['mediapublics']->where('status',$_GET['status']);
		if(@$_GET['category_id'])$data['mediapublics']->where("category_id = ".$_GET['category_id']);
		auth_filter($data['mediapublics'])->order_by('id','desc')->get_page(limit());
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
			$mediapublic->approve_id = $this->session->userdata('id');
			$mediapublic->from_array($_POST);
			$mediapublic->save();
			echo approve_comment($mediapublic);
		}
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
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$mediapublic->from_array($_POST);
			$mediapublic->save();
			
			//savelogs
			user_log($this->db->insert_id(),$_POST['title']); // content_id,content_title
			
			set_notify('success', lang('save_data_complete'));
			redirect($_POST['referer']);
		}
		
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$mediapublic = new Mediapublic($id);
			
			//savelogs
			user_log($id,$mediapublic->title); // content_id,content_title
		
			$mediapublic->delete();
			
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}
?>