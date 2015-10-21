<?php
class Mediafile extends ORM {

	var $table = 'mediafiles';
	
	var $has_one = array('user','category');

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>