<?php
class Document_file extends ORM {
	
	var $table = 'document_files';
	
	var $has_one = array('document');
	
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
	
}
?>