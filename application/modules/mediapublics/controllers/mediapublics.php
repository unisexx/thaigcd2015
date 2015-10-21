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
		
		function search()
		{
			$data['mediapublics'] = new Mediapublic();
			
			(@$_GET['search'])?$data['mediapublics']->like('title','%'.$_GET['search'].'%'):'';
			(@$_GET['groups'])?$data['mediapublics']->where('group_id',$_GET['groups']):'';
			$data['mediapublics']->where("status = 'approve'")->order_by("id", "desc")->get_page();
			$this->template->build('mediapublic_search',$data);
		}
		
		function download($id)
		{
			$media = new Mediapublic($id);
			$media->counter();
			$this->load->helper('download');
			$this->load->helper('file');
			if(!get_mime_by_extension($media->file))
			{
				redirect($media->file);
			}
			else
			{
				$data = file_get_contents(urldecode($media->file));
				$name = basename(urldecode($media->file));
				force_download($name, $data); 
			}
		}
		
		function inc_home($id=NULL){
			$data['media'] = new Mediapublic();
			if($id)
			{
				$data['media']->where('group_id',$id);
				$data['group_id'] = $id;
			}
			$data['media']->where("status = 'approve'")->order_by('id','desc')->limit(8)->get();
			if($id)
			{
				$this->load->view('inc_index',$data);
			}
			else
			{
				$this->load->view('inc_index2',$data);
			}
			
		}
	}
?>