<?php
class Calendar extends ORM {

    var $table = 'calendars';
	
	var $has_one = array('user','group');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>