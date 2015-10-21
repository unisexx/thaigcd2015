<?php
class Group extends ORM {

    var $table = 'groups';
	
	var $has_many = array('user','webboard_quiz','information','notice','calendar','contact','mediapublic','mediafile','category','academic');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>