<?php
class Private_calendars extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!is_login())
		{
			set_notify('error','กรุณาเข้าสู่ระบบก่อนเข้าใช้งานในส่วนนี้ค่ะ');
			redirect('home');
		}
	}
	
	function index()
	{
		//$this->template->set_theme('admin');
		//$this->template->set_layout('layout');
		$this->template->build('index');
	}
	
	function events_move()
	{
		//$this->db->debug = TRUE;
		$calendar = New Private_calendar($_POST['id']);
		if($_POST['start'])
		{
			list($y,$m,$d) = explode('-', $calendar->start);
			$_POST['start'] =  date("Y-m-d", mktime(0, 0, 0, $m, $d + $_POST['start'], $y));
		}
		if($_POST['end'])
		{
			list($y,$m,$d) = explode('-', $calendar->end);
			$_POST['end'] =  date("Y-m-d", mktime(0, 0, 0, $m, $d + $_POST['end'], $y));
		}
		$calendar->from_array($_POST);
		$calendar->save();
	}
	
	function events()
	{
		$calendar = New Private_calendar();
		$events = $calendar->where('user_id',$this->session->userdata('id'))->get()->all_to_array();
		//$calendar->check_last_query();
		echo json_encode($events);
	}	
	
	function form($id = FALSE)
	{
		$data['calendar'] = New Private_calendar($id);
		//$this->template->append_metadata(js_datepicker());
		$this->template->build('form',$data);
	}
	
	function save($id=NULL)
	{
		if($_POST)
		{
			$calendar = New Private_calendar($id);
			$_POST['user_id'] = $this->session->userdata('id');
			$_POST['start'] = Date2DB($_POST['start']);
			$_POST['end'] = ($_POST['end']) ? Date2DB($_POST['end']) : $_POST['start'];
			$calendar->from_array($_POST);
			$calendar->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('private_calendars');
	}
	
	function delete($id)
	{
		if($id)
		{
			$calendar = New Private_calendar($id);
			$calendar->delete();
			set_notify('success', lang('delete_data_complete'));
		} 
		redirect('private_calendars');		
	}
}
?>