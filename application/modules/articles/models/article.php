<?php
class Article extends ORM {

    var $table = 'articles';
	
	var $has_one = array('user','category');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>