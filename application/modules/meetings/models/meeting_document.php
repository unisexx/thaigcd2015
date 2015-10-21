<?php
class Meeting_document extends ORM {

    var $table = 'meeting_documents';
	
	var $has_one = array('meeting');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>