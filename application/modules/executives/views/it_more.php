
	<h3><?php echo lang_decode($executive->title) ?></h3>
	<ul>
  		<?php foreach($its as $row):?>
  			<li style="list-style-type: disc !important;"><a href="executives/it_view/<?php echo $row->id?>"><?php echo lang_decode($row->title)?></a></li>
  		<?php endforeach;?>
  	</ul>
	