<?php
   
	class Modules_infograph extends Public_Controller
	{
		function __construct()
		{
			parent::__construct();
		}	
		
		function index($id=FALSE)
		{
/*				$data['infograh_rs'] = new InfograhM();
				$data['infograh_rs']->where('image <>','');
				$data['infograh_rs']->where('status','approve');
				$data['infograh_rs']->order_by('id','desc')->get(2);
				
				$data['infograh_txt'] = new InfograhM();
				$data['infograh_txt']->where('image <>','');
				$data['infograh_txt']->where('status','approve');
				$data['infograh_txt']->order_by('id','desc')->get(5);*/
				
				
				$data['rs_data'] = new Model_infograph();
				$data['rs_data']->where('image <>','');
				$data['rs_data']->where('status','approve');
				$data['rs_data']->order_by('id','desc')->get(2);

				$data['rs_txt'] = new Model_infograph();
				$data['rs_txt']->where('image <>','');
				$data['rs_txt']->where('status','approve');
				$data['rs_txt']->order_by('id','desc')->get(5);
								
				$data['rs_test'] = 'test show page';
				$this->load->view('modules_infograph_index',$data);
		}
		
		function show_slide($id=FALSE)
		{
				$data['rs_data'] = new Model_infograph();
				$data['rs_data']->where('image <>','');
				$data['rs_data']->where('status','approve');
				$data['rs_data']->order_by('id','desc')->get(10);

				$data['rs_txt'] = new Model_infograph();
				$data['rs_txt']->where('image <>','');
				$data['rs_txt']->where('status','approve');
				$data['rs_txt']->order_by('id','desc')->get(5);
								
				$data['rs_test'] = 'test show page';
				$this->load->view('info_grah_slide',$data);
		}
		
		
		function test_slide($id=FALSE)
		{
				$data['rs_data'] = new Model_infograph();
				$data['rs_data']->where('image <>','');
				$data['rs_data']->where('status','approve');
				$data['rs_data']->order_by('id','desc')->get(10);

				$data['rs_txt'] = new Model_infograph();
				$data['rs_txt']->where('image <>','');
				$data['rs_txt']->where('status','approve');
				$data['rs_txt']->order_by('id','desc')->get(5);
								
				
				$this->load->view('image_slide',$data);
		}
				
		function inc_home()
		{

				$data['rs'] = new InfograhM();
				$data['rs']->where('image <>','');
				$data['rs']->where('status','approve');
				$data['rs']->order_by('id','desc')->limit(5)->get();
				$this->load->view('modules_infograph_index',$data);
			
		}
		
		function modules_infograph_list()
		{

				$data['rs_data'] = new Model_infograph();
				$data['rs_data']->where('image <>','');
				$data['rs_data']->where('status','approve');
				
				$data['rs_data']->order_by('id','desc')->get_page();
				
				
				$this->template->build('modules_infograph_list',$data);
			
		}
		
		
		function view($id)
		{
			$download = new Model_infograph($id);
			
			$counter = $download->views;
			$counter = $counter+1;
			
			$download->views = $counter;
			
			$download->save();
			
			
/*			$this->load->helper('download');
			$data = file_get_contents("uploads/modules_infograph/pdf/".basename($download->file_pdf));
			$name = basename($download->file_pdf);
			force_download($name, $data); */
			$data['rs'] = new Model_infograph($id);
			$this->template->build('views',$data);
			
		}

	}

?>