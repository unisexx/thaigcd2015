<?php
class Public_Controller extends Master_Controller
{
	
	function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('lang')) $this->session->set_userdata('lang','th');
		$this->template->title('สำนักโรคติดต่อทั่วไป :: Bureau of General Communicable Department of Disease Control MOPH, Thailand');
		$this->session->userdata('th',"gcdnew");
		$this->session->userdata('en',"gcdeng");
		$this->template->set_theme('thaigcd2015');
    	$this->template->set_layout('layout');
		// Set js
		$this->lang->load('admin');
		$this->template->append_metadata(js_notify());
		$this->template->append_metadata(js_lightbox());
		
		// set lang
		if(!$this->session->userdata('lang')) $this->session->set_userdata('lang','th');
		if(@$this->session->userdata('lang') == "th"){
			$this->lang->load('public','thai');
		}else{
			$this->lang->load('public','english');
		}
	}
	
}
?>