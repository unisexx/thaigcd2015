<?php
class Notice extends ORM {

    var $table = 'notices';
	
	var $has_one = array('user','category','group');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>