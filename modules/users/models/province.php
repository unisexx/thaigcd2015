<?php
class Province extends ORM {

    var $table = 'provinces';
	
	var $has_many = array("user");

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>