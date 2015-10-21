<?php
class Executives extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['executives'] = new Executive();
		if(isset($_POST['search']))$data['executives']->where('title like \'%'.$_POST['search'].'%\'');
		auth_filter($data['executives'])->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/executive_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['executive'] = new Executive($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/executive_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$executive = new Executive($id);
			$_POST['title'] = lang_encode($_POST['title']);
			$_POST['intro'] = lang_encode($_POST['intro']);
			$_POST['detail'] = lang_encode($_POST['detail']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$executive->from_array($_POST);
			$executive->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('executives/admin/executives');
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$executive = new Executive($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$executive->from_array($_POST);
			$executive->save();
		}
		echo $_POST['status'];
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$executive = new Executive($id);
			$executive->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('executives/admin/executives');
	}
	

}
?>