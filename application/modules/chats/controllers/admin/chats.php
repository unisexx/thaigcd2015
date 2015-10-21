<?php
    
	Class Chats extends Admin_Controller
	{
		function __construct(){
			parent::__construct();	
		}
		
		function index()
		{			
			$id = 1;
			$data['chats'] = new Chat($id);
			$this->template->build('admin/chat_index',$data);
		}
		
		function save($id=FALSE){
			if($_POST){
				$chat = new Chat($id);
				$_POST['user_id'] = $this->session->userdata('id');
				$chat->from_array($_POST);
				$chat->save();
				set_notify('success', lang('save_data_complete'));
			}
			redirect('chats/admin/chats');
		}
		
		function form(){
			$f = fopen ("./media/chat/data/log.php", "r");
			$i = 0;
	    	while($line = fgets($f)){
	    		
				if($i>1)$data['logs'][$i] = explode("|",$line);
				$i++;
	    	}
			$this->load->view('admin/chat_log',$data);
		}
		
	}

?>