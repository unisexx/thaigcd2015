<?php
class Meeting extends ORM {

    var $table = 'meetings';
	
	var $has_many = array('meeting_document','question');
	
	var $has_one = array('camp','host');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>