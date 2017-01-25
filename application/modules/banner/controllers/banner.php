<?php
   
	Class Banner extends Public_Controller
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

				$data['Banner'] = new Banners();
				$data['Banner']->where('image <>','');
				$data['Banner']->where('status','approve');
				$data['Banner']->order_by('id','desc')->limit(10)->get();
				$this->load->view('inc_index',$data);
			
		}

	}

?>