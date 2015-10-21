<?php
	
Class Webboard_quizs extends Admin_Controller{
		
	function __construct(){
		parent::__construct();
	}
		
	function index()
	{
		$webboard_quizs = new Webboard_quiz();
		if(@$_POST['category_id'])$webboard_quizs->where('category_id',$_POST['category_id']);
		$data['webboard_quizs'] = $webboard_quizs->order_by('id','desc')->get_page();
		
		$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/webboard_index',$data);
	}
}
?>