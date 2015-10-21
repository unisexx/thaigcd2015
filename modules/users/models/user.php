<?php
class User extends ORM {

    var $table = 'users';
	
	var $has_one = array("level","profile","group","blog","province","agency");
	
	var $has_many = array("category","article","information","notice","law","knowledge","gallery","weblink","faq","mediafile","executive","webboard_quiz","webboard_answer","page","chat","mediapublic","academic",'blogcomment','webboard_relate_del','calendar',"newsletter","hilight","webboard_status_config","private_calendar","pm","webboard_bad_word","menu","log","information_comment","blogfavourite");

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>