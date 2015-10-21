<?php
class Private_calendar extends ORM {

    var $table = 'private_calendars';
	
	var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>