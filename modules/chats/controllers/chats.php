<?php
    
	Class Chats extends Public_Controller
	{
		function __construct(){
			parent::__construct();
			$this->template->set_layout('webboard');
		}
		
		function index()
		{
			$this->template->build('chat_index');
		}
	}

?>