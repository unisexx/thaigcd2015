<?php
class Executives extends Public_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index($id = FALSE)
	{
		if($id)
		{
			$data['user'] = new User($id);
			$data['user']->executive->where("start_date <= date(sysdate()) and end_date >= date(sysdate()) and status = 'approve'")->order_by('id','desc')->get_page(limit());
			$this->template->build('index_id',$data);
		}
		else
		{
			$users = new User();
			$data['users'] = $users->where("level_id = 6")->get_page();
			$this->template->build('index',$data);
		}
	}
	
	function view($id)
	{
		$data['executive'] = new Executive($id);
		$this->template->build('view',$data);
	}
	
	function inc_home()
	{
		$executives = new Executive();
		lang_filter($executives->where("start_date <= date(sysdate()) and end_date >= date(sysdate()) and status = 'approve'"));
		$data['executives'] = $executives->get();
		$this->load->view('inc_home',$data);
	}
	
	function contact($id = FALSE)
	{
		$data['user'] = new User($id);
		$this->template->set_layout('blank');
		$this->template->build('contact',$data);
	}
	
	function send($id = FALSE){
		if($_POST){
			if($_FILES['attach']['name'])
			{
				$executives = new Executive();
				$_POST['attach'] = $executives->upload($_FILES['attach'],'uploads/attachment/');
			}
			$this->load->library('email');
			$this->email->from($_POST["email"], $_POST["name"]);
			$this->email->to('drrungrueng@hotmail.com');
			$this->email->subject($_POST["title"]);
			$this->email->message($_POST["detail"]);
			$this->email->attach('uploads/attachment/'.$_POST['attach']);
			//$this->email->attach('uploads/images/'.$_POST['attach']);
			
			$this->email->send();
			//echo $this->email->print_debugger();
			
			set_notify('success', 'ส่งข้อความเรียบร้อย');
			echo '<script type="text/javascript">
					parent.location = unescape(parent.location.pathname);
					</script>
			';
			
			//$this->load->view('sendmail');
		}
	}

}
?>