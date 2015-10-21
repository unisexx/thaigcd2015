<?php
class Profile extends ORM {

    var $table = 'profiles';
	
	var $has_one = array("user","agency");

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>