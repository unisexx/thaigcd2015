<?php
class Information extends ORM {

    var $table = 'informations';
	
	var $has_one = array('user','category','group');
	
	var $has_many = array('information_comment');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>