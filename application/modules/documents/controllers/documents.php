<?php
class Documents extends Document_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!is_login()) 
		{
			set_notify('error','คุณไม่มีสิทธิเข้าใช้งานในส่วนนี้ค่ะ');
			redirect('home');
		}
		else
		{
			if(!is_publish('documents'))
			{
				set_notify('error','คุณไม่มีสิทธิเข้าใช้งานในส่วนนี้ค่ะ');
				redirect('home');
			}
		}
	}
	
	function index(){
		$document = new Document();
		if(@$_GET['search'])$document->like('title','%'.$_GET['search'].'%');
		$data['documents'] = auth_filter($document)->order_by('id','desc')->get_page();
		$this->template->build('document_index',$data);
	}
	
	
	
	function form($id=FALSE){
		$data['document'] = new Document($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('document_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$document = new Document($id);
			$_POST['user_id'] = $this->session->userdata('id');
			$_POST['start_date'] = Date2DB($_POST['start_date']);
			$document->from_array($_POST);
			$document->save();
			
			fix_file($_FILES['file']);
			foreach($_POST['doc'] as $key => $doc)
			{
				if((@$_FILES['file'][$key]['name'])||(@$_POST['doc_id'][$key]))
				{
					$document_file = new Document_file(@$_POST['doc_id'][$key]);
					if($_FILES['file'][$key]['name'])
					{
						if(@$_POST['doc_id'][$key])$document_file->delete_file('uploads/document','file');
						$document_file->file = $document_file->upload($_FILES['file'][$key],'uploads/document');	
					}		
					$document_file->name = $doc;
					$document_file->document_id = $document->id;
					$document_file->save();
				}
			}
			set_notify('success', lang('save_data_complete'));
		}
		redirect('documents');
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$document = new Document($id);
			$document->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('documents');
	}
	
	function download($id)
	{
		$document = new Document_file($id);
		$document->counter();
		$this->load->helper('download');
		$data = file_get_contents("uploads/document/".basename($document->file));
		$name = basename($document->file);
		force_download($name, $data); 
	}
	
	function document_delete($id)
	{
		$document = new Document_file($id);
		$document->delete();
		set_notify('success', lang('delete_data_complete'));
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}
?>