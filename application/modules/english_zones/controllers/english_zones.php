<?php
class English_zones extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		// if(!is_login()) 
		// {
			// set_notify('error','คุณไม่มีสิทธิเข้าใช้งานในส่วนนี้ค่ะ');
			// redirect('home');
		// }
		$this->template->set_layout('layout_blank');
		$data['english_zones'] = new English_zone();
		(@$_GET['search'])?$data['english_zones']->like('title','%'.$_GET['search'].'%'):'';
		$data['english_zones']->where('status = "approve"')->order_by('id','desc')->get_page(); 
		$this->template->build('english_zone_index',$data);
	}
	
	function download($id)
	{
		$english_zone = new English_zone($id);
		$english_zone->counter();
		$this->load->helper('download');
			
		$data = file_get_contents($english_zone->file);
		$name = basename($english_zone->file);
		force_download($name, $data); 
	}
	
	
}
?>