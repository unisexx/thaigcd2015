<?php
class Law extends ORM {

    var $table = 'laws';
	
	var $has_one = array('user','category');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>