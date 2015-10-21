<?php
	
	Class Faqs extends Public_Controller
	{
		function __construct()
		{
			parent::__construct();
			//$this->template->set_layout('layout_blank');
		}	
		
		function index()
		{
			$data['categories'] = new Category();
			$data['categories']->where("module = 'faqs' and parents <> 0")->get_page();
			
			$data['faqs'] = new Faq();
			
			$this->template->build('faqs_index',$data);
		}
		
		function search()
		{
			$data['faqs'] = new faq();
			(@$_POST['textsearch'])?$data['faqs']->like('question',$_POST['textsearch']):'';
			$data['faqs']->where("status = 'approve'")->order_by("orderlist", "asc")->get_page();
			
			$this->template->build('faqs_search',$data);
		}
		
		function tell_a_friend($id)
		{
			$data['faqs'] = new faq($id);
			$this->template->set_layout('blank');
			$this->template->build('faqs_tell_a_friend_form',$data);
		}
		
		function print_question($id){
			$data['faqs'] = new faq($id);
			$this->template->set_layout('blank');
			$this->load->view('print_question',$data);
		}
		
		function sendmail($id){
			$data['faqs'] = new faq($id);
			/*$this->load->library('email');

			$this->email->from($_POST["formemail"], $_POST["from"]);
			$this->email->to($_POST["to"]);
			$this->email->cc('another@another-example.com');
			$this->email->bcc('them@their-example.com');
			
			$this->email->subject($_POST["subject"]);
			$this->email->message('เพื่อนของคุณได้ส่งคำถามที่น่าสนใจตามลิ้งดังกล่าว\n http://localhost/gcdnew/faqs/share/<?php echo $faqs->id?>');
			
			$this->email->send();
			echo $this->email->print_debugger();*/
			
			$this->load->view('faqs_tell_a_friend_send',$data);
		}
		
		function share($id)
		{
			$data['faqs'] = new faq($id);
			$this->template->build('faq_share',$data);
		}
		
		function counter($id)
		{
			$data['faqs'] = new faq($id);
			$data['faqs']->counter();
		}
		
	}
	
?>