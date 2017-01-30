<?php
class Informations extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['informations'] = new Information();
		if(@$_GET['search'])$data['informations']->where("title like '%".$_GET['search']."%'");
		if(@$_GET['status'])$data['informations']->where('status',$_GET['status']);
		if(@$_GET['category_id'])$data['informations']->where("category_id = ".$_GET['category_id']);
		auth_filter($data['informations'])->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/information_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['information'] = new Information($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/information_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$information = new Information($id);
			$_POST['title'] = lang_encode($_POST['title']);
			$_POST['intro'] = lang_encode($_POST['intro']);
			$_POST['detail'] = lang_encode($_POST['detail']);
			$_POST['start_date'] = Date2DB($_POST['start_date']);
			$_POST['end_date'] = Date2DB($_POST['end_date']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			if($_FILES['image']['name'])
			{
				if($id)$information->delete_file('uploads/information/thumbnail','image');
                $information->image = $information->upload($_FILES['image'],'uploads/information/thumbnail',238,150);
				//$information->image = $information->upload($_FILES['image'],'uploads/information/thumbnail',77,64);
			}
			$information->from_array($_POST);
			$information->save();
			
			//savelogs
			user_log($this->db->insert_id(),$_POST['title']); // content_id,content_title
			
			
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$information = new Information($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$information->approve_date = date("Y-m-d H:i:s");
			$information->from_array($_POST);
			$information->save();
			echo approve_comment($information);
		}

	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$information = new Information($id);
			
			//savelogs
			user_log($id,$information->title); // content_id,content_title
		
			$information->delete();
			
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function remove_image()
	{
		$user = new User($this->session->userdata('id'));
		$user->profile->delete_file($user->profile->id,'uploads/users/','avatar');
		$user->profile->avatar = NULL;
		$user->profile->save();
		set_notify('success', lang('remove_image_complete'));
		redirect('users/admin/profiles');	
	}
	
	function stick_thread($id)
	{
		$data = new Information($id);
		$data->stick = 1;
		$data->save();
		set_notify('success', 'ปักหมุดกระทู้เรียบร้อย');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function unstick_thread($id)
	{
		$data = new Information($id);
		$data->stick = null;
		$data->save();
		set_notify('success', 'ยกเลิกการปักหมุดกระทู้เรียบร้อย');
		redirect($_SERVER['HTTP_REFERER']);
	}

}
?>