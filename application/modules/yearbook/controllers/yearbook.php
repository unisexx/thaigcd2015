<?php
   
	Class Yearbook extends Public_Controller
	{
		function __construct()
		{
			parent::__construct();
		}	
		
		function index($id=FALSE)
		{
				$data['rs'] = new Yearbooks();
				
				$where = '';
				if(@$_GET['search'])$where .= " and title like '%".$_GET['search']."%'";
				
				$data['rs']->where('status','approve');
				$data['rs']->where("files <> ''".$where)->order_by('id','desc')->get_page();
				$this->template->build('inc_index',$data);
		}
		
/*		function inc_home()
		{

				$data['rs'] = new Yearbooks();
				
				$where = '';
			
				if(@$_GET['search'])$where .= " and title like '%".$_GET['search']."%'";
								
				$data['rs']->where('status','approve');
				$data['rs']->order_by('id','desc')->get_page();
				$this->load->view('inc_index',$data);
			
		}*/
		
		function yearbook_list()
		{

				$data['rs'] = new Yearbooks();
				$data['rs']->where('status','approve');
				$data['rs']->order_by('id','desc')->get_page();
				
				
				$this->template->build('yearbook_list',$data);
			
		}
		
		function view($id)
		{
			$download = new Yearbooks($id);
			
			$counter = $download->downloads;
			$counter = $counter+1;
			
			$download->downloads = $counter;
			
			$download->save();
			
			
			$this->load->helper('download');
			$data = file_get_contents("uploads/yearbook/".basename($download->files));
			$name = basename($download->files);
			force_download($name, $data); 
			
		}
		
		function viewtopic($id)
		{
			
			$download = new Yearbooks($id);
			
			$counter = $download->downloads;
			$counter = $counter+1;
			
			$download->downloads = $counter;
			
			$download->save();
			
			$data['rs'] = new Yearbooks($id);
			$this->template->build('views',$data);
			
		}

	}

?>