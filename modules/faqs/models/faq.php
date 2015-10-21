<?php
class Faq extends ORM {

	var $table = 'faqs';
	
	var $has_one = array('user','category','group');

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>