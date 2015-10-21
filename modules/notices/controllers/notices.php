<?php
class Notices extends Public_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['type'] = array('7'=>'ico_notify_03.png','8'=>'ico_notify_06.png','9'=>'ico_notify_08.png');
		$data['notices'] = new Notice();
		(@$_POST['titlesearch'])?$data['notices']->like('title',$_POST['titlesearch']):'';
		(@$_POST['type'])?$data['notices']->where('category_id',$_POST['type']):'';
		lang_filter($data['notices'])->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'")->order_by('id','desc')->get_page(limit()); 
		$this->template->build('notice_index',$data);
	}
	
	function view($id)
	{
		$data['type'] = array('7'=>'ico_notify_03.png','8'=>'ico_notify_06.png','9'=>'ico_notify_08.png');
		$data['notice'] = new Notice($id);
		$this->template->set_layout('layout_blank');
		$this->template->build('notice_view',$data);
	}
	
	function inc_home($id = FALSE)
	{
		if($id)
		{
			$data['notices'] = new Notice();
			lang_filter($data['notices'])->order_by('id','desc')->where_related_user('group_id',$id)->limit(10)->get(); 
			$this->load->view('inc_group',$data);
		}
		else
		{
			$data['notices'] = new Notice();
			lang_filter($data['notices'])->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'")->order_by('id','desc')->limit(5)->get(); 
			$this->load->view('inc_index',$data);
		}
		
	}
}
?>