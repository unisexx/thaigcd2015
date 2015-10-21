<?php
class blogcomment_alert extends ORM {

    var $table = 'blogcomment_alerts';

	var $has_one = array('blogcomment');
	
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>