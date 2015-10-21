<?php
    
	Class Chats extends Public_Controller
	{
		function __construct(){
			if(!is_publish('chatonline'))
			{
					set_notify('error','คุณไม่มีสิทธิเข้าใช้งานในส่วนนี้ค่ะ');
					redirect('home');
			}
			parent::__construct();
			$this->template->set_layout('webboard');
		}
		
		function index()
		{
			$this->template->build('chat_index');
		}
	}

?>