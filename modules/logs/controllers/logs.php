<?php
class Logs extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index($id=FALSE)
	{
		$this->load->helper('file');
		$data['log'] = nl2br(read_file('log.txt'));
		$this->template->build('index',$data);
	}
	
	
}
?>