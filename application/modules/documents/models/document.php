<?php
class Document extends ORM {

    var $table = 'documents';
	
	var $has_one = array('user');
	
	var $has_many = array('document_file');

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>