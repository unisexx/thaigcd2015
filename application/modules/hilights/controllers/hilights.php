<?php
class Hilights extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index($id=FALSE)
	{
		$this->template->set_layout('layout_blank');
		if($id)
		{
			$data['category'] = new Category($id);
			$data['category']->information->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'");
			$data['category']->information->order_by('id','desc')->get_page();
			$this->template->build('information_index_id',$data);
		}
		else
		{
			$data['categories'] = new Category();
			$data['categories']->where("module = 'informations' and parents <> 0")->order_by('id','asc')->get(); 
			$this->template->build('information_index',$data);
		}
	}
	
	function view($id)
	{
		$data['information'] = new Information($id);
		$data['information']->counter();
		if($data['information']->pdf)
		{
			redirect("uploads/pdf/".basename($data['information']->pdf));
		}
		else
		{
			$this->template->build('information_view',$data);
		}
	}
	
	function inc_home()
	{
		$data['hilights'] = new Hilight();
		$data['hilights']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'")->order_by('id','desc')->limit(20)->get();
		$this->load->view('inc_home',$data);
	}
}
?>