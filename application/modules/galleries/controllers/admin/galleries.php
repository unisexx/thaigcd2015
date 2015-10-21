<?php

class Galleries extends Admin_Controller{
	
	function __construct(){
		parent::__construct();	
	}
	
	function index($id=FALSE)
	{
		$data['categories'] = new Category($id);
		$galleries = new Gallery();
		if(@$_POST['category_id'])$id=$_POST['category_id'];
		$data['galleries'] = $galleries->where('category_id',$id)->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/gallery_index',$data);
	}
	
	function form($cat_id,$id=FALSE)
	{
		$data['categories'] = new Category($cat_id);
		$data['galleries'] = new Gallery($id);
		$this->template->build('admin/gallery_form',$data);
	}
	
	function save($cat_id,$id=FALSE)
	{
		if($_POST)
		{
			$gallery = new Gallery($id);
			if($_FILES['image']['name'])
			{
				if($gallery->id){
					$gallery->delete_file($gallery->id,'uploads/galleries/','image');
				}
				$_POST['image'] = $gallery->upload($_FILES['image'],'uploads/galleries/');
				$gallery->thumb('uploads/galleries/thumbs/',170,120);
			}
			$_POST['user_id'] = $this->session->userdata('id');
			$gallery->from_array($_POST);
			$gallery->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('galleries/admin/galleries/form/'.$cat_id);
	}
	
	function delete($cat_id,$id=FALSE)
	{
		if($id)
		{
			$gallery = new Gallery($id);
			$gallery->delete_file($gallery->id,'uploads/galleries/','image');
			$gallery->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('galleries/admin/galleries/index/'.$cat_id);
	}

}

?>