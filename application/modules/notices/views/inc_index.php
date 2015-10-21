<div class="corner" id="boxnotice">
	<a class="moreright2" href="notices" target="_self">more</a>
	<div class="topic"><img class="topic_notice" width="200" height="25" src="<?php echo topic("topic_notice.png") ?>" alt="ประกาศ จัดซื้อจัดจ้าง"></div>
	<?php foreach($notices as $notice): ?>
	<div class="box <?php echo alternator('','alt')?>"> 
		<a class="thumb" href="notices/view/<?php echo $notice->id ?>" target="_self"><img width="77" height="64" src="<?php echo (is_file('uploads/notice/thumbnail/'.$notice->image))?'uploads/notice/thumbnail/'.$notice->image:'themes/thaigcd/photo/nophoto.gif' ?>" alt="<?=lang_decode($notice->title)?>"></a>
		<div class="box_info">
		<span><?php echo mysql_to_th($notice->start_date) ?></span>
		<a href="notices/view/<?php echo $notice->id ?>" target="_self"><h3><?php echo lang_decode($notice->title) ?></h3></a>
		</div>   
	</div>
    <div class="clear"></div>
	<?php endforeach; ?>
</div>