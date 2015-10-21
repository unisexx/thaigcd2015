<?php
   
	Class Galleries extends Public_Controller
	{
		function __construct()
		{
			parent::__construct();
		}	
		
		function index($id=FALSE)
		{
			$this->template->set_layout('layout_blank');
			
			if(empty($id)){
				$data['galleries'] = new Gallery();
				$data['categories'] = new Category();
				(@$_POST['albumsearch'])?$data['categories']->like('name',$_POST['albumsearch']):'';
				(@$_POST['groups'])?$data['categories']->where_related_user('group_id',$_POST['groups']):'';
				$data['categories']->where("module = 'galleries' and parents <> 0")->get_page();
			}else{

		
			$data['group'] = new group($id);
			$this->template->set_layout('group_blank');
		
				$data['galleries'] = new Gallery();
				$data['categories'] = new Category();
				(@$_POST['category_id'])?$data['categories']->where('id',$_POST['category_id']):'';
				$data['categories']->where("module = 'galleries' and parents <> 0")->where_related_user('group_id',$id)->get_page();
			}
			$this->template->build('gallery_index',$data);
		}
		
		function view($id,$group=FALSE)
		{
			$this->template->set_layout('layout_blank');
			$data['catagory_id'] = $id;
			
			$data['galleries'] = new Gallery();
			(@$_POST['textsearch'])?$data['galleries']->like('title',$_POST['textsearch']):'';
			(@$_POST['groups'])?$data['galleries']->where_related_user('group_id',$_POST['groups']):'';
			$data['galleries']->where("category_id = '$id'")->get_page(limit());
			if($group)
			{
				$data['group'] = new group($data['galleries']->category->user->group_id);
				$this->template->set_layout('group_blank');
			}
			$this->template->build('gallery_view',$data);
		}
		
		function inc_home($id=FALSE)
		{
			if(empty($id)){
				$data['group_id'] = '';
				$data['galleries'] = new Gallery();
				$data['galleries']->order_by('id','desc')->limit(30)->get();
				$this->load->view('inc_index',$data);
			}else{
				$data['group_id'] = $id;
				$data['galleries'] = new Gallery();
				$data['galleries']->order_by('id','desc')->limit(30)->where_related_user('group_id',$id)->get();
				$this->load->view('inc_index',$data);
			}
		}

	}

?>