<?php
class Agency extends ORM {

    var $table = 'agencies';
	
	var $has_many = array("profile","host");

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>