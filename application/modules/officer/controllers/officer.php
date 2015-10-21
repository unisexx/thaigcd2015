<?php
class Officer extends Meeting_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['users'] = new User;
		if(@$_GET['first_name'])$data['users']->like_related_profile('first_name','%'.$_GET['first_name'].'%');
		if(@$_GET['last_name'])$data['users']->like_related_profile('last_name','%'.$_GET['last_name'].'%');		
		$data['users']->where_in('level_id',array(7,4));
		$data['users']->order_by('id','desc')->get_page(10);
		$this->template->build('index',$data);
	}
	
	function form($id=NULL)
	{
		$data['user']= new User($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('form',$data);
	}
	
	function save($id)
	{
		if($_POST)
		{
			$user = new User($id);
			$user->from_array($_POST);
			$user->save();
			$user->profile->from_array($_POST);
			$user->profile->user_id = $user->id;
			$user->profile->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('officer');
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$user = new User($id);
			$user->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('officer');
	}
	
	function roommate($meeting_id = NULL)
	{
		$data['users'] = new User;
		if(@$_GET['first_name'])$data['users']->like_related_profile('first_name','%'.$_GET['first_name'].'%');
		if(@$_GET['last_name'])$data['users']->like_related_profile('last_name','%'.$_GET['last_name'].'%');		
		$data['users']->where_in('level_id',array(1,2,3,7,4));
		if($meeting_id)
		{
			$sub = new Question;
			$sub->select('r_id')->where('meeting_id', $meeting_id)->where('r_id <>',0);
			$sub2 = new Question;
			$sub2->select('user_id')->where('meeting_id', $meeting_id)->where('user_id <>',0);
			$data['users']->where_not_in_subquery('id', $sub);
			$data['users']->where_not_in_subquery('id', $sub2);
		}
		$data['users']->where('id <>',$this->session->userdata('id'));
		$data['users']->order_by('id','desc')->get_page(10);
		$this->template->set_layout('blank');
		$this->template->build('roommate',$data);
	}
	

}
?>