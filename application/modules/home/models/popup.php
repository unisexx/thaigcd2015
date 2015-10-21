<?php
class Popup extends ORM {

    var $table = 'popup';
	
	//var $has_one = array('popup','category');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>