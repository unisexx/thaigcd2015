<?php
class Newsletters extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index(){
		$data['newsletters'] = new Newsletter();
		if(@$_POST['search'])$data['newsletters']->where("title like '%".$_POST['search']."%'");
		if(@$_POST['category_id'])$data['newsletters']->where("category_id = ".$_POST['category_id']);
		$data['newsletters']->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/newsletter_index',$data);
	}
	
	function form($id=FALSE){
		$data['newsletters'] = new Newsletter($id);
		$this->template->build('admin/newsletter_form',$data);
	}
	
	function save($id=FALSE){
		$this->load->library('email');
		if($_POST)
		{
			$newsletter = new Newsletter($id);
			$_POST['user_id'] = $this->session->userdata('id');
			$newsletter->from_array($_POST);
			$newsletter->save();
			
			$users = new User();
			$users->where("newsletter like '%".$newsletter->category_id."%'")->get();
			foreach($users as $user)$email[] = $user->email;
		
			$config['mailtype'] = 'html';
			$this->email->initialize($config);

			$this->email->from('ratasak_p@hotmail.com', 'สำนักโรคติดต่อทั่วไป');
			
			$this->email->to($email);
			
			$this->email->subject($newsletter->title);
			$this->email->message($newsletter->detail);
			if($_FILES['attachment']['name'])
			{
				$_POST['attachment'] = $newsletter->upload($_FILES['attachment'],'uploads/newsletter_attachment/');
				$this->email->attach('uploads/newsletter_attachment/'.$_POST['attachment']);
			}
			$this->email->send();
			//echo $this->email->print_debugger();
			
			set_notify('success', lang('save_data_complete'));
		}
		redirect('newsletters/admin/newsletters');
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$newsletter = new Newsletter($id);
			$newsletter->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('newsletters/admin/newsletters');
	}
	
	function send($id){
		$this->load->library('email');
		$this->email->from('your@example.com', 'Your Name');
		$this->email->to('someone@example.com');
		$this->email->cc('another@another-example.com');
		$this->email->bcc('them@their-example.com');
		
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');
		
		$this->email->send();
		
		echo $this->email->print_debugger();
	}

}
?>