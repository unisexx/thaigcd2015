<?php

class Coverpages_banner extends Admin_Controller{
	
	function __construct(){
		parent::__construct();	
	}
	
	function index($id=FALSE)
	{
		if(!is_login('Administrator')) redirect('users/admin/auth');
		$data['rs']  = new Coverpages_banners();
	
		$data['rs']->order_by('id','desc')->get_page();
		
		//$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/coverpages_banner_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['rs'] = new Coverpages_banners($id);
		$this->template->build('admin/coverpages_banner_form',$data);
	}
	
	
	function save($topic_id=FALSE,$id=FALSE)
	{
		if($_POST){

				$rs = new Coverpages_banners($id);
				
				if($_FILES['image']['name'])
				{
					$_POST['image'] = $rs->upload($_FILES['image'],'uploads/coverpages_banner/');
					
				}
				
				if(!$id)$_POST['created'] = date('Y-m-d H:i:s');
				
				$_POST['updated'] = date('Y-m-d H:i:s');
				
				if(!$id)$_POST['status'] = "approve";
				if(!$id)$_POST['orders'] = "1";
				
				$rs->from_array($_POST);
				$rs->save();
				
				//savelogs
				user_log($this->db->insert_id(),$_POST['name']); // content_id,content_title
				
				set_notify('success', lang('save_data_complete'));
			
			redirect($_POST['referer']);
		}
			
		
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$rs = new Coverpages_banners($id);
			
			//savelogs
			user_log($id,$rs->name); // content_id,content_title
			
			$rs->delete_file($rs->id,'uploads/coverpages_banner/','image');
			$rs->delete();
			
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('coverpages_banner/admin/coverpages_banner/index');
	}

}

?>