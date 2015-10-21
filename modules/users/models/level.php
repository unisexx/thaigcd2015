<?php
class Level extends ORM {

    var $table = 'levels';
	
	var $has_many = array("user");

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>