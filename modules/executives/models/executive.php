<?php
class Executive extends ORM {

    var $table = 'executives';
	
	var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>