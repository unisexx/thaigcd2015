<?php

class Indicators_types extends Admin_Controller{
	
	function __construct(){
		parent::__construct();	
	}
	
	function index($id=FALSE)
	{
		
		$data['rs']  = new Indicator_type();
	
		$data['rs']->order_by('id','desc')->get_page();
		
		//$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['rs'] = new Indicator_type($id);
		
		$this->template->build('admin/indicators_types_form',$data);
	}
	

	
	function save($topic_id=FALSE,$id=FALSE)
	{
		if($_POST){

				$rs = new Indicator_type($id);
				
				
				if(!$id)$_POST['created'] = date('Y-m-d H:i:s');
				
				$_POST['updated'] = date('Y-m-d H:i:s');
				
				if(!$id)$_POST['status'] = "approve";
				
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
			$rs = new Indicator_type($id);
			
			//savelogs
			user_log($id,$rs->name); // content_id,content_title
			
			$rs->delete_file($rs->id,'uploads/indicators_types/','files');
			$rs->delete();
			set_notify('success', lang('delete_data_complete'));
		}
				
		redirect('indicators_types/admin/indicators_types/index');
	}

}

?>