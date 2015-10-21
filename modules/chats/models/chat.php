<?php
class Chat extends ORM {

	var $table = 'chats';
	
	var $has_one = array("user");

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>