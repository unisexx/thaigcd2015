<?php
class Informations extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index($id=FALSE)
	{
		$this->template->set_layout('layout_blank');
		if($id)
		{
			$data['category'] = new Category($id);
			lang_filter($data['category']->information->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'"))->order_by('id','desc')->get_page(limit());
			$this->template->build('information_index_id',$data);
		}
		else
		{
			$data['categories'] = new Category();
			$data['categories']->where("module = 'informations' and parents <> 0")->order_by('id','asc')->get(); 
			$this->template->build('information_index',$data);
		}
	}
	
	function view($id,$group = FALSE)
	{
		$data['information'] = new Information($id);
		$data['information']->counter();
		$data['information']->rating = round($data['information']->rating/$data['information']->rating_count, 0);
		if($data['information']->pdf)
		{
			redirect("uploads/pdf/".basename($data['information']->pdf));
		}
		else
		{
			if($group)
			{
				$data['group'] = new Group($data['information']->user->group_id);
				$this->template->set_layout('group_layout');
			}
			$this->template->build('information_view',$data);
		}
	}
	function group($id)
	{
		$data['informations'] = new Information();
		lang_filter($data['informations']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'"));
		$data['informations']->order_by('id','desc')->where_related_user('group_id',$id)->get_page(10);
		$data['group'] = new Group($id);
		$this->template->set_layout('group_layout');
		$this->template->build('information_group',$data);
	}
	
	function tag($tag)
	{
		$data['tag'] = $tag;
		$data['informations'] = new Information();
		lang_filter($data['informations']->where("tag like '%$tag%'"))->get_page(limit());
		$this->template->build('information_tag',$data);
	}
	
	function inc_home($id = FALSE)
	{
		$data['where'] = ($this->session->userdata('lang')=="en")?'and title NOT REGEXP \'"en":""}$\'':'';
		
		
		if($id)
		{
			$data['informations'] = new information();
			$data['informations']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'");
			$data['informations']->order_by('id','desc')->where_related_user('group_id',$id)->limit(5)->get(); 
			$this->load->view('inc_group',$data);
		}
		else
		{
			$data['categories'] = new Category();
			$data['categories']->where("module = 'informations' and parents <> 0")->order_by('id','asc')->get(); 
			$this->load->view('inc_index',$data);
		}
	}
	
	function comment($id)
	{
		if($_POST['captcha']==$this->session->userdata('captcha'))
		{
			if($this->session->userdata('id'))
			{
				$_POST['user_id'] = $this->session->userdata('id');
			}
			$_POST['information_id'] = $id;
			$comment = new information_comment();
			$comment->from_array($_POST);
			$comment->save();
			set_notify('success','บันทึกข้อมูลเรียบร้อยค่ะ');
			redirect($_SERVER['HTTP_REFERER'].'#comment'.$comment->id);
		}
		else
		{
			set_notify('error','กรุณากรอกตัวเลขให้ตรงกับภาพค่ะ');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	function vote($id)
	{
		if($_POST)
		{
			$information = new Information($id);
			$information->rating = $information->rating + $_POST['rating'];
			$information->rating_count = $information->rating_count + 1;
			$information->save();
			set_notify('success','บันทึกข้อมูลเรียบร้อยค่ะ');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>