<?php
class Articles extends Public_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index($category_id)
	{
		$categories = new Category();
		$data['categories'] = $categories->where('parents = '.$category_id)->order_by('lft','asc')->get(); 
		$this->template->build('information',$data);
	}
	
	function inc_tab($category_id,$view)
	{
		$categories = new Category();
		$data['categories'] = $categories->where('parents = '.$category_id)->order_by('lft','asc')->get(); 
		$this->load->view($view,$data);
	}
	
	function view($id)
	{
		$data['article'] = new Article($id);
		$this->template->build('information_view',$data);
	}
	
	function inc_article($category_id,$view)
	{
		$articles = new Article();
		$data['articles'] = $articles->where('category_id = '.$category_id)->order_by('id','desc')->limit(5)->get(); 
		$this->load->view($view,$data);
	}
	
}
?>