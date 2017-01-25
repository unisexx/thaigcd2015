<?php

class Infograh extends Admin_Controller{
	
	function __construct(){
		parent::__construct();	
	}
	
	function index($id=FALSE)
	{
		
		$data['infograh']  = new InfograhM();
	
		$data['infograh']->order_by('id','desc')->get_page();
		
		//$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['rs'] = new InfograhM($id);
		$this->template->build('admin/infograh_form',$data);
	}
	
/*	function save($id=FALSE)
	{
		
		if($_POST)
		{
			$rs = new InfograhM($id);
			
			if($_FILES['image']['name'])
			{
				$_POST['image'] = $rs->upload($_FILES['image'],'uploads/infograh/image/');
				$rs->thumb('uploads/infograh/image/thumbnail/',170,120);
			}
			if($_FILES['file_pdf']['name'])
			{
				$_POST['file_pdf'] = $rs->upload($_FILES['file_pdf'],'uploads/infograh/pdf/');
				
			}
			
			
			$cdate=$date('Y-m-d H:i:s');
			
			if(!$id)$_POST['user_id_created'] = $this->session->userdata('id');
			if(!$id)$_POST['created'] = $cdate;
			
			if(!$id)$_POST['views'] = '1';
			
			$_POST['user_id_updated'] = $this->session->userdata('id');
			$_POST['updated'] = $cdate;
			
			$_POST['status'] = "approve";
			
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', lang('save_data_complete'));
			redirect($_POST['referer']);
		}
		
	}*/
	
	function save($topic_id=FALSE,$id=FALSE)
	{
		if($_POST){

				$rs = new InfograhM($id);
				
				if($_FILES['image']['name'])
				{
					$_POST['image'] = $rs->upload($_FILES['image'],'uploads/infograh/image/');
					$rs->thumb('uploads/infograh/image/thumbnail/',170,120);
				}
				if($_FILES['file_pdf']['name'])
				{
					$_POST['file_pdf'] = $rs->upload($_FILES['file_pdf'],'uploads/infograh/pdf/');
					
				}
				
				if(!$id)$_POST['user_id_created'] = $this->session->userdata('id');
				if(!$id)$_POST['created'] = date('Y-m-d H:i:s');
				
				$_POST['user_id_updated'] = $this->session->userdata('id');
				$_POST['updated'] = date('Y-m-d H:i:s');
				
				if(!$id)$_POST['views'] = '1';
				if(!$id)$_POST['status'] = "approve";
				
				$rs->from_array($_POST);
				$rs->save();
				
				set_notify('success', lang('save_data_complete'));
			
			redirect($_POST['referer']);
		}
			
		
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$InfograhM = new InfograhM($id);
			$InfograhM->delete_file($InfograhM->id,'uploads/infograh/image/','image');
			$InfograhM->delete_file($InfograhM->id,'uploads/infograh/pdf/','file_pdf');
			$InfograhM->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('infograh/admin/infograh/index');
	}

}

?>