<?php
class Register extends ORM {

    var $table = 'registers';
	
	var $has_one = array('amphur','province','district');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
	
	public function get_page($page_size = 20, $page_num_by_rows = FALSE, $info_object = 'paged', $iterated = FALSE)
	{
		$page = @$_GET['page'];
		// first, duplicate this query, so we have a copy for the query
		$count_query = $this->get_clone(TRUE);

		if($page_num_by_rows)
		{
			$page = 1 + floor(intval($page) / $page_size);
		}

		// never less than 1
		$page = max(1, intval($page));
		$offset = $page_size * ($page - 1);
		
		// for performance, we clear out the select AND the order by statements,
		// since they aren't necessary and might slow down the query.
		$count_query->db->ar_select = NULL;
		$count_query->db->ar_orderby = NULL;
		$total = $count_query->db->ar_distinct ? $count_query->count_distinct() : $count_query->count();
		
		if($this->sql)
		{
			$query = $this->db->query($this->sql);		
			$count_query->_process_query($query);	
			$total = $count_query->result_count();
		}
		// common vars
		$last_row = $page_size * floor($total / $page_size);
		$total_pages = ceil($total / $page_size);

		if($offset >= $last_row)
		{
			// too far!
			$offset = $last_row;
			$page = $total_pages;
		}

		// now query this object
		if($iterated)
		{
			$this->get_iterated($page_size, $offset);
		}
		else if($this->sql)
		{
			$query = $this->db->query($this->sql." limit $offset,$page_size");		
			$this->_process_query($query);	
		}
		else
		{
			$this->get($page_size, $offset);
		}

		$this->{$info_object} = new stdClass();

		$this->{$info_object}->page_size = $page_size;
		$this->{$info_object}->items_on_page = $this->result_count();
		$this->{$info_object}->current_page = $page;
		$this->{$info_object}->current_row = $offset;
		$this->{$info_object}->total_rows = $total;
		$this->{$info_object}->last_row = $last_row;
		$this->{$info_object}->total_pages = $total_pages;
		$this->{$info_object}->has_previous = $offset > 0;
		$this->{$info_object}->previous_page = max(1, $page-1);
		$this->{$info_object}->previous_row = max(0, $offset-$page_size);
		$this->{$info_object}->has_next = $page < $total_pages;
		$this->{$info_object}->next_page = min($total_pages, $page+1);
		$this->{$info_object}->next_row = min($last_row, $offset+$page_size);

		return $this;
	}
}
?>