<?php

class Home extends Public_Controller {

	function __construct()
	{
		parent::__construct();
			
	}
	
	function first_page()
	{
		$coverpage = new Coverpage();
		$coverpage->where("status = 'approve' and active = 1")->get();
		if($coverpage->id != ""){
			redirect("coverpages/index/".$coverpage->id);
		}else{
			redirect("home/index");
		}
	}
	
	function index()
	{
		$this->template->set_layout('home');
		$this->template->build('index');
	}
	
	public function lang($lang)
	{
		$this->load->library('user_agent');
		$this->session->set_userdata('lang',$lang);
		redirect($this->agent->referrer());
	}
	
	public function sitemap()
	{
		$data['categories'] = new Category();
		$data['childs'] = new Category();
		$data['categories']->where("parents = 0 and id not in (74)")->get();
		$data['num'] = ceil($data['categories']->where("parents = 0 and id not in (74)")->count()/2);
		$this->template->build('sitemap',$data);
	}
	
	function testmail()
	{
		$this->load->library('email');
		$this->email->from('ampzimeow@gmail.com', 'เคน ธีรเดช วงสืบพันธุ์');
		$this->email->to('unisexx@hotmail.com');
		$this->email->subject('นี่คือสแปม');
		$this->email->message('555+');
		$this->email->send();
		echo $this->email->print_debugger();
	}
	
	function search()
	{
		$this->template->build('search');
	}
	
	function popup()
	{
		$popup = new Popup();	
		$data['counter']=$popup->get_by_id('1');		
		$this->load->view('inc_popup',$data);
	}
	
	function cntPopup()
	{			
		$popup = new Popup();	
		$popup->counter('1');
		$data=$popup->get_by_id('1');					
		echo $data->counter;
	}
}

?>