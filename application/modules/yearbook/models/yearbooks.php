<?php
class Yearbooks extends ORM {

	var $table = 'yearbook';

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>