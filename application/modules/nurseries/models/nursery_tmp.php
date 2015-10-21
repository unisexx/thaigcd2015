<?php
class Nursery_Tmp extends ORM {

    var $table = 'nurseries_tmp';
	
	public $has_one = array("amphur","district","province");

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>