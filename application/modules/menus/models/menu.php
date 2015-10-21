<?php
class Menu extends ORM {

    var $table = 'menus';
	
	var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>