
	<ul>
  		<?php foreach($executives as $row):?>
		<li style="list-style-type: disc !important;"><a href="executives/view/<?php echo $row->id?>"><?php echo lang_decode($row->title)?></a></li>
		<?php endforeach;?>
  	</ul>
	
