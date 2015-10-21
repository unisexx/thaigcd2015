<?php
class Notice_comment extends ORM {

    var $table = 'notice_comments';
	
	var $has_one = array('notice');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>