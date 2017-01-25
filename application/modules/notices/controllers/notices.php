<?php
class Notices extends Public_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['type'] = array('7'=>'ico_notify_03.png','8'=>'ico_notify_06.png','9'=>'ico_notify_08.png','193'=>'ico_notify_10.png');
		$data['notices'] = new Notice();
		(@$_GET['titlesearch'])?$data['notices']->like('title',$_GET['titlesearch']):'';
		(@$_GET['type'])?$data['notices']->where('category_id',$_GET['type']):'';
		lang_filter($data['notices'])->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'")->order_by('start_date','desc')->get_page(limit()); 
		$this->template->build('notice_index',$data);
	}
	
	function view($id)
	{
		$data['notice'] = new Notice($id);
		if($_POST)
		{
			$data['notice_comment'] = new Notice_comment;
			$_POST['notice_id'] = $id;
			$data['notice_comment']->from_array($_POST);
			$data['notice_comment']->save();
			$this->load->library('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('system@thaigcd.ddc.moph.go.th','system@thaigcd.ddc.moph.go.th');
			
			$email = 'jakepong@hotmail.com';
			//$email = 'nooampzi@hotmail.com';
			$this->email->to($email);
			$this->email->subject('เสนอแนะวิจารณ์ - '.lang_decode($data['notice']->title));
			$this->email->message($this->load->view('view',$data,TRUE));
			$this->email->send();
			
			set_notify('success','บันทึกข้อเสนอแนะของคุณเรียบร้อยแล้วค่่ะ');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['type'] = array('7'=>'ico_notify_03.png','8'=>'ico_notify_06.png','9'=>'ico_notify_08.png','193'=>'ico_notify_10.png');
		$this->template->set_layout('layout_blank');
		$this->template->build('notice_view',$data);
	}
	
	function inc_home($id = FALSE)
	{
		if($id)
		{
			$data['notices'] = new Notice();
			lang_filter($data['notices'])->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and notices.status = 'approve'")->order_by('start_date','desc')->where('group_id',$id)->limit(5)->get(); 
			$this->load->view('inc_group',$data);
		}
		else
		{
			$data['notices'] = new Notice();
			lang_filter($data['notices'])->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'")->order_by('start_date','desc')->limit(5)->get(); 
			$this->load->view('inc_index',$data);
		}
		
	}
	
	function test($id)
	{
		$notice = new Notice($id);
		echo $notice->notice_comment->id;
	}
	
	function index_type()
	{
		$data['notices'] = new Notice();

		$data['type'] = array('7'=>'ico_notify_03.png','8'=>'ico_notify_06.png','9'=>'ico_notify_08.png','193'=>'ico_notify_10.png');
		
		//$data['notices']->where("file_name1 <> '' and status = 'approve'")->order_by('id','desc')->get_page();
		
		$where = '';
	
		if(@$_GET['search'])$where .= " and title like '%".$_GET['search']."%'";
		
		$data['notices']->where("file_name1 <> '' and status = 'approve'".$where)->order_by('id','desc')->get_page();
		
		$this->template->build('index_type',$data);
	}
	
	function view_type($id)
	{
		$data['notice'] = new Notice($id);

		$data['type'] = array('7'=>'ico_notify_03.png','8'=>'ico_notify_06.png','9'=>'ico_notify_08.png','193'=>'ico_notify_10.png');
		
		$this->template->build('view_type',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$data['notice_comment'] = new Notice_comment;
			$_POST['notice_id'] = $id;
			$data['notice_comment']->from_array($_POST);
			$data['notice_comment']->save();
			
/*			$this->load->library('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('system@thaigcd.ddc.moph.go.th','system@thaigcd.ddc.moph.go.th');
			
			$email = 'jakepong@hotmail.com';
			$this->email->to($email);
			$this->email->subject('เสนอแนะวิจารณ์ - '.lang_decode($data['notice']->title));
			$this->email->message($this->load->view('view',$data,TRUE));
			$this->email->send();*/
			
			set_notify('success','บันทึกข้อเสนอแนะของคุณเรียบร้อยแล้วค่่ะ');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}
?>