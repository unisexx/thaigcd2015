<?php
class Knowledges extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index($id=FALSE)
	{
		$this->template->set_layout('layout_blank');
		if($id)
		{
			

			$data['category'] = new Category($id);
			if(@$_POST['search'])$data['category']->knowledge->where("title like '%".$_POST['search']."%'");
			$data['category']->knowledge->where("status = 'approve'")->order_by('id','desc')->get_page(limit());
			$this->template->build('knowledge_index_id',$data);
		}
		else
		{
			$data['knowledge'] = new Knowledge();
			$data['categories'] = new Category();
			$data['categories']->where("module = 'knowledges' and parents <> 0")->order_by('id','asc')->get(); 
			$this->template->build('knowledge_index',$data);
		}
	}
	
	function tag($tag)
	{
		$data['tag'] = $tag;
		$data['knowledges'] = new Knowledge();
		$data['knowledges']->where("tag like '%$tag%'")->get_page(limit());
		$this->template->build('knowledge_tag',$data);
	}
	
	function view($id)
	{
		$data['knowledge'] = new Knowledge($id);
		$data['knowledge']->counter();
		$this->template->build('knowledge_view',$data);
	}
	
	function inc_left()
	{
		$categories = new Category();
		$data['categories'] = $categories->where("module = 'knowledges' and parents <> 0")->order_by('id','asc')->get(); 
		$data['count'] = $categories->where("module = 'knowledges' and parents <> 0")->count();
		$data['num'] = ceil($categories->where("module = 'knowledges' and parents <> 0")->count()/2);
		$this->load->view('inc_index',$data);
	}
}
?>