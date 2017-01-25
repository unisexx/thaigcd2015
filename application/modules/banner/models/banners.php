<?php
class Banners extends ORM {

	var $table = 'banner';
	
	//var $has_one = array('user','category');

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>