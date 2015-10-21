<?php
class Camp extends ORM {

    var $table = 'meeting_camps';
	
	var $has_many = array('province','meeting');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>