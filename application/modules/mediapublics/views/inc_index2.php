<a class="moreright" href="mediapublics/index/<?php echo $group_id?>">more</a>
<ul class="mediapublic">
<?php foreach($media as $mediapublic):?>
	<li>
		<a href="mediapublics/download/<?php echo $mediapublic->id?>"><?php echo lang_decode($mediapublic->title)?> <span class="date"><?php echo mysql_to_th($mediapublic->created,'S',TRUE)?></span></a>
	</li>
<?php endforeach;?>
</ul>