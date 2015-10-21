<?php
class Nurseries extends Public_Controller
{
	function __construct()
	{
		if(login_data('nursery') == ""){
			redirect('home');
		}
		parent::__construct();
	}
	
	function index()
	{
		$this->template->build('child',$data);
	}
	
	function form_import(){
		$this->template->build('import');
	}
	
	function doimport(){
		$file_name = $_GET['province_id'].".xls";
		if($file_name!=''){
			//$ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
			//echo $file_name = 'nursery.'.$ext;
						
			$uploaddir = 'import/tmp/';
			$fpicname = $uploaddir.$file_name;
			///move_uploaded_file($_FILES['filename']['tmp_name'], $fpicname);		

		require_once 'include/Excel/reader.php';
		$data = new Spreadsheet_Excel_Reader();
		$data -> setOutputEncoding('UTF-8');
		$data -> read($fpicname);	
		error_reporting(E_ALL ^ E_NOTICE);
		$index = 0;
		
		for($i = 2; $i <= $data -> sheets[0]['numRows']; $i++) {					
			$amphur = new Amphur();
			$amphur = $amphur->where(" amphur_name ='".trim($data -> sheets[0]['cells'][$i][1])."'")->get();
			$import[$index]['province_id'] =$_POST['province_id'];
			$import[$index]['amphur_id'] = $amphur->id;
			$import[$index]['name'] = trim($data -> sheets[0]['cells'][$i][2]);			
			$index++;
			
			if($amphur->id > 0){
				$_POST['province_id'] = $_GET['province_id'];
				$_POST['amphur_id'] = $amphur->id;
				$_POST['name'] = trim($data -> sheets[0]['cells'][$i][2]);
				$nursery = new Nursery_Tmp();
				$nursery->from_array($_POST);
				$nursery->save();
			}
		}
		}
	}

	function register(){
		$data['user'] = new User($this->session->userdata('id'));
		$data['nurseries'] = new Nursery();
		if(@$_GET['name'])$data['nurseries']->where("name like '%".$_GET['name']."%'");
		if(@$_GET['province_id'])$data['nurseries']->where('province_id',$_GET['province_id']);
		if(@$_GET['amphur_id'])$data['nurseries']->where("amphur_id = ".$_GET['amphur_id']);
		if(@$_GET['district_id'])$data['nurseries']->where("district_id = ".$_GET['district_id']);
		if(@$_GET['year'])$data['nurseries']->where("year = ".$_GET['year']);
		
		if($data['user']->nursery==0){
			$data['nurseries']->order_by('id','desc')->get_page();
		}else{
			$data['nurseries']->where('area_id = '.$data['user']->nursery)->order_by('id','desc')->get_page();
		}
		$this->template->build('child_register',$data);
	}
	
	function register_form($id=false){
		$data['user'] = new User($this->session->userdata('id'));
		$data['nursery'] = new Nursery($id);
		$this->template->build('child_register_form',$data);
	}
	
	function register_save($id=false){
		if($_POST){
			
			if($id == ""){
				$nuchk = new Nursery();
				$nuchk = $nuchk->where('year = '.$_POST['year'].' and name = "'.$_POST['name'].'" and district_id = '.$_POST['district_id'])->get()->result_count();
				if($nuchk > 0){
					set_notify('error', 'ชื่อศูนย์เด็กเล็กนี้มีแล้วค่ะ');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
			
			$_POST['user_id'] = $this->session->userdata('id');
			//$_POST['area_id'] = login_data('nursery');
			$nursery = new Nursery($id);
			$nursery->from_array($_POST);
			$nursery->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
			redirect('nurseries/register');
		}
	}
	
	function delete($id=false){
		if($id){
			$nursery = new Nursery($id);
			$nursery->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('nurseries/register');
	}
	
	function estimate(){
		$data['user'] = new User($this->session->userdata('id'));
		$data['nurseries'] = new Nursery();
		if(@$_GET['name'])$data['nurseries']->where("name like '%".$_GET['name']."%'");
		if(@$_GET['province_id'])$data['nurseries']->where('province_id',$_GET['province_id']);
		if(@$_GET['amphur_id'])$data['nurseries']->where("amphur_id = ".$_GET['amphur_id']);
		if(@$_GET['district_id'])$data['nurseries']->where("district_id = ".$_GET['district_id']);
		if(@$_GET['year'])$data['nurseries']->where("year = ".$_GET['year']);
		
		if($data['user']->nursery==0){
			$data['nurseries']->order_by('id','desc')->get_page();
		}else{
			$data['nurseries']->where('area_id = '.$data['user']->nursery)->order_by('id','desc')->get_page();
		}
		$this->template->build('child_estimate',$data);
	}
	
	function save_status(){
		if($_POST){
			$nursery = new Nursery($id);
			$nursery->from_array($_POST);
			$nursery->save();
		}
	}
	
	function get_amphur(){
		if($_POST){
			echo form_dropdown('amphur_id',get_option('id','amphur_name','amphures','where province_id = '.$_POST['province_id'].' order by id asc'),'','','--- เลือกอำเภอ ---');
		}
	}
	
	function get_district(){
		if($_POST){
			echo form_dropdown('district_id',get_option('id','district_name','districts','where amphur_id = '.$_POST['amphur_id'].' order by id asc'),'','','--- เลือกตำบล ---');
		}
	}
	
	function report(){ // เข้าร่วมโครงการ - ผ่านเกณ
		$this->template->build('report');
	}
	
	function report2(){ // จำนวนในพื้นที่ - เข้าร่วมโครงการ
		$this->template->build('report2');
	}

	function area_report($id=false){
		$data['provinces'] = new Province();
		$data['provinces']->where('nursery = '.$id)->get();
		$data['province_count'] = $data['provinces']->where('nursery = '.$id)->get()->result_count();
		$data['area_id'] = $id;
		$this->template->build('area_report',$data);
	}
	
	function province_report($id=false){
		$data['province'] = new Province($id);
		$data['amphurs'] = new Amphur();
		$data['amphurs']->where('province_id = '.$id)->get();
		$this->template->build('province_report',$data);
	}
	
	function amphur_report($id=false){
		$data['amphur'] = new Amphur($id);
		$data['districts'] = new District();
		$data['districts']->where('amphur_id = ',$id)->get();
		$this->template->build('amphur_report',$data);
	}

	function category_form($id=false){
		$data['category'] = new Nursery_category($id);
		
		$data['categories'] = new Nursery_category();
		$data['categories']->order_by('id','desc')->get();
		$this->template->build('category_form',$data);
	}
	
	function category_save($id=false){
		if($_POST){
			$category = new Nursery_category($id);
			$_POST['user_id'] = $this->session->userdata('id');
			$category->from_array($_POST);
			$category->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('nurseries/category_form');
	}
	
	function category_delete($id=false){
		if($id){
			$nursery = new Nursery_category($id);
			$nursery->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('nurseries/category_form');
	}
	
	function check_name()
	{
		$nursery = new Nursery();
		$nursery->get_by_name($_GET['name']);
		echo ($nursery->name)?"false":"true";
	}
}
?>