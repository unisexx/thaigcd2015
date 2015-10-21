<?php
class pm extends ORM {
	
	var $table = 'pms';
	
	var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
	
}
?>