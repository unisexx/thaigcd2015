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
		if(@$_GET['status'])$data['hilights']->where('status',$_GET['status']);
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
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$_POST['start_date'] = Date2DB($_POST['start_date']);
			$_POST['end_date'] = Date2DB($_POST['end_date']);
			if($_FILES['image']['name'])
			{
				if($id)$hilight->delete_file('uploads/hilight','image');
				if($id)$hilight->delete_file('uploads/hilight/thumbnail','image');
				$hilight->image = $hilight->upload($_FILES['image'],'uploads/hilight/',656,253);
				$hilight->thumb('uploads/hilight/thumbnail/',60,30);
			}
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
			$hilight->approve_date = date("Y-m-d H:i:s");
			$hilight->from_array($_POST);
			$hilight->save();
			echo approve_comment($hilight);
		}
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