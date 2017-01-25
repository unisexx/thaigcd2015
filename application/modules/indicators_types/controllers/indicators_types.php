<?php
   
	Class Indicators_types extends Public_Controller
	{
		function __construct()
		{
			parent::__construct();
		}	
		
		function index($id=FALSE)
		{

		}
		
		function view($id)
		{

		}
		
		function inc_home()
		{

				$data['rs'] = new Indicator_type();
				$data['rs']->where('status','approve');
				$data['rs']->order_by('id','desc')->limit(5)->get();
				$this->load->view('inc_index',$data);
			
		}
		
		function indicators_list()
		{

				$data['rs'] = new Indicator_type();
				$data['rs']->where('status','approve');
				$data['rs']->order_by('id','desc')->get_page();
				
				
				$this->template->build('indicator_type_list',$data);
			
		}

	}

?>