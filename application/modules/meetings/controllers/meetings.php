<?php
class Meetings extends Meeting_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['meetings'] = new Meeting;
		if(@$_GET['search'])$data['meetings']->like('name','%'.$_GET['search'].'%');		
		$data['meetings']->order_by('id','desc')->get_page(10);
		$this->template->build('index',$data);
	}
	
	function form($id=NULL)
	{
		$data['meeting']= new Meeting($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$meeting = new Meeting($id);
			$_POST['start_date'] = Date2DB($_POST['start_date']);
			$_POST['end_date'] = Date2DB($_POST['end_date']);
			$_POST['close_date'] = Date2DB($_POST['close_date']);
			$meeting->from_array($_POST);
			$meeting->save();
			fix_file($_FILES['file']);
			foreach($_POST['doc'] as $key => $doc)
			{
				if((@$_FILES['file'][$key]['name'])||(@$_POST['doc_id'][$key]))
				{
					$document = new Meeting_document(@$_POST['doc_id'][$key]);
					if($_FILES['file'][$key]['name'])
					{
						if(@$_POST['doc_id'][$key])$document->delete_file('uploads/meeting','file');
						$document->file = $document->upload($_FILES['file'][$key],'uploads/meeting');	
					}		
					$document->name = $doc;
					$document->meeting_id = $meeting->id;
					$document->save();
				}
			}
			set_notify('success', lang('save_data_complete'));
		}
		redirect('meetings');
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$meeting = new Meeting($id);
			$meeting->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('meetings');
	}
	
	function download($id)
	{
		$document = new Meeting_document($id);
		$document->counter();
		$this->load->helper('download');
		$data = file_get_contents("uploads/meeting/".basename($document->file));
		$name = basename($document->file);
		force_download($name, $data); 
	}
	
	function document_delete($id)
	{
		$document = new Meeting_document($id);
		$document->delete();
		set_notify('success', lang('delete_data_complete'));
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function report($id)
	{
		$data['meeting'] = new Meeting($id);
		$query = $this->db->query("select @rownum:=@rownum+1,date('".$data['meeting']->end_date."') - interval @rownum day check_in from
(select 0 union all select 1 union all select 3 union all select 4 union all select 5 union all select 6 union all select 6 union all select 7 union all select 8 union all select 9) t,
(select 0 union all select 1 union all select 3 union all select 4 union all select 5 union all select 6 union all select 6 union all select 7 union all select 8 union all select 9) t2,
(select 0 union all select 1 union all select 3 union all select 4 union all select 5 union all select 6 union all select 6 union all select 7 union all select 8 union all select 9) t3,
(SELECT @rownum:=0) r
where date('".$data['meeting']->end_date."') - interval @rownum day > '".$data['meeting']->start_date."' order by check_in asc");
		$data['dates'] = $query->result_array();
		$this->template->build('report',$data);
	}

	function prints($id,$save=NULL)
	{
		$data['meeting'] = new Meeting($id);
		$query = $this->db->query("select @rownum:=@rownum+1,date('".$data['meeting']->end_date."') - interval @rownum day check_in from
(select 0 union all select 1 union all select 3 union all select 4 union all select 5 union all select 6 union all select 6 union all select 7 union all select 8 union all select 9) t,
(select 0 union all select 1 union all select 3 union all select 4 union all select 5 union all select 6 union all select 6 union all select 7 union all select 8 union all select 9) t2,
(select 0 union all select 1 union all select 3 union all select 4 union all select 5 union all select 6 union all select 6 union all select 7 union all select 8 union all select 9) t3,
(SELECT @rownum:=0) r
where date('".$data['meeting']->end_date."') - interval @rownum day > '".$data['meeting']->start_date."' order by check_in asc");
		$data['dates'] = $query->result_array();

		
	  $this->load->library('pdf');
 $this->pdf->setPrintHeader(false);  
 $this->pdf->setPrintFooter(false);  
      
        
        // set font
        $this->pdf->SetFont('freeserif', '', 9);
        
        // add a page
        $this->pdf->AddPage();
        
		$html = $this->load->view('test',$data,TRUE);
		
        // print a line using Cell()
		$this->pdf->writeHTML($html, true, false, true, false, '');

		$this->pdf->lastPage();
       
        ob_clean();
        //Close and output PDF document
		if($save)
		{
			$this->pdf->Output('report.pdf', 'D');
		}
		else
		{
			$this->pdf->Output('report.pdf', 'I'); 
		}    
	}
}
?>