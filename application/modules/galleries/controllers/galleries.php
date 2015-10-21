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
				(@$_GET['albumsearch'])?$data['categories']->like('name',$_GET['albumsearch']):'';
				(@$_GET['groups'])?$data['categories']->where('group_id',$_GET['groups']):'';
				$data['categories']->where("module = 'galleries' and parents <> 0")->order_by('id','desc')->get_page();
			}else{

		
			$data['group'] = new group($id);
			$this->template->set_layout('group_blank');
		
				$data['galleries'] = new Gallery();
				$data['categories'] = new Category();
				(@$_GET['category_id'])?$data['categories']->where('id',$_GET['category_id']):'';
				$data['categories']->where("module = 'galleries' and parents <> 0")->where('group_id',$id)->order_by('id','desc')->get_page();
			}
			$this->template->build('gallery_index',$data);
		}
		
		function view($id,$group=FALSE)
		{
			$this->template->set_layout('layout_blank');
			$data['catagory_id'] = $id;
			
			$data['galleries'] = new Gallery();
			(@$_POST['textsearch'])?$data['galleries']->like('title',$_POST['textsearch']):'';
			(@$_POST['groups'])?$data['galleries']->where_related_category('group_id',$_POST['groups']):'';
			$data['galleries']->where("category_id = '$id'")->order_by('id','desc')->get_page(limit());
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
				$data['galleries']->where_related_category('status','approve');
				$data['galleries']->where('image <>','');
				$data['galleries']->order_by('id','desc')->limit(10)->get();
				$this->load->view('inc_index',$data);
			}else{
				$data['group_id'] = $id;
				$data['galleries'] = new Gallery();
				$data['galleries']->where('image <>','');
				$data['galleries']->where_related_category('status','approve');
				$data['galleries']->order_by('id','desc')->limit(10)->where_related_category('group_id',$id)->get();
				$this->load->view('inc_index',$data);
			}
		}

	}

?>