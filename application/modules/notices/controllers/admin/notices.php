<?php
class Notices extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['notices'] = new Notice();
		if(@$_GET['search'])$data['notices']->where("title like '%".$_GET['search']."%'");
		if(@$_GET['status'])$data['notices']->where('status',$_GET['status']);
		if(@$_GET['category_id'])$data['notices']->where("category_id = ".$_GET['category_id']);
		auth_filter($data['notices'])->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox())->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/notice_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['notice'] = new Notice($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/notice_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$notice = new Notice($id);
			$_POST['title'] = lang_encode($_POST['title']);
			$_POST['intro'] = lang_encode($_POST['intro']);
			$_POST['detail'] = lang_encode($_POST['detail']);
			$_POST['start_date'] = Date2DB($_POST['start_date']);
			$_POST['end_date'] = Date2DB($_POST['end_date']);
			$_POST['start_notice'] = Date2DB($_POST['start_notice']);
			$_POST['end_notice'] = Date2DB($_POST['end_notice']);
			$_POST['open_date'] = Date2DB($_POST['open_date']);
			$_POST['observe_date'] = Date2DB($_POST['observe_date']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			if($_FILES['image']['name'])
			{
				if($id)$notice->delete_file('uploads/notice/thumbnail','image');
				$notice->image = $notice->upload($_FILES['image'],'uploads/notice/thumbnail',77,64);
			}
			$notice->from_array($_POST);
			$notice->save();
			
			//savelogs
			user_log($this->db->insert_id(),$_POST['title']); // content_id,content_title
			
			set_notify('success', lang('save_data_complete'));
			redirect($_POST['referer']);
		}
		
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$notice = new Notice($id);
			
			//savelogs
			user_log($id,$notice->title); // content_id,content_title
		
			$notice->delete();
			
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$notice = new Notice($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$notice->approve_date = date("Y-m-d H:i:s");
			$notice->from_array($_POST);
			$notice->save();
			echo approve_comment($notice);
		}
	}
	
	function comment_index($notice_id)
	{
		$this->template->set_layout('lightbox');
		$data['comments'] = new Notice_comment;
		$data['comments']->where('notice_id',$notice_id)->order_by('id','desc')->get_page();
		$this->template->build('admin/comment_index',$data);
		
	}
	
	function comment_view($id)
	{
		$this->template->set_layout('lightbox');
		$data['notice_comment'] = new Notice_comment($id);
		$this->template->build('admin/comment_view',$data);
	}
	
	function comment_delete($id=FALSE)
	{
		if($id)
		{
			$notice = new Notice_comment($id);
			$notice->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	
	
}
?>