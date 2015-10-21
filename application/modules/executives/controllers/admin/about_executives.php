<?php
class About_executives extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function history_form()
	{
		$this->template->build('admin/history_form');
	}
	
	
}
?>