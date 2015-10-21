<?php
class Listperpages extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index(){
		$modules = new Module();
		$data['modules'] = $modules->where("listperpage <> ''")->get();
		$this->template->build('admin/listperpage_index',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST){
			if(isset($_POST['listperpage'])){
				foreach($_POST['listperpage'] as $key => $item)
				{
					if($item)
					{
						$module = new Module(@$_POST['listid'][$key]);
						$module->from_array(array('listperpage' => $item));
						$module->save();
					}
				}
				set_notify('success', lang('save_data_complete'));
			}
		}
		redirect('listperpages/admin/listperpages');
	}
	
}
?>