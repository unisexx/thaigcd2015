<?php
class Hosts extends Meeting_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['hosts'] = new Host;
		if(isset($_GET['search']))$data['hosts']->where('name like','%'.$_GET['search'].'%');
		$data['hosts']->order_by('id','desc')->get_page(10);
		$this->template->build('index',$data);
	}
	
	function form($id=NULL)
	{
		$data['host']= new Host($id);
		$this->template->build('form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$host = new Host($id);
			$host->from_array($_POST);
			$host->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('hosts');
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$hilight = new hilight($id);
			$hilight->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('hosts');
	}
	

}
?>