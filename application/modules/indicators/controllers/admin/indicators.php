<?php

class Indicators extends Admin_Controller{
	
	function __construct(){
		parent::__construct();	
	}
	
	function index($id=FALSE)
	{
		if(!is_login('Administrator')) redirect('users/admin/auth');
		$data['rs']  = new Indicator();
	
		//$data['rs']->order_by('id','desc')->get_page();
		$data['rs']->where('status','0')->order_by('id','desc')->get_page();
		
		//$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['rs'] = new Indicator($id);
		
		$data['rs_type'] = new Indicator_type();
		$data['rs_type']->order_by('id','desc')->get_page();
		
		$this->template->build('admin/indicators_form',$data);
	}
	

	
	function save($topic_id=FALSE,$id=FALSE)
	{
		if($_POST){

				$rs = new Indicator($id);
				

				if($_FILES['files']['name'])
				{
					$_POST['files'] = $rs->upload($_FILES['files'],'uploads/indicators/');
					
				}
				
				if(!$id)$_POST['user_id_created'] = $this->session->userdata('id');
				if(!$id)$_POST['created'] = date('Y-m-d H:i:s');
				
				$_POST['user_id_updated'] = $this->session->userdata('id');
				$_POST['updated'] = date('Y-m-d H:i:s');
				
				if(!$id)$_POST['views'] = '1';
				if(!$id)$_POST['downloads'] = '1';
				if(!$id)$_POST['status'] = '0';
				
				$rs->from_array($_POST);
				$rs->save();
				
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
/*			$rs = new Indicator($id);
			$rs->delete_file($rs->id,'uploads/indicators/','files');
			$rs->delete();*/
			
			$rs = new Indicator($id);
			
			//savelogs
			user_log($id,$rs->title); // content_id,content_title
			
			$rs->status = '1';
			
			$rs->save();
			
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('indicators/admin/indicators/index');
	}

}

?>