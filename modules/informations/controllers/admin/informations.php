<?php
class Informations extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['informations'] = new Information();
		if(@$_POST['search'])$data['informations']->where("title like '%".$_POST['search']."%'");
		if(@$_POST['category_id'])$data['informations']->where("category_id = ".$_POST['category_id']);
		auth_filter($data['informations'])->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/information_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['information'] = new Information($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/information_form',$data);
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
			$information->from_array($_POST);
			$information->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('informations/admin/informations');
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$information = new Information($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$information->approve_date = date("Y-m-d H:i:s");
			$information->from_array($_POST);
			$information->save();
		}

	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$information = new Information($id);
			$information->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('informations/admin/informations');
	}
	
	function remove_image()
	{
		$user = new User($this->session->userdata('id'));
		$user->profile->delete_file($user->profile->id,'uploads/users/','avatar');
		$user->profile->avatar = NULL;
		$user->profile->save();
		set_notify('success', lang('remove_image_complete'));
		redirect('users/admin/profiles');	
	}

}
?>