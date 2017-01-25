<?php
class Downloads extends ORM {

	var $table = 'downloads';
	
	//var $has_one = array('user','category');

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>