<?php
class Profile extends ORM {

    var $table = 'profiles';
	
	var $has_one = array("user");

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>