<?php
class Knowledge extends ORM {

    var $table = 'knowledges';
	
	var $has_one = array('user','category');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>