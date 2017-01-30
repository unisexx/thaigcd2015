<?php

class Levels extends Admin_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		$levels = new Level();
		$data['levels'] = $levels->order_by('id','asc')->get_page();
		$this->template->build('admin/level_index',$data);
	}
	
	function form($id = FALSE)
	{
		$data['level'] = new Level($id);
		$data['level']->auth = json_decode($data['level']->auth);
		$modules = new Module();
		$data['modules'] = $modules->get();
		$this->template->append_metadata(js_checkbox());
		$this->template->build('admin/level_form',$data);
	}
	
	
	function save($id = FALSE)
	{
		if($_POST)
		{
			$level = new level($id);
			$level->level = $_POST['level'];
			$level->is_admin = (isset($_POST['is_admin']))?1:0;
			$level->approve = (isset($_POST['approve']))?1:0;
			$level->view = (isset($_POST['view']))?$_POST['view']:0;
			$level->auth = json_encode($_POST['module']);
			$level->save();
			
			//savelogs
			user_log($id,$_POST['level']); // content_id,content_title
			
			set_notify('success','บันทึกข้อมูลเรียบร้อยแล้วค่ะ');
			redirect('users/admin/levels');
		}
	}
	
	function delete($id = FALSE)
	{
		if($id)
		{
			$level = new Level($id);
			
			//savelogs
			user_log($id,$level->level); // content_id,content_title
			
			$level->delete();
			set_notify('success','ลบข้อมูลเรียบร้อยแล้วค่ะ');
			redirect('users/admin/levels');
		}
	}
}

?>