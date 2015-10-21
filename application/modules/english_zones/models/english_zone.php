<?php
class English_zone extends ORM {

    var $table = 'english_zones';
	
	var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>