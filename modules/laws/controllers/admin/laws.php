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
		if(@$_POST['search'])$data['laws']->where("title like '%".$_POST['search']."%'");
		if(@$_POST['category_id'])$data['laws']->where("category_id = ".$_POST['category_id']);
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
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$law->from_array($_POST);
			$law->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('laws/admin/laws');
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$law = new Law($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$law->from_array($_POST);
			$law->save();
		}
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$law = new Law($id);
			$law->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('notices/admin/notices');
	}
	
}
?>