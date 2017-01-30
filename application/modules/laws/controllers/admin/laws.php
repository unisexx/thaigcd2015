<?php
class Laws extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['laws'] = new Law();
		if(@$_GET['search'])$data['laws']->where("title like '%".$_GET['search']."%'");
		if(@$_GET['status'])$data['laws']->where('status',$_GET['status']);
		if(@$_GET['category_id'])$data['laws']->where("category_id = ".$_GET['category_id']);
		auth_filter($data['laws'])->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/law_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['law'] = new Law($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/law_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$law = new Law($id);
			$_POST['title'] = lang_encode($_POST['title']);
			$_POST['intro'] = lang_encode($_POST['intro']);
			$_POST['detail'] = lang_encode($_POST['detail']);
			$_POST['start_date'] = Date2DB($_POST['start_date']);
			$_POST['end_date'] = Date2DB($_POST['end_date']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$law->from_array($_POST);
			$law->save();
			
			//savelogs
			user_log($this->db->insert_id(),$_POST['title']); // content_id,content_title
			
			set_notify('success', lang('save_data_complete'));
			redirect($_POST['referer']);
		}
		
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$law = new Law($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$law->approve_date = date("Y-m-d H:i:s");
			$law->from_array($_POST);
			$law->save();
			echo approve_comment($law);
		}
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$law = new Law($id);
			
			//savelogs
			user_log($id,$law->title); // content_id,content_title
			
			$law->delete();
			
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}
?>