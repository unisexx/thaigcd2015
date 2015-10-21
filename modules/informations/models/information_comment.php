<?php
class Information_comment extends ORM {

    var $table = 'information_comments';
	
	var $has_one = array('information','user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>