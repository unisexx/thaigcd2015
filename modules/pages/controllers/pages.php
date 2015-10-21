<?php
class Pages extends Public_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index($slug)
	{
		$data['page'] = new Page();
		$data['page']->get_by_slug($slug);
		$this->template->build('page_index',$data);
	}
	
	
}
?>