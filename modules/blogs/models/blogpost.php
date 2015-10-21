<?php
class Blogpost extends ORM {

    var $table = 'blogposts';
	
	var $has_one = array('blog');

	var $has_many = array('blogcomment');
	
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>