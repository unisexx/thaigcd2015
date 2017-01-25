<?php
class Userslog extends ORM {

    var $table = 'users_logs';
	
	//var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>