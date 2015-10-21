<?php
class Blog extends ORM {

    var $table = 'blogs';
	
	var $has_one = array('user');
	
	var $has_many = array('blogpost','blogfavourite');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>