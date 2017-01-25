<?php
   
	Class Infograh extends Public_Controller
	{
		function __construct()
		{
			parent::__construct();
		}	
		
		function index()
		{
/*				$data['infograh_rs'] = new Infograh_models();
				$data['infograh_rs']->where('status','approve');
				$data['infograh_rs']->order_by('id','desc')->get(5);
				$this->load->view('inc_index',$data);*/
				
						
				$data['infograh_rs']  = new InfograhM();
			
				$data['infograh_rs']->order_by('id','desc')->get(2);
				
				$data['infograh_txt']  = new InfograhM();
			
				$data['infograh_txt']->order_by('id','desc')->get(5);
				
				$this->load->view('inc_index',$data);
		}
		
		function inc_home()
		{

				$data['infograh_rs'] = new Infograh_models();
				$data['infograh_rs']->where('status','approve');
				$data['infograh_rs']->order_by('id','desc')->get(5);
				$this->load->view('inc_index',$data);
			
		}
		
		function infograh_list()
		{

				$data['rs'] = new Infograh_models();
				$data['rs']->where('status','approve');
				$data['rs']->order_by('id','desc')->get_page();
				
				
				$this->template->build('infograh_list',$data);
			
		}

	}

?>