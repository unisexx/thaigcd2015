<?php
class Academic extends ORM {

    var $table = 'academics';
	
	var $has_one = array('user','category','group');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>