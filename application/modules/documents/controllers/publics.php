<?php
class Publics extends Document_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$document = new Document();
		if(@$_GET['search'])$document->like('title','%'.$_GET['search'].'%');
		$data['documents'] = $document->order_by('id','desc')->get_page();
		$this->template->build('document_public',$data);
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
	
	
}
?>