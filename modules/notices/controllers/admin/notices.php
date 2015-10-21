<?php
class Notices extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['notices'] = new Notice();
		if(@$_POST['search'])$data['notices']->where("title like '%".$_POST['search']."%'");
		if(@$_POST['category_id'])$data['notices']->where("category_id = ".$_POST['category_id']);
		auth_filter($data['notices'])->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox())->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/notice_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['notice'] = new Notice($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/notice_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$notice = new Notice($id);
			$_POST['title'] = lang_encode($_POST['title']);
			$_POST['intro'] = lang_encode($_POST['intro']);
			$_POST['detail'] = lang_encode($_POST['detail']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$notice->from_array($_POST);
			$notice->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('notices/admin/notices');
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$notice = new Notice($id);
			$notice->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('notices/admin/notices');
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$notice = new Notice($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$notice->approve_date = date("Y-m-d H:i:s");
			$notice->from_array($_POST);
			$notice->save();
		}
	}
	
}
?>