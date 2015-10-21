<?php
    
	Class Academics extends Admin_Controller{
		
		function __construct()
		{
			parent::__construct();
		}
		
		function index(){
			$data['academics'] = new Academic();
			if(@$_GET['search'])$data['academics']->where("title like '%".$_GET['search']."%'");
			if(@$_GET['status'])$data['academics']->where('status',$_GET['status']);
			if(@$_GET['category_id'])$data['academics']->where("category_id = ".$_GET['category_id']);
			auth_filter($data['academics'])->order_by('id','desc')->get_page(limit());
			$this->template->append_metadata(js_lightbox());
			$this->template->append_metadata(js_checkbox('approve'));
			$this->template->build('admin/academic_index',$data);
		}
		
		function approve($id)
		{
			if($_POST)
			{
				$academic = new Academic($id);
				$_POST['approve_id'] = $this->session->userdata('id');
				$academic->from_array($_POST);
				$academic->approve_date = date("Y-m-d H:i:s");
				$academic->save();
				echo approve_comment($academic);
			}
		}
	
		function form($id=FALSE)
		{
			$data['academics'] = new Academic($id);
			$this->template->append_metadata(js_datepicker());
			$this->template->build('admin/academic_form',$data);
		}
		
		function save($id=FALSE)
		{
			if($_POST)
			{
				$academic = new Academic($id);
				$_POST['title'] = lang_encode($_POST['title']);
				$_POST['detail'] = lang_encode($_POST['detail']);
				if(!$id)$_POST['user_id'] = $this->session->userdata('id');
				$academic->from_array($_POST);
				$academic->save();
				set_notify('success', lang('save_data_complete'));
			}
			redirect($_POST['referer']);
		}
		
		function delete($id=FALSE)
		{
			if($id)
			{
				$academic = new Academic($id);
				$academic->delete();
				set_notify('success', lang('delete_data_complete'));
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	
	}
?>