<?php
   
	Class Coverpages_banner extends Public_Controller
	{
		function __construct()
		{
			parent::__construct();
		}	
		
		function index($id=FALSE)
		{
				$data['rs'] = new Coverpages_banners();
				$data['rs']->where('image <>','');
				$data['rs']->where('status','approve');
				$data['rs']->order_by('id','desc')->get_page();
				
				
				$this->template->build('coverpages_banner_index',$data);
		}
		
		function inc_home()
		{

				$data['rs'] = new Coverpages_banners();
				$data['rs']->where('image <>','');
				$data['rs']->where('status','approve');
				$data['rs']->order_by('id','desc')->limit(5)->get();
				$this->load->view('coverpages_banner_index',$data);
			
		}
		
		function infograh_list()
		{

				$data['rs'] = new Coverpages_banners();
				$data['rs']->where('image <>','');
				$data['rs']->where('status','approve');
				$data['rs']->order_by('id','desc')->get_page();
				
				
				$this->template->build('coverpages_banner_list',$data);
			
		}

	}

?>