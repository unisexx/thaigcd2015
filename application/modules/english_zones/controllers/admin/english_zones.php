<?php
class English_zones extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['english_zones'] = new English_zone();
		if(@$_GET['search'])$data['informations']->where("title like '%".$_GET['search']."%'");
		auth_filter($data['english_zones'])->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/english_zone_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['english_zone'] = new English_zone($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/english_zone_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$english_zone = new English_zone($id);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$english_zone->from_array($_POST);
			$english_zone->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$english_zone = new English_zone($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$english_zone->approve_date = date("Y-m-d H:i:s");
			$english_zone->from_array($_POST);
			$english_zone->save();
			echo approve_comment($english_zone);
		}

	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$english_zone = new English_zone($id);
			$english_zone->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}
?>