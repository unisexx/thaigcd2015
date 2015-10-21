<?php
class Module extends ORM {

    var $table = 'modules';

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>