<?php
	class Newsletters extends Public_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		
		function inc_register(){
			$categories = new Category();
			$data['categories'] = $categories->where("module = 'newsletters' and parents <> 0 and status = 'approve'")->order_by('id','desc')->get_page();
			$this->load->view('inc_register',$data);
		}
	}
?>