<?php
Class Menus extends Public_Controller{
	
	function __construct(){
			parent::__construct();
	}
	
	function inc_left(){
		$data['menus'] = new Menu();
		$data['menus']->where('status','approve')->order_by('orderlist','asc')->get();
		$this->load->view('inc_left',$data);
	}
}
?>