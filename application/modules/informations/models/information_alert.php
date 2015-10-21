<?php
class Information_alert extends ORM {

    var $table = 'information_alerts';
	
	var $has_one = array('information_comment');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>