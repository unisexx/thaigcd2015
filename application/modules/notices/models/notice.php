<?php
class Notice extends ORM {

    var $table = 'notices';
	
	var $has_one = array('user','category','group');
	
	var $has_many = array('notice_comment');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>