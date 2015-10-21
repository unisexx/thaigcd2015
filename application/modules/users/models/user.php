<?php
class User extends ORM {

    public $table = 'users';
	
	public $has_one = array("level","profile","group","blog");
	
	public $has_many = array("coverpage","poll","document","topic","category","article","information","notice","law","knowledge"
	,"gallery","weblink","faq","mediafile","executive","webboard_quiz"
	,"webboard_answer","page","chat","mediapublic","academic",'blogcomment'
	,'webboard_relate_del','calendar',"newsletter","hilight","webboard_status_config"
	,"private_calendar","pm","webboard_bad_word","menu","information_comment"
	,"blogfavourite","english_zone",
	 'user' => array(
            'class' => 'question',
            'other_field' => 'user'
        ),
        'r_question' => array(
            'class' => 'question',
            'other_field' => 'r'
        ));
	
	
	/*public $has_many = array(
        'user' => array(
            'class' => 'question',
            'other_field' => 'user'
        ),
        'r_question' => array(
            'class' => 'question',
            'other_field' => 'r'
        )
    );*/


    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>