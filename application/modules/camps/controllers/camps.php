<?php
class Camps extends Meeting_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['camps'] = new Camp;
		if(isset($_GET['search']))$data['camps']->where('name like','%'.$_GET['search'].'%');
		$data['camps']->order_by('id','desc')->get_page(10);

		$this->template->build('index',$data);
	}
	
	function form($id=NULL)
	{
		$data['camp']= new Camp($id);
		$this->template->build('form',$data);
	}
	
	function save($id=NULL)
	{
		if($_POST)
		{
			$camp = new Camp($id);
			$camp->from_array($_POST);
			if($_FILES['map']['name'])
			{
				if($id)$camp->delete_file('uploads/camp','map');
				$camp->map = $camp->upload($_FILES['map'],'uploads/camp');
			}
			$camp->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('camps');
	}
	
	function delete($id=NULL)
	{
		if($id)
		{
			$camp = new Camp($id);
			$hilight->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('camps');
	}
	

}
?>