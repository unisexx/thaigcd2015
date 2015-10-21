<?php
    
	Class Mediafiles extends Public_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->template->set_layout('layout_blank');
		}
		
		function index()
		{	
			$data['mediafiles'] = new Mediafile();
			(@$_GET['textsearch'])?$data['mediafiles']->like('title',$_GET['textsearch']):'';
			(@$_GET['category_id'])?$data['mediafiles']->where('category_id',$_GET['category_id']):'';
			(@$_GET['groups'])?$data['mediafiles']->where_related_user('group_id',$_GET['groups']):'';

			$data['mediafiles']->where("status = 'approve'")->order_by('id','desc')->limit(1)->get();
			
			$data['mediafiles_list'] = new Mediafile();
			(@$_GET['textsearch'])?$data['mediafiles_list']->like('title',$_GET['textsearch']):'';
			(@$_GET['category_id'])?$data['mediafiles_list']->where('category_id',$_GET['category_id']):'';
			(@$_GET['groups'])?$data['mediafiles_list']->where_related_user('group_id',$_GET['groups']):'';
			$data['mediafiles_list']->where("status = 'approve'")->order_by('id','desc')->get_page(10);
			$this->template->build('mediafile_index',$data);
		}
		
		function view($id)
		{
			$data['mediafiles'] = new Mediafile($id);
			$data['mediafiles']->counter();
			$data['mediafiles_list'] = new Mediafile();
			$data['mediafiles_list']->where("status = 'approve'")->order_by('id','desc')->get_page(10);
			$this->template->build('mediafile_index',$data);
		}
		
		function inc_home()
		{
			$data['mediafiles'] = new mediafile();
			$data['mediafiles']->where("status = 'approve'")->order_by('id','desc')->limit(1)->get();
			$data['mediafiles_list'] = new mediafile();
			$data['mediafiles_list']->where("status = 'approve'")->order_by('id','desc')->limit(5)->get_page();
			$this->load->view('inc_index',$data);
		}
		
		function ajax_show($id){
			$data['mediafiles'] = new mediafile($id);
			$data['mediafiles']->counter();
			$this->load->view('ajax_show',$data);
		}
		
		function ajax_show_full($id){
			$data['mediafiles'] = new mediafile($id);
			$data['mediafiles']->counter();
			$this->load->view('ajax_show_full',$data);
		}
	}
	
?>