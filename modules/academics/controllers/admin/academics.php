<?php
    
	Class Academics extends Admin_controller{
		
		function __construct()
		{
			parent::__construct();
		}
		
		function index(){
			$data['academics'] = new Academic();
			if(@$_POST['search'])$data['academics']->where("title like '%".$_POST['search']."%'");
			if(@$_POST['category_id'])$data['academics']->where("category_id = ".$_POST['category_id']);
			$data['academics']->order_by('id','desc')->get_page(limit());
			$this->template->append_metadata(js_lightbox());
			$this->template->append_metadata(js_checkbox('approve'));
			$this->template->build('admin/academic_index',$data);
		}
		
		function approve($id)
		{
			if($_POST)
			{
				$academic = new Academic($id);
				$academic->from_array($_POST);
				$academic->approve_date = date("Y-m-d H:i:s");
				$academic->save();
			}
			echo $_POST['status'];
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
				$_POST['user_id'] = $this->session->userdata('id');
				$academic->from_array($_POST);
				$academic->save();
				set_notify('success', lang('save_data_complete'));
			}
			redirect('academics/admin/academics');
		}
		
		function delete($id=FALSE)
		{
			if($id)
			{
				$academic = new Academic($id);
				$academic->delete();
				set_notify('success', lang('delete_data_complete'));
			}
			redirect('academics/admin/academics');
		}
	
	}
?>