<?php
class Mediapublic extends ORM {

    var $table = 'mediapublics';
	
	var $has_one = array('user','category','group');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>