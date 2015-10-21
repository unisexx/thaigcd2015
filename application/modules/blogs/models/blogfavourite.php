<?php
class Blogfavourite extends ORM {

    var $table = 'blogfavourites';

	var $has_one = array('user','blog');
	
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>