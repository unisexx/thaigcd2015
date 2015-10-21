<?php
class Contact extends ORM {

    var $table = 'contacts';
	
	var $has_one = array('group');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>