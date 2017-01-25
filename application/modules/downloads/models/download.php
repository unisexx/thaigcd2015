<?php
class Download extends ORM {

	var $table = 'downloads';
    
    var $has_one = array('user','category','group');
	
	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>