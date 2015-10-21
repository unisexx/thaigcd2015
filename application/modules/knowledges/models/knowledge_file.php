<?php
class Knowledge_file extends ORM {
	
	var $table = 'knowledge_files';
	
	var $has_one = array('knowledge');
	
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
	
}
?>