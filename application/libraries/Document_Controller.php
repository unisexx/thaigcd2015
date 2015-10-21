<?php
class Document_Controller extends Master_Controller
{
	
	function __construct()
	{
		parent::__construct();
		// Check Auth Login
		if(!is_login()) 
		{
			set_notify('error','คุณไม่มีสิทธิเข้าใช้งานในส่วนนี้ค่ะ');
			redirect('home');
		}
		else
		{
			if(!is_publish('documents'))
			{
				set_notify('error','คุณไม่มีสิทธิเข้าใช้งานในส่วนนี้ค่ะ');
				redirect('home');
			}
		}
		$this->template->title('Thaigcd.ddc.moph.go.th - ระบบลงทะเบียนการประชุม');
		$this->template->set_theme('document');
		$this->template->set_layout('layout');
		$this->lang->load('admin');
		$this->template->append_metadata(js_notify());
		$this->template->append_metadata(js_lightbox());
	}
	
}
?>