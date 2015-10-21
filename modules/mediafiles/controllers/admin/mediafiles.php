<?php

Class Mediafiles extends Admin_Controller{
		
	function __construct(){
		parent ::__construct();
	}
	
	function index()
	{
		$data['mediafiles'] = new Mediafile();
		if(@$_POST['search'])$data['mediafiles']->where("title like '%".$_POST['search']."%'");
		if(@$_POST['category_id'])$data['mediafiles']->where("category_id = ".$_POST['category_id']);
		$data['mediafiles']->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/mediafile_index',$data);	
	}

	function approve($id)
	{
		if($_POST)
		{
			$mediafiles = new Mediafile($id);
			$mediafiles->from_array($_POST);
			$mediafiles->save();
		}
		echo $_POST['status'];
	}
	
	function form($id=FALSE)
	{
		$data['mediafiles'] = new Mediafile($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/mediafile_form',$data);
	}
	
	function save($id=FALSE){
		if($_POST){
			$mediafile = new Mediafile($id);
			$_POST['user_id'] = $this->session->userdata('id');
			if($_FILES['image']['name'])
			{
				if($mediafile->id){
					$mediafile->delete_file($mediafile->id,'uploads/mediafiles/','image');
				}
				$_POST['image'] = $mediafile->upload($_FILES['image'],'uploads/mediafiles/',640,385);
			}
			$mediafile->from_array($_POST);
			$mediafile->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('mediafiles/admin/mediafiles');
	}
	
	function delete($id=FALSE){
		if($id)
		{
			$mediafile = new Mediafile($id);
			$mediafile->delete_file($mediafile->id,'uploads/mediafiles/','image');
			$mediafile->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('mediafiles/admin/mediafiles');
	}
}
	
?>