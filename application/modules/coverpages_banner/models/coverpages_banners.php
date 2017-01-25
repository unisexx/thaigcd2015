<?php
class Coverpages_banners extends ORM {

	var $table = 'coverpages_banner';
	
	//var $has_one = array('user','category');

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>