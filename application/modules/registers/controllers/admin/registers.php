<?php
class Registers extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['registers'] = new Register();
		$where = 'where 1 = 1 ';
		if(@$_GET['center'])$where.=' and center like \'%'.$_GET['center'].'%\' ';
		if(@$_GET['name'])$where.=' and name like \'%'.$_GET['name'].'%\' ';
		if(@$_GET['position'])$where.=' and position like \'%'.$_GET['position'].'%\' ';
		if(@$_GET['email'])$where.=' and center like \'%'.$_GET['email'].'%\' ';
		if((@$_GET['from'])&&(@$_GET['to']))$where.=" and date(created) >= date('".Date2DB($_GET['from'])."') and date(created) <=  date('".Date2DB($_GET['to'])."')";

		$data['registers']->sql('select * from registers '.$where.' group by center,province_id order by id desc')->get_page();
		
		/*if(@$_GET['center'])$data['registers']->like('center','%'.$_GET['center'].'%');
		if(@$_GET['name'])$data['registers']->like('name','%'.$_GET['name'].'%');
		if(@$_GET['position'])$data['registers']->like('position','%'.$_GET['position'].'%');
		if(@$_GET['email'])$data['registers']->like('email','%'.$_GET['email'].'%');
		if((@$_GET['from'])&&(@$_GET['to']))$data['registers']->where("date(created) >= date('".Date2DB($_GET['from'])."') and date(created) <=  date('".Date2DB($_GET['to'])."')");
		$data['registers']->group_by('center,province_id')->order_by('id desc')->get_page();*/
		//$data['registers']->check_last_query();
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/index',$data);
	}
	
	function form($id)
	{
		$data['register'] = new Register($id);
		$this->template->build('admin/view',$data);
	}
	
	function delete($id)
	{
		if($id)
		{
			$register = new Register($id);
			
			//savelogs
			user_log($id,$register->center); // content_id,content_title
			
			$register->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}
?>