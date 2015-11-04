<?php
class Groups extends Public_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index($id = FALSE)
	{
		if($id)
		{
			$data['group'] = new Group($id);
			$this->template->set_layout('group_home');
			$this->template->build('group_index_id',$data);
		}
		else
		{
			$data['groups'] = new Group();
			$data['groups']->order_by('id','asc')->get_page();
			$this->template->build('group_index',$data);
		}
		
	}
	
	function view($id = FALSE)
	{
			$data['group'] = new Group($id);
			// $this->template->set_layout('group_layout');
			$this->template->build('group_view',$data);
	}
	
	

}
?>