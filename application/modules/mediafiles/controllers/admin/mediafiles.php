<?php

Class Mediafiles extends Admin_Controller{
		
	function __construct(){
		parent ::__construct();
	}
	
	function index()
	{
		$data['mediafiles'] = new Mediafile();
		if(@$_GET['search'])$data['mediafiles']->where("title like '%".$_GET['search']."%'");
		if(@$_GET['status'])$data['mediafiles']->where('status',$_GET['status']);
		if(@$_GET['category_id'])$data['mediafiles']->where("category_id = ".$_GET['category_id']);
		auth_filter($data['mediafiles'])->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/mediafile_index',$data);	
	}

	function approve($id)
	{
		if($_POST)
		{
			$mediafiles = new Mediafile($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$mediafiles->approve_date = date("Y-m-d H:i:s");
			$mediafiles->from_array($_POST);
			$mediafiles->save();
			echo approve_comment($mediafiles);
		}
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
			$_POST['embed']!="" ? $_POST['file']="" : $_POST['embed'] ;
			$_POST['title'] = lang_encode($_POST['title']);
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
			
			//savelogs
			user_log($this->db->insert_id(),$_POST['title']); // content_id,content_title
			
			set_notify('success', lang('save_data_complete'));
		}
		redirect("mediafiles/admin/mediafiles");
	}
	
	function delete($id=FALSE){
		if($id)
		{
			$mediafile = new Mediafile($id);
			
			//savelogs
			user_log($id,$mediafile->title); // content_id,content_title
			
			$mediafile->delete_file($mediafile->id,'uploads/mediafiles/','image');
			$mediafile->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}
	
?>