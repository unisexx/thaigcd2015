<?php
class Laws extends Public_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$categories = new Category();
		$data['categories'] = $categories->where("module = 'laws' and parents <> 0")->order_by('id','asc')->get(); 
		// $this->template->set_layout('layout_blank');
		$this->template->build('law_index',$data);
	}
	
	function view($id,$group = FALSE)
	{
		$data['law'] = new Law($id);
		$data['law']->counter();
		$this->template->build('law_view',$data);

	}
	
	function inc_home()
	{
		$categories = new Category();
		$data['categories'] = $categories->where("module = 'laws' and parents <> 0")->order_by('id','asc')->get(); 
		$this->load->view('inc_index',$data);
	}
}
?>