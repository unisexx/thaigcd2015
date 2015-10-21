<?php
class Host extends ORM {

    var $table = 'meeting_hosts';
	
	var $has_one = array('agency');
	
	var $has_many = array('meeting');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>