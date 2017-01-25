<?php
   
	Class Downloads extends Public_Controller
	{
		function __construct()
		{
			parent::__construct();
		}	
		
		function index($id=FALSE)
		{

		}
		
		function inc_home()
		{

				$data['downloads'] = new Download();
                if(@$_GET['category_id'])$data['downloads']->where("category_id = ".$_GET['category_id']);
                if(@$_GET['search'])$data['downloads']->where("title like '%".$_GET['search']."%'");
                $data['downloads']->where("status = 'approve'");
				$data['downloads']->where("title <> ''")->order_by('id','desc')->get_page();
				$this->template->build('inc_index',$data);
			
		}
		
		function download($id)
        {
            $media = new Download($id);
            $media->counter();
            $this->load->helper('download');
            $this->load->helper('file');
            $media->file = 'http://thaigcd.ddc.moph.go.th/'.$media->file;
            if(!get_mime_by_extension($media->file))
            {
                redirect($media->file);
            }
            else
            {
                $data = file_get_contents(urldecode($media->file));
                $name = basename(urldecode($media->file));
                force_download($name, $data); 
            }
        }
		
	}

?>