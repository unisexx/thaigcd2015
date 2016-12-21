<?php
class Knowledges extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index($id=FALSE)
	{
		// $this->template->set_layout('layout_blank');
		if($id)
		{
			

			$data['category'] = new Category($id);
			if(@$_GET['search'])$data['category']->knowledge->where("title like '%".$_GET['search']."%'");
			if($id=='17')
			{
				$data['category']->knowledge->order_by('title','desc');
				if(@$_GET['label'])
				{
					$data['category']->knowledge->where('label',$_GET['label']);
				}
				// else
				// {
					// $data['category']->knowledge->where('main',1);
				// }
			}
			else
			{
				$data['category']->knowledge->order_by('id','desc');
			}
			$data['category']->knowledge->where("status = 'approve'")->get_page(limit());
			$this->template->build('knowledge_index_id',$data);
		}
		else
		{
			$data['knowledge'] = new Knowledge();
			$data['categories'] = new Category();
			$data['categories']->where("module = 'knowledges' and parents <> 0")->order_by('orderlist','asc')->get(); 
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
		$data['categories'] = $categories->where("module = 'knowledges' and parents <> 0")->order_by('orderlist','asc')->get(); 
		$data['count'] = $categories->where("module = 'knowledges' and parents <> 0")->count();
		$data['num'] = ceil($categories->where("module = 'knowledges' and parents <> 0")->count()/2);
		$this->load->view('inc_index',$data);
	}
	
		function download($id)
	{
		$knowledge = new Knowledge_file($id);
		$knowledge->counter();
		$this->load->helper('download');
		$data = file_get_contents("uploads/knowledge/".basename($knowledge->file));
		$name = basename($knowledge->file);
		force_download($name, $data); 
	}
}
?>