<?php
class Newsletters extends Public_Controller
{
		
		function __construct()
		{
			parent::__construct();
		}
		
		function inc_register(){
			$categories = new Category();
			$data['categories'] = $categories->where("module = 'newsletters' and parents <> 0 and status = 'approve'")->order_by('id','desc')->get_page();
			$this->load->view('inc_register',$data);
		}
		
	function inc_newsletter(){
		$this->load->view('inc_newsletter');
	}
	
	function newsletter_mail_submit(){
		if($_POST)
		{
			$newsletters_email_list = new Newsletters_email_list();
			$newsletters_email_list->from_array($_POST);
			$newsletters_email_list->save();
			set_notify('success','บันทึกข้อมูลเรียบร้อยแล้วค่ะ');
			redirect('home');
		}
	}
	
	function check_email()
	{
		$newsletters_email_list = new Newsletters_email_list();
		$newsletters_email_list->get_by_email($_GET['email']);
		echo ($newsletters_email_list->email)?"false":"true";
	}
}
?>