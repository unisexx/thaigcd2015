<?php
class Pages extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		if(!is_login('Administrator')) redirect('users/admin/auth');
		
		$pages = new Page();
		if(@$_GET['search'])$pages->where("title like '%".$_GET['search']."%'");
		$data['pages'] = $pages->where('shows','1')->order_by('id','desc')->get_page();
		$this->template->build('admin/page_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['page'] = new Page($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/page_form',$data);
	}
	
	function save($id=FALSE)
	{
		//$this->db->debug = true;
		if($_POST)
		{
			$page = new Page($id);
			$_POST['title'] = lang_encode($_POST['title']);
			$_POST['detail'] = lang_encode($_POST['detail']);
			$_POST['shows'] = '1';
			//$_POST['detail'] = '"th":"'.$_POST['detail']['th'].'","en":""';
			$_POST['user_id'] = $this->session->userdata('id');
			$page->from_array($_POST);
			$page->save();
			
			//savelogs
			user_log($this->db->insert_id(),$_POST['title']); // content_id,content_title
			
			set_notify('success', lang('save_data_complete'));
		}
		redirect('pages/admin/pages');
	}
	
	function delete($id)
	{
/*		$page = new Page($id);
		$page->delete();*/
		
			$page = new Page($id);
			
			//savelogs
			user_log($id,$page->title); // content_id,content_title
			
			$page->shows = '0';
			
			$page->save();
		
			
		set_notify('success', lang('delete_data_complete'));
		redirect('pages/admin/pages');
	}
	
	
}
?>