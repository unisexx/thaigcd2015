<?php
class Registers extends Public_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->template->build('register');
	}
	
	function ajax_amphur()
	{
		echo form_dropdown('amphur_id',get_option('id','amphur_name','amphures','where province_id = '.$_POST['id']),'','style="padding:5px;"','---เขต/อำเภอ---');
	}
	
	function ajax_district()
	{
		echo form_dropdown('district_id',get_option('id','district_name','districts','where amphur_id = '.$_POST['id']),'','style="padding:5px;"');
	}
	
	function save()
	{
		$data['register'] = new Register();
		$data['register']->from_array($_POST);
		$data['register']->save();
		
		if($_POST)
		{
			$this->load->library('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('system@thaigcd.ddc.moph.go.th','system@thaigcd.ddc.moph.go.th');
			//$email = 'nooampzi@hotmail.com,unisexx@hotmail.com';
			//$email = 'jakepong@hotmail.com,luksana_2708@hotmail.com,un_run@yahoo.com,wutsn@hotmail.com';
			$email = 'luksana_2708@hotmail.com,un_run@yahoo.com,wutsn@hotmail.com';
			$this->email->to($email);
			$this->email->subject('ใบสมัครศูนย์เด็กเล็กปลอดโรค - '.$data['register']->center);
			$this->email->message($this->load->view('view',$data,TRUE));
			$this->email->send();
			//echo $this->email->print_debugger();
			$this->email->to($_POST['email']);
			$this->email->subject('ยืนยันการสมัครศูนย์เด็กเล็กปลอดโรค - '.$data['register']->center);
			$this->email->message('ระบบได้รับข้อมูลการสมัครศูนย์เด็กเล็กปลอดโรคเรียบร้อยแล้วค่ะ');
			$this->email->send();
			//echo $this->email->print_debugger();
		}
	
		set_notify('success','ระบบได้ทำการบันทึกข้อมูลเรียบร้อยแล้วค่ะ');
		redirect('registers/success');
	}
	
	function success()
	{
		$this->template->build('success');
	}
	
}
?>