<?php
   
	Class Indicators extends Public_Controller
	{
		function __construct()
		{
			parent::__construct();
		}	
		
		function index($id=FALSE)
		{
				$data['rs'] = new Indicator();
				
				$where = '';
				if(@$_GET['search'])$where .= " and title like '%".$_GET['search']."%'";
				
				$data['rs']->where('status','0');
				$data['rs']->where("files <> ''".$where)->order_by('id','desc')->get_page();
				//$data['rs']->order_by('id','desc')->get_page();
				$this->template->build('inc_index',$data);
		}
		
		function inc_home()
		{

				$data['rs'] = new Indicator();
				
				$where = '';
			
				if(@$_GET['search'])$where .= " and title like '%".$_GET['search']."%'";
				
				$data['rs']->where('status','approve');
				//$data['rs']->order_by('id','desc')->limit(5)->get();
				$data['rs']->order_by('id','desc')->get_page();
				
				//$this->load->view('inc_index',$data);
				$this->template->build('inc_index',$data);
			
		}
		
		function indicators_list()
		{

				$data['rs'] = new Indicator();
				$data['rs']->where('status','approve');
				$data['rs']->order_by('id','desc')->get_page();
				
				
				$this->template->build('indicators_list',$data);
			
		}
		
		function view($id)
		{
			$download = new Indicator($id);
			
			$counter = $download->downloads;
			$counter = $counter+1;
			
			$download->downloads = $counter;
			
			$download->save();
			
			$this->load->helper('download');
			$data = file_get_contents("uploads/indicators/".basename($download->files));
			$name = basename($download->files);
			force_download($name, $data); 
			
		}

	}

?>