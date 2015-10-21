<?php
	class Academics extends Public_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		
		function index($category_id=FALSE)
		{
			$this->template->set_layout('layout_blank');
			if($category_id){
				$data['categories'] = new Category($category_id);
				(@$_GET['textsearch'])?$data['categories']->academic->like('title',$_GET['textsearch']):'';
				$data['categories']->academic->where("status = 'approve'")->order_by('id','desc')->get_page(limit());
				$this->template->build('academic_category_view',$data);
			}else{
				$data['categories'] = new Category(); 
				$data['categories']->where("module = 'academics' and parents <> 0")->get_page();
				$this->template->build('academic_index',$data);
			}
		}
		
		function search(){
			$data['academics'] = new Academic();
			(@$_GET['textsearch'])?$data['academics']->like('title',$_GET['textsearch']):'';
			$data['academics']->order_by('id','desc')->get_page();
			$this->template->build('academic_search',$data);
		}
		
		function download($id)
		{
			$media = new Academic($id);
			$media->counter();
			$this->load->helper('download');
			
			$data = file_get_contents("uploads/academics/".basename($media->file));
			$name = basename($media->file);
			force_download($name, $data); 
		}
		
	}
?>