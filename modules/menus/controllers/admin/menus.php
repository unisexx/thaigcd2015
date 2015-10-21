<?php
Class Menus extends Admin_controller{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index(){
		$menus = new Menu();
		$data['menus'] = $menus->order_by('orderlist','asc')->get_page(limit());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/menu_index',$data);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$menus = new Menu($id);
			$menus->from_array($_POST);
			$menus->save();
		}
		echo $_POST['status'];
	}
	
	function form($id=FALSE){
		$data['menus'] = new Menu($id);
		$this->template->build('admin/menu_form',$data);
	}
	
	function save($id=FALSE){
		if($_POST){
			if(isset($_POST['orderlist'])){
				foreach($_POST['orderlist'] as $key => $item)
				{
					if($item)
					{
						$menu = new Menu(@$_POST['orderid'][$key]);
						$menu->from_array(array('orderlist' => $item));
						$menu->save();
					}
				}
				set_notify('success', lang('save_data_complete'));
			}else{
				$menu = new Menu($id);
				if($_FILES['icon']['name'])
					{
						$menu->delete_file('uploads/icon/','icon');
						$_POST['icon'] = $menu->upload($_FILES['icon'],'uploads/icon/',24,24);
					}
				$_POST['title'] = lang_encode($_POST['title']);
				$_POST['url'] = $_POST['url'];
				$_POST['user_id'] = $this->session->userdata('id');
				$menu->from_array($_POST);
				$menu->save();
				
				set_notify('success', lang('save_data_complete'));
			}
		}
		redirect('menus/admin/menus');
	}
	
	function delete($id=FALSE){
		if($id)
		{
			$menu = new Menu($id);
			$menu->delete_file('uploads/icon/','icon');
			$menu->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('menus/admin/menus');
	}
	
}
?>