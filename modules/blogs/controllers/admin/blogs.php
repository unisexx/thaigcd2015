<?php
class Blogs extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['comments'] = new blogcomment_alert();
		$data['comments']->get_page();
		$this->template->build('admin/comment_index',$data);
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$comment = new blogcomment_alert($id);
			$comment->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('blogs/admin/blogs');
	}
	
}
?>