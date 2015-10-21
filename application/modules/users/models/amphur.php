<?php
class Amphur extends ORM {

    var $table = 'amphures';
	
	var $has_many = array("register","nursery");

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>