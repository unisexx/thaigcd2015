<?php
class contacts extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['contacts'] = new contact();
		auth_filter($data['contacts'])->order_by('id','desc')->get_page(limit());
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['contact'] = new contact($id);
		$this->template->build('admin/form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$information = new Information($id);
			$_POST['title'] = lang_encode($_POST['title']);
			$_POST['intro'] = lang_encode($_POST['intro']);
			$_POST['detail'] = lang_encode($_POST['detail']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			if($_FILES['image']['name'])
			{
				if($id)$information->delete_file('uploads/information/thumbnail','image');
				$information->image = $information->upload($_FILES['image'],'uploads/information/thumbnail',77,64);
			}
			$information->from_array($_POST);
			$information->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$information = new Information($id);
			$information->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	

}
?>