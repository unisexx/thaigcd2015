<?php
class Knowledges extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['knowledges'] = new Knowledge();
		if(@$_POST['search'])$data['knowledges']->where("title like '%".$_POST['search']."%'");
		if(@$_POST['category_id'])$data['knowledges']->where("category_id = ".$_POST['category_id']);
		auth_filter($data['knowledges'])->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/knowledge_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['knowledge'] = new Knowledge($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/knowledge_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$knowledge = new Knowledge($id);
			$_POST['title'] = lang_encode($_POST['title']);
			$_POST['intro'] = lang_encode($_POST['intro']);
			$_POST['detail'] = lang_encode($_POST['detail']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$knowledge->from_array($_POST);
			$knowledge->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('knowledges/admin/knowledges');
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$knowledge = new Knowledge($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$knowledge->from_array($_POST);
			$knowledge->save();
		}
		echo $_POST['status'];
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$knowledge = new Knowledge($id);
			$knowledge->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('knowledges/admin/knowledges');
	}
	

}
?>