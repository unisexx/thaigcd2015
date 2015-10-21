<?php
class Articles extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index($category_id=FALSE)
	{
		$articles = new Article();
		if($category_id)
		{
			$category = new Category($category_id);
			$articles->where("category_id in (select id from categories where lft >= ".$category->lft." and rgt <= ".$category->rgt." and module = '".$category->module."')");
		}
		$data['articles'] = $articles->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/article_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['article'] = new Article($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/article_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$article = new Article($id);
			$_POST['title'] = lang_merge($_POST['title']);
			$_POST['intro'] = lang_merge($_POST['intro']);
			$_POST['detail'] = lang_merge($_POST['detail']);
			$_POST['user_id'] = $this->session->userdata('id');
			$article->from_array($_POST);
			$article->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('articles/admin/articles');
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$article = new Article($id);
			$article->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('articles/admin/articles');
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

}
?>