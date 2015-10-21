<?php

class Welcome extends Public_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{	
		$this->template->build('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */