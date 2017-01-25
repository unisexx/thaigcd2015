<?php
class Coverpages extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index($id=false){
		
		//$data['coverpage'] = new Coverpage($id);
		//$this->load->view('coverpage',$data);
		
		$data['coverpage'] = new Coverpage();
		$data['coverpage']->where('active','1');
		$data['coverpage']->order_by('id','desc')->get(1);
		
		
		$cpage = new Coverpage();
		$cpage->where('active','1');
		$cpage->order_by('id','desc')->get(1);
		
		
		$cdate = date('Y-m-d');
		
		if($cpage->end_date!='0000-00-00')
		{
			if($cpage->end_date<$cdate)
			{
				redirect('home');
			}
		}

		
		
		
		$data['coverpage_banner'] = new Coverpages_banners();
		$data['coverpage_banner']->where('status','approve');
		$data['coverpage_banner']->order_by('id','asc')->get(3);
		
		$this->load->view('index_coverpage',$data);
	}
}
?>