<?php
class Log extends ORM {

    var $table = 'logs';
	
	var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>