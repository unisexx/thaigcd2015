<?php

Class Faqs extends Admin_Controller{
	
	function __construct(){
		parent::__construct();	
	}
	
	function index()
	{
		$data['faqs'] = new Faq();
		if(@$_POST['search'])$data['faqs']->where("question like '%".$_POST['search']."%'");
		if(@$_POST['category_id'])$data['faqs']->where("category_id = ".$_POST['category_id']);
		$data['faqs']->order_by('orderlist','asc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/faqs_index',$data);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$faqs = new Faq($id);
			$faqs->approve_date = date("Y-m-d H:i:s");
			$faqs->from_array($_POST);
			$faqs->save();
		}
		echo $_POST['status'];
	}
	
	function form($topic_id=FALSE,$id=FALSE)
	{
		$data['quiz'] = new Webboard_quiz($topic_id);
		$data['faqs'] = new Faq($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/faqs_form',$data);
	}
	
	function save($topic_id=FALSE,$id=FALSE)
	{
		if($_POST){
			if(isset($_POST['orderlist'])){
				foreach($_POST['orderlist'] as $key => $item)
				{
					if($item)
					{
						$faq = new Faq(@$_POST['orderid'][$key]);
						$faq->from_array(array('orderlist' => $item));
						$faq->save();
					}
				}
				set_notify('success', lang('save_data_complete'));
			}else{
				$faq = new Faq($id);
				$_POST['question'] = lang_encode($_POST['question']);
				$_POST['answer'] = lang_encode($_POST['answer']);
				$_POST['user_id'] = $this->session->userdata('id');
				$faq->from_array($_POST);
				$faq->save();
				set_notify('success', lang('save_data_complete'));
			}
		}
			
		redirect('faqs/admin/faqs');
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$faq = new Faq($id);
			$faq->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('faqs/admin/faqs');
	}
	
}

?>