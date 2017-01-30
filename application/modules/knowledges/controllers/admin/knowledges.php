<?php
class Knowledges extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['knowledges'] = new Knowledge();
		if(@$_GET['search'])$data['knowledges']->where("title like '%".$_GET['search']."%'");
		if(@$_GET['status'])$data['knowledges']->where('status',$_GET['status']);
		if(@$_GET['category_id'])$data['knowledges']->where("category_id = ".$_GET['category_id']);
		auth_filter($data['knowledges'])->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/knowledge_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['knowledge'] = new Knowledge($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/knowledge_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$knowledge = new Knowledge($id);
			$_POST['title'] = lang_encode($_POST['title']);
			$_POST['intro'] = lang_encode($_POST['intro']);
			$_POST['detail'] = lang_encode($_POST['detail']);
			$_POST['start_date'] = Date2DB($_POST['start_date']);
			$_POST['end_date'] = Date2DB($_POST['end_date']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			if($_FILES['image']['name'])
			{
				if($id)$knowledge->delete_file('uploads/knowledge/thumbnail','image');
				$knowledge->image = $knowledge->upload($_FILES['image'],'uploads/knowledge/thumbnail',77,64);
			}
			$knowledge->from_array($_POST);
			$knowledge->save();
			
			fix_file($_FILES['file']);
			foreach($_POST['doc'] as $key => $doc)
			{
				if((@$_FILES['file'][$key]['name'])||(@$_POST['doc_id'][$key]))
				{
					$knowledge_file = new Knowledge_file(@$_POST['doc_id'][$key]);
					if($_FILES['file'][$key]['name'])
					{
						if(@$_POST['doc_id'][$key])$knowledge_file->delete_file('uploads/knowledge','file');
						$knowledge_file->file = $knowledge_file->upload($_FILES['file'][$key],'uploads/knowledge');	
					}		
					$knowledge_file->name = $doc;
					$knowledge_file->knowledge_id = $knowledge->id;
					$knowledge_file->save();
				}
			}
						
			//savelogs
			user_log($this->db->insert_id(),$_POST['title']); // content_id,content_title
			
			set_notify('success', lang('save_data_complete'));
			redirect($_POST['referer']);
		}
		
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$knowledge = new Knowledge($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$knowledge->approve_date = date("Y-m-d H:i:s");
			$knowledge->from_array($_POST);
			$knowledge->save();
			echo approve_comment($knowledge);
		}
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$knowledge = new Knowledge($id);
			
			//savelogs
			user_log($id,$knowledge->title); // content_id,content_title
			
			$knowledge->delete();
			
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function download($id)
	{
		$knowledge = new Knowledge_file($id);
		$knowledge->counter();
		$this->load->helper('download');
		$data = file_get_contents("uploads/knowledge/".basename($knowledge->file));
		$name = basename($knowledge->file);
		force_download($name, $data); 
	}
	
	function document_delete($id)
	{
		$knowledge = new Knowledge_file($id);
		$knowledge->delete();
		set_notify('success', lang('delete_data_complete'));
		redirect($_SERVER['HTTP_REFERER']);
	}

}
?>