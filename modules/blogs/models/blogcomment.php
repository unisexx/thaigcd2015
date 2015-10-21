<?php
class Blogcomment extends ORM {

    var $table = 'blogcomments';
	
	var $has_one = array('blogpost','user');
	
	var $has_many = array('blogcomment_alert');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>