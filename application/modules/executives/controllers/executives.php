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
			$data['user']->executive->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'")->order_by('id','desc')->get_page(limit());
			$this->template->build('index_id',$data);
		}
		else
		{
			$users = new User();
			$data['users'] = $users->where("level_id = 6")->order_by('id','desc')->get(1);
			
			$data['executive_infos'] = new Executive_info();
			$data['executive_infos']->order_by('id','desc')->get(5);
			
			$data['executive_its'] = new Executive_it();
			$data['executive_its']->order_by('id','desc')->get(5);
			
			$executives = new Executive();
		lang_filter($executives->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'"));
			$data['executives'] = $executives->order_by('id','desc')->get(5);
		
			$data['videos'] = new Executive_video();
			$data['videos']->order_by('id','desc')->get(5);
			$this->template->build('index',$data);
		}
	}
	
	function view($id=false)
	{
		$data['executive'] = new Executive($id);
		
		$executives = new Executive();
		lang_filter($executives->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'"));
		$data['executives'] = $executives->order_by('id','desc')->get();
		
		$this->template->build('view',$data);
	}
	
	function inc_home()
	{
		$executives = new Executive();
		lang_filter($executives->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'"));
		$data['executives'] = $executives->order_by('id','desc')->get(1);
		
		$user = new User();
		$data['user'] = $user->where("level_id = 6")->order_by('id','desc')->get(1);
			
		$this->load->view('inc_home',$data);
	}
	
	function contact($id = FALSE)
	{
		$data['user'] = new User($id);
		$this->template->set_layout('blank');
		$this->template->build('contact',$data);
	}
	
	function send($id = FALSE)
	{
		if($_POST)
		{
			$this->load->library('email');
			$this->email->from($_POST["email"], $_POST["name"]);
			$user = new User($id);
			$this->email->to($user->email);
			//$this->email->to('unisexx@hotmail.com'); 
			$this->email->bcc('unisexx@hotmail.com');
			$this->email->subject($_POST["title"]);
			$this->email->message($_POST["detail"]);
			if($_FILES['attach']['name'])
			{
				$executives = new Executive();
				$_POST['attach'] = $executives->upload($_FILES['attach'],'uploads/attachment/');
				$this->email->attach('uploads/attachment/'.$_POST['attach']);
			}
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
	
	
	function info_view($id)
	{
		$data['executive'] = new Executive_info($id);
		
		$data['executives'] = new Executive_info();
		$data['executives']->order_by('id','desc')->get();
		$this->template->build('info_view',$data);
	}
	
	function more(){
		$executives = new Executive();
		lang_filter($executives->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'"));
		$data['executives'] = $executives->order_by('id','desc')->get();
		
		$data['infos'] = new Executive_info();
		$data['infos']->order_by('id','desc')->get();
		
		$data['its'] = new Executive_it();
		$data['its']->order_by('id','desc')->get();
		
		$this->template->build('more',$data);
	}
	
	function exe_more(){
		$executives = new Executive();
		lang_filter($executives->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'"));
		$data['executives'] = $executives->order_by('id','desc')->get();
		
		$this->template->build('exe_more',$data);
	}
	
	function it_more(){
		$data['its'] = new Executive_it();
		$data['its']->order_by('id','desc')->get();
		
		$this->template->build('it_more',$data);
	}
	
	function it_view($id=false)
	{
		$data['executive'] = new Executive_it($id);
		
		$data['executives'] = new Executive_it();
		$data['executives']->order_by('id','desc')->get();
		$this->template->build('it_view',$data);
	}
	
	function history($id){
		$data['user'] = new User($id);
		$this->template->build('history',$data);
	}
	
	function video_view($id){
		$data['video'] = new Executive_video($id);
		
		$data['videos'] = new Executive_video($id);
		$data['videos']->order_by('id','desc')->get();
		$this->template->build('video_view',$data);
	}
	
	function inc_home_video(){
		$data['video'] = new Executive_video();
		$data['video']->order_by('id','desc')->get(1);
		$this->load->view('inc_home_video',$data);
	}
}
?>