<ul class="notice">

	<?php foreach($notices as $notice): ?>
		<li>
			<a class="thumb" href="notices/view_type/<?php echo $notice->id ?>" target="_self">
					
					<img class="pull-left" width="77" height="64" src="<?php echo (is_file('uploads/notice/thumbnail/'.$notice->image))?'uploads/notice/thumbnail/'.$notice->image:'themes/thaigcd/photo/nophoto.gif' ?>" alt="<?=lang_decode($notice->title)?>" style="margin-right:5px;">
					
					<span class="pull-left" style="margin-top:10px;width: 90%;padding: 0 27px;">
					
					<span class="date">
					
					<?php echo mysql_to_th($notice->start_date,'S',false)?>
						
					</span>
					
					<br>
					
					<?php echo lang_decode($notice->title) ?>
						
						
					</span>
			</a>
			
			<br clear="all">
			
		</li>
	<?php endforeach; ?>
</ul>
<a class="pull-right" href="notices/index_type">ดูทั้งหมด</a>
<br clear="all">
