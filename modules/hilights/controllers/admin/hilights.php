<?php
class Hilights extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['hilights'] = new hilight();
		auth_filter($data['hilights'])->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/hilight_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['hilight'] = new hilight($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/hilight_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$hilight = new hilight($id);
			$_POST['title'] = lang_encode($_POST['title']);
			$_POST['intro'] = lang_encode($_POST['intro']);
			$_POST['detail'] = lang_encode($_POST['detail']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$hilight->from_array($_POST);
			$hilight->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('hilights/admin/hilights');
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$hilight = new hilight($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$hilight->from_array($_POST);
			$hilight->save();
		}
		echo $_POST['status'];
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$hilight = new hilight($id);
			$hilight->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('hilights/admin/hilights');
	}
	

}
?>