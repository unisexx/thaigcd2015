<?php
class Information_alerts extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['comments'] = new Information_alert;
		$data['comments']->get_page();
		$this->template->build('admin/alert',$data);
	}
	
	function delete($id=NULL)
	{
		if($id)
		{
			$alert = new Information_alert;
			$alert->get_by_information_comment_id($id);
			$alert->delete_all();
			$comment = new Information_comment($id);
			$comment->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>