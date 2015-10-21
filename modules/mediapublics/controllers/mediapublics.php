<?php
	class Mediapublics extends Public_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		
		function index($group_id=FALSE,$category_id=FALSE)
		{
			$this->template->set_layout('layout_blank');
			$data['group_id'] = $group_id;
			if($group_id)
			{
				$data['group'] = new group($group_id);
				$this->template->set_layout('group_blank');
			}
			
			
				if($category_id){
					$data['categories'] = new Category($category_id);
					$this->template->build('mediapublic_category_view',$data);
				}else{
					$data['mediapublics'] = new Mediapublic();
					$data['mediapublics']->where("status = 'approve'")->order_by('id','desc')->limit(5)->get_page();
					$data['categories'] = new Category();
					$data['categories']->where("module = 'mediapublics' and parents <> 0")->get_page();
						
					$this->template->build('mediapublic_index',$data);
				}
		}
		
		function download($id)
		{
			$media = new Mediapublic($id);
			$media->counter();
			$this->load->helper('download');
			
			$data = file_get_contents("uploads/mediapublics/".basename($media->file));
			$name = basename($media->file);
			force_download($name, $data); 
		}
		
		function inc_home($id){
			$data['media'] = new Mediapublic();
			$data['group_id'] = $id;
			$data['media']->where("status = 'approve'")->order_by('id','desc')->limit(5)->where_related_user('group_id',$id)->get_page();
			$this->load->view('inc_index',$data);
		}
	}
?>