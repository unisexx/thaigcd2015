<?php
class Question extends ORM {

    public $table = 'meeting_questions';
	
	public $has_one = array('meeting',
        'user' => array(
            'class' => 'user',
            'other_field' => 'user'
        ),
        'r' => array(
            'class' => 'user',
            'other_field' => 'r_question'
        )
    );

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>