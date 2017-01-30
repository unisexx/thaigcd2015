<?php
	
class Weblinks extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function index()
	{
		$data['weblinks'] = new Weblink();
		if(@$_GET['search'])$data['weblinks']->where("title like '%".$_GET['search']."%'");
		if(@$_GET['category_id'])$data['weblinks']->where("category_id = ".$_GET['category_id']);
		$data['weblinks']->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/weblinks_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['weblinks'] = new Weblink($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/weblinks_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$weblink = new Weblink($id);
			if($_FILES['image']['name'])
			{
				if($weblink->id){
					$weblink->delete_file($weblink->id,'uploads/weblinks/','image');
				}
				$_POST['image'] = $weblink->upload($_FILES['image'],'uploads/weblinks/',98,90);
				//$weblink->thumb('uploads/weblinks/thumb',50,50);
			}
			$_POST['title'] = lang_encode($_POST['title']);
			$_POST['description'] = lang_encode($_POST['description']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$weblink->from_array($_POST);
			$weblink->save();
			
			//savelogs
			user_log($this->db->insert_id(),$_POST['title']); // content_id,content_title
			
			set_notify('success', lang('save_data_complete'));
			redirect($_POST['referer']);
		}
		
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$weblink = new Weblink($id);
			
			//savelogs
			user_log($id,$weblink->title); // content_id,content_title
			
			$weblink->delete_file($weblink->id,'uploads/weblinks/','image');
			$weblink->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}

?>